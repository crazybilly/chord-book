<?

/* ------------- get the variables out of the URL ------------------ */ 

	/* get the songname out of the URL */
	if ($_GET['s']) {
		$songname = $_GET['s']; 

	} 
	

	/* what setlist are we on currently? */
		if ($_GET["l"] != "" || isset ($_GET["l"]) ) {
			$l = $_GET["l"];
		} else {
			$l = NULL;
		}

	/* where are we at in the setlist?
		set on to zero if it's not already set */
		if ($_GET["on"] != "" || isset ($_GET["on"]) ) {
			$on = $_GET["on"];
		} else {
			$on = 0;
		}

	/* where are we capoed at */
		/* have we changed the key yet? if not, look at the cookie; if not, default is zero */
		if (!isset ($_GET['capo']) || $_GET['capo'] == "") {
			if (!isset ($_COOKIE[$songname]) ) {
				$caponow = 0;
				} else {
					$caponow = $_COOKIE[$songname];
				}
			} else {
			$caponow = $_GET['capo'];
			}
	
		/* need a sanity check on caponow--can't be more than 11 */
		while ($caponow > 11) {
			$caponow = $caponow - 12;
			}






	/* --------------------------- functions ---------------------------- */

		/* a function to write song URLs for use in tools.php */
	function writeSongURL ($song,$setlist,$on,$capo) {
		
		$songurl = 	"song.php?";
		$song = 	"s=".$song;
		$setlist =	"l=".$setlist;
		$on =		"on=".$on;
		$capo = 	"capo=".$capo;

		$songurl=$songurl.$song."&".$setlist."&".$on."&".$capo;

		return $songurl;

	} /* end writeSongURL */


	/* figures out keys; returns key[chart,current] */
	function keyfinder ($songname, $capoval) {

		/* capoval can't be less than zero or more than 11 */
			while ($capoval > 11 ) {
				$capoval = $capoval -12;
				}

			while ($capoval < 0 ) {
				$capoval = $capoval + 12;
				}

		include ("db.php");

		/* get the default key for the chord chart out of the db */
		$chartq = "SELECT `Key` from `SONGS` where `Songname` = \"".$songname."\"";
		$chartqresult = $link->query($chartq);
		$chartkeyresult = $chartqresult->fetch_assoc();
		$chartkey = $chartkeyresult["Key"];

		/* get the current key by doing a little db cross-reference */
		$keyq = "SELECT `".$capoval."` from `KEYS` where `Key` = \"".$chartkey."\"";
		$keyqresult = $link->query($keyq);
		$currentkeyresult = $keyqresult->fetch_assoc();
		$currentkey = $currentkeyresult [$capoval];
		/* SELECT $capo from KEYS where Key = $chartkey; */

		$key["chart"] = $chartkey;
		$key["current"] = $currentkey;

		return $key;

	} /* close key function*/


	/* function to get the new tab's html */
	function getTab ($songName, $capoval) {
		$chordLocation = "songs/".$songName.".chrd";
		$tabLocation  = "output/".$songName.".html";
	
			$cstring = "./chordiicaller.sh -t ".$capoval." ".$chordLocation." ".$tabLocation;
	
		/* run chordiicaller */
		exec ($cstring);
		$handle = fopen ($tabLocation, "r");
		$tab = fread($handle, filesize($tabLocation));
		fclose($handle);
		return $tab;
	} /* close getTab function*/


	
	
	/* takes the current key and returns an assoc. array of the next keys and how many steps away they are */
	function capoUp ($currentkey) {

		include ("db.php");
		$upq = "SELECT * from `KEYS` where `Key` = \"".$currentkey."\"";
		$upresult = $link->query($upq);
		$goUp = $upresult->fetch_assoc();

		return $goUp;
	} /* close capoUp function */


	/* gets the actual setlist as an array */
	function getSetlist ($lid) {

		include ("db.php");

		$setq = "SELECT s.Songname from `SONGS_IN_SETS` t, `SONGS` s where t.lID = ".$lid." and t.sID = s.sID order by `Song_Order` LIMIT 0, 30";
		$setresult = $link->query($setq);


		while($song= $setresult->fetch_row()) {
			  $setlistsongs[]=$song[0];
			}
	

		return $setlistsongs;

	} /* close getSetlist */

		
	
	
/* -----------------------start getting it together ------------------- */


if ($songname == FALSE && $l == FALSE) {
    header ('Location: setlist.php');
    } else {
        if ($songname == FALSE) {
            
        	/* get the first song out of the db and run w/ it */
    		$setlistsongs = getSetlist ($l);
    		$songname = $setlistsongs[0];
            }


	/* get the keys */
	$keys = keyFinder ($songname,$caponow);
	$scale = capoUp ($keys["current"]);
	unset ($scale["Key"]);

	/* grab the sID out of the db */
	include ("db.php");
	$songq = "SELECT `sID` from `SONGS` where `Songname` = \"".$songname."\"";
	$songqresult = $link->query($songq);
	$songqresults = $songqresult->fetch_assoc();
	$sID = $songqresults["sID"];

	/* now that the capo is set, set the cookie to that value */
	setcookie ($songname,$caponow); 
	

	/* pull together the page */	
		/* generate the chord chart */
		$p = getTab ($songname, $caponow);
	

		/* pull in the UI bits */
		include ("tools.php");
		if ( $l != "" ) {
			include ("nav.php");
		} else {
			echo '<div class="nav">	<a href="setlist.php"><img src="img/home.png"></a> </div>';
		}

	
		/* print the chord chart */
		echo $p;
	
} /* closes the if/else at the beginning of the file */

?>

