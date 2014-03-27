<?

if (!empty($_POST['l']) ) {
	$l = $_POST['l'];
	} else {
		$l = "1";
		}
$new = $_POST['new'];
$sid =  $_POST['sid'];
$s = $_POST['s'];
$k = $_POST['k'];
$chords = $_POST['chords'];
$tempo = $_POST['tempo'];
$jaket = $_POST['jaket'];
$sebok = $_POST['sebok'];
$harmonica = $_POST['harmonica'];
$onemic = $_POST['onemic'];


/* does song exist? */
	
if ($new == "TRUE" ) {
	writenewsong($s,$k,$chords,$tempo,$jaket,$sebok,$harmonica,$onemic);
} else {
	updatesong($sid,$s,$k,$chords,$tempo,$jaket,$sebok,$harmonica,$onemic);
	}


/*  redirect to setlist.php */
header ("Location: setlist.php?l=".$l); 




/* ---------- FUNCTIONS --------------- */


/* write a new song */
function writenewsong($name,$key,$chords,$tempo,$jaket,$sebok,$harmonica,$onemic) {
	$songname = generatefilename($name);

	include ('db.php');

	/* insert the new song into the db */
	$q = 'Insert into `SONGS` (`Song`,`Key`,`Songname`,`Tempo`,`JakeT`,`Sebok`,`Harmonica`,`OneMic`) values ("'.$name.'","'.$key.'","'.$songname.'","'.$tempo.'","'.$jaket.'","'.$sebok.'","'.$harmonica.'","'.$onemic.'")';


	$qr = $link->query($q);

	/* write a new file */
	writefile ($songname,$chords);
}

function updatesong($sid,$name,$key,$chords,$tempo,$jaket,$sebok,$harmonica,$onemic) {
	include ('db.php');

	/* update the database */
	$q = 'Update `SONGS` set `Song` = "'.$name.'", `Key` = "'.$key.'", `Tempo` = "'.$tempo.'", `JakeT` = "'.$jaket.'", `Sebok` = "'.$sebok.'", `Harmonica` = "'.$harmonica.'", `OneMic` = "'.$onemic.'" where `sID` = '.$sid;

	$qr = $link->query($q);


	/* get the filename out of the db */
	$nameq = 'Select `Songname` from `SONGS` where `sID` = '.$sid;
	$namer = $link->query($nameq);
	$songname = $namer->fetch_row();
	$songname = $songname[0];

	/* write the file */
	writefile ($songname,$chords);

}


/* overwrites the contents of the .chrd file */
function writefile ($songname,$chords) {

	/* write the file */
	$songurl = "songs/".$songname.".chrd";
	
	$file = fopen ($songurl,'w+');
	fwrite ($file,$chords,10000);

}


/* sanitize the songname and turn it into a filename */
function generatefilename ($name) {
	/* via www.neo22s.com/slug */

	// everything to lower and no spaces begin or end
	$name = strtolower(trim($name));
 
	//replace accent characters, depends your language is needed
	//$name=replace_accents($name);
 
	// decode html maybe needed if there's html I normally don't use this
	//$name = html_entity_decode($name,ENT_QUOTES,'UTF8');
 
	// adding - for spaces and union characters
	$find = array(' ', '&', '\r\n', '\n', '+',',');
	$name = str_replace ($find, '-', $name);
 
	//delete and replace rest of special chars
	$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
	$repl = array('', '-', '');
	$name = preg_replace ($find, $repl, $name);

 
	//return the friendly url
	return $name; 
}

?>
