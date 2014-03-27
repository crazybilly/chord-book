<html class="no-js">
<!-- UI bits -->
<link rel="stylesheet" type="text/css" href="ui-lightness/jquery-ui-1.8.20.custom.css" />
<link rel="stylesheet" type="text/css" href="setlist.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script src="setlist.js" type="text/javascript"></script>
<script src="modernizr.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


<?

/* turn on the db */
include ('db.php');

/* figure out where you're at */

	/* get cookie val */
	if ( isset ($_GET["l"]) ) {
		$l = $_GET["l"];
	} elseif ( isset ($_COOKIE["currentset"]) ) {
		$l = $_COOKIE["currentset"];
	} else { 
		/* eventually replace this with the most upcoming set by date */
		$l = 1;
	}

	/* set the cookie to $l */
	setcookie ("currentset",$l);



/* get all setlist from db */
	$setlistq = "SELECT * FROM `SETLISTS` ORDER BY `DATE`";
	$setqresult = $link->query($setlistq);
	$i = 0;
	while ($i < ($setqresult->num_rows  ) ) {
		$allsetlists[$i] = $setqresult->fetch_assoc();
		$i++;
		}

	/* set some handy variables */
	$i=0;
	foreach ($allsetlists as $set) {
		if ($set["lID"]==$l ) {
			$currentsetlistname = $set["Name"];
			$currentsetlistdate = $set["Date"];
			$currentsetlisttype = $set["Type"];
		}
	}


/* function to write the song lis*/

	function writeSong ($song,$l) {

		$html = '<li value="'.$song["sID"].'">'.PHP_EOL;
		$html .= '	<div class="songtop">'.PHP_EOL;
		
		$html .= '		<div class="songname">'.PHP_EOL;
		$html .= '			'.$song["Song"].PHP_EOL;
		$html .= '		</div><!--songname-->'.PHP_EOL;
		
		$html .= '		<div class="songmobiletools songtools">'.PHP_EOL;
		
		$html .= '			<span href="#" class="mobileup">'.PHP_EOL;
		$html .= '				<img class="icon" src="img/up.png">'.PHP_EOL;
		$html .= '			</span>'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '			<span href="#" class="mobiledown">'.PHP_EOL;
		$html .= '				<img class="icon" src="img/down.png">'.PHP_EOL;
		$html .= '			</span>'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '			<span href="#" class="expandtools">'.PHP_EOL;
		$html .= '				<img class="icon" src="img/gear.png">'.PHP_EOL;
		$html .= '			</span>'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '		</div><!--songmobiletools-->'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '	</div><!--songtop-->'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '	<div class="songdesktools songtools">'.PHP_EOL;
		$html .= '		'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '			<a href="songeditor.php?s='.$song["sID"].'&l='.$l.'" class="edit">'.PHP_EOL;
		$html .= '				<img class="icon" src="img/edit.png">'.PHP_EOL;
		$html .= '			</a>'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '			<a href="song.php?s='.$song["Songname"].'" class="view">'.PHP_EOL;
		$html .= '				<img class="icon" src="img/view.png">'.PHP_EOL;
		$html .= '			</a>'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '			<span href="#" class="add">'.PHP_EOL;
		$html .= '				<img class="icon" src="img/add.png">'.PHP_EOL;
		$html .= '			</span>'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '			<span href="#" class="key">'.PHP_EOL;
		$html .= '				'.$song["Songkey"].PHP_EOL;
		$html .= '			</span>'.PHP_EOL;
		$html .= ''.PHP_EOL;
		$html .= '			<span href="#" class="remove">'.PHP_EOL;
		$html .= '				<img class="icon" src="img/remove.png">'.PHP_EOL;
		$html .= '			</span>'.PHP_EOL;
		$html .= '	</div><!--songdesktools-->'.PHP_EOL;
		$html .= '</li>'.PHP_EOL;
		
		return $html;
	} /* writeSong */ 


	/* to write the selects in the modal setlist editor forms */
	function selectSetType ($type) {
		$kinds = Array (
			"Busking",
			"Coffeehouse",
			"Bar"
		);
	
		$select = '<select name="t" class="setlisttype">';


		for ($i = 1; $i < 4; $i++) {

			$g =  $i-1; 
			$select .= '<option value="'.$i.'" ';

			if ($type == $i) {
				$select .= "selected";
			}

			$select .= ">";

			$select .= $kinds[$g];
			$select .= '</option>';

		}

		$select .= '</select>';


		return $select;
	}




?>

<div id="outer-wrapper">


<!--                     setlist wrapper ----------------------------- -->

<div id="setlist-wrapper" class="wrapper">
	<div id="setlist-header" class="header">
	<h3>
		<form id="setchooser" name="setlist-chooser" action="setlist.php" method="get">
		<select id="setlist-chooser" name="l">
	
	<?
	
		/* write the select */
		foreach ($allsetlists as $val) {
			echo "<option value=".$val["lID"];
		 		if ($val["lID"] == $l) {
					echo " selected='selected' ";
				}
				echo ">";
			echo $val["Name"].' '.$val["Date"];
			echo "</option>";
		}
	
	?>
		</select>
		</form>
	</h3>
	
	
		<div id="setlist-toolbar" class="toolbar">
			<a href="#" id="newset"><img src="img/add.png" class="icon new setedit"></a>
			<a href="#" id="editset"><img src="img/edit.png" class="icon edit setedit"></a>
			<a href="removeset.php?l=<? echo $l ?>" id="removeset"><img src="img/remove.png" class="icon delete setedit"></a>
		</div><!--setlist-toolbar-->
	
			<!--form to create new setlists (hidden by default, runs on jquery UI -->
			<div id="newsetform" class="modal">
				<form action="newset.php" method="get">
					<div class="md name">
						<label for="n">Name</label>
						<input type="text" name="n" id="setlistname">
					</div>
					<div class="md date">
						<label for="d">Date</label>
						<input type="text" name="d" class="setlistdate">
					</div>
						<div class="md type">
						<label for="t">Type</label>
						<? 
							$newtype = selectSetType ("0");
							echo $newtype;
						?>
					</div>
				
				</form>
			</div><!--newsetform-->
	
			<!--form to edits setlists (hidden by default, runs on jquery UI -->
			<div id="editsetform" class="modal">
				<form action="editset.php" method="get">
						<input type="hidden" name="l" value="<? echo $l; ?>">
					<div class="md name">
						<label for="n">Name</label>
						<input type="text" name="n" id="setlistname" value="<? echo $currentsetlistname; ?>">
					</div>
					<div class="md date">
						<label for="d">Date</label>
						<input type="text" name="d" class="setlistdate" value="<? echo $currentsetlistdate; ?>">
					</div>
					<div class="md type">
						<label for="t">Type</label>
						<? 
							$edittype = selectSetType ($currentsetlisttype);
							echo $edittype;
						?>
					</div>
				</form>
			</div><!--newsetform-->
	
			<!--form to change the keys of individual songs (hidden by default, runs on jquery UI -->
			<div id="changesongkey" class="modal">
				<form action="changesongkey.php" method="get">
	
					<input type="hidden" name="l" value="<? echo $l; ?>">
	
					<!--fill the song ID with jquery-->
					<input type="hidden" name="s" value="">
	
					<label for="key">Key</label>
					<select id="keychanger" name="k">
	
					<!-- note that selected is done via jquery -->
						<option value="A">A</option>
						<option class="Bb" value="Bb">Bb</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="C#">C#</option>
						<option value="D">D</option>
						<option value="Eb">Eb</option>
						<option value="E">E</option>
						<option value="F">F</option>
						<option value="F#">F#</option>
						<option value="G">G</option>
						<option value="G#">G#</option>
					</select>
				</form>
			</div><!--changesongkey-->
	
	</div><!--setlist header-->
	
	<div id="set" class="viewbox">
	
		<ul class="sortable">
	
		<?

			$songlist = Array();

			/* get the songs in this set */
			$songq= "SELECT t.song_order, t.sid as sID, s.song as Song, s.songname as Songname, t.key as Songkey FROM `SONGS_IN_SETS` t INNER JOIN `SONGS` s ON t.sid=s.sid WHERE t.lid = ".$l." ORDER BY t.SONG_ORDER" ;
			$songqresult = $link->query($songq);
			$i = 0;
			while ($i < $songqresult->num_rows) {
				$songlist[$i] = $songqresult->fetch_assoc();
				$i++;
				}

			/* only write the setlist if you have songs in it */
			if (count($songlist) > 0) {
				
				/* write the songs */
				foreach ($songlist as $key => $val) {
					echo writeSong($val,$l);
					/*
					if ($val["sid"] != NULL) {
					echo "<li value='".$val["sid"]."'>";
					echo $val["song"];
					echo '<span class="icon-span"><img class="icon remove" src="img/remove.png"></span> 	<span class="icon-span"><span class="key">';
					echo $val["key"];
					echo '</span></span>						<span class="icon-span"><a href="song.php?s='.$val["songname"].'&l='.$l.'&on='.$val["song_order"].'"><img class="icon view" src="img/view.png"></a></span>';
					}
					 */
				}

			} 

			?>
	
		</ul>
	
		<!-- hidden form for submitting the setlist via AJAX -->	
		<form id="setupdater" action="setlistupdate.php" method="POST">
			<input type="hidden" name="l" id="lid">
			<input type="hidden" name="s" id="list">
			<input type="hidden" name="k" id="keys">
		</form>
	
	
	</div><!--set-->


<div id="footer">
    <a href="setdetails.php?l=<? echo $l ?>" class="button submit"><img src="img/setdetails.png"></a>
    <a href="print.php?l=<? echo $l ?>" target="_blank" class="button submit"><img src="img/pdf-chordbook.png"></a>
    <a href="song.php?l=<? echo $l ?>" class="button submit"><img src="img/document-text.png"></a>
    <a href="printsetlist.php?l=<? echo $l ?>" target="_blank" class="button submit"><img src="img/printer.png"></a>
</div><!--footer-->


</div><!--setlist wrapper-->


<!--                  song wrapper ----------------------------- -->
<div id="song-wrapper" class="wrapper">

	<div id="song-header" class="header">
		<h3>
		Songs
		</h3>
		<div id="song-toolbar" class="toolbar ui-button ui-button-text-only">
			<span class="ui-button-text">
				<a href="songeditor.php?l=<? echo $l; ?>"><img src="img/add.png" class="icon new"></a>
			</span>
		</div><!--song-toolbar-->
	</div><!--song-header-->
	
	
	<div id="songs" class="viewbox">
		<ul>
	
			<? 
			/* get all available songs, sorted alphabetically */
				/* get the songs in this set */
				$listq= "SELECT *,s.Key as Songkey from `SONGS` s ORDER By `Song`";
				$listqresult = $link->query($listq);
				$i = 0;
				while ($i < $listqresult->num_rows ) {
					$allsongs[$i] = $listqresult->fetch_assoc();
					$i++;
					}

			
				/* write the songs */
				foreach ($allsongs as $key => $val) {
					echo writeSong($val,$l);
					/* replaced by writeSong(); 
					echo "<li value='".$val["sID"]."'>";
					echo $val["Song"];
					echo '<span class="icon-span"><img class="icon remove" src="img/remove.png"></span> 	<span class="icon-span"><span class="key">';
					echo $val["Key"];
					echo '</span></span>			<span class="icon-span"><img class="icon add" src="img/add.png"></span>			<span class="icon-span"><a href="song.php?s='.$val["Songname"].'"><img class="icon view" src="img/view.png"></a></span>			
					<span class="icon-span">
						<a href="songeditor.php?s='.$val["sID"].'&l='.$l.'">
							<img class="icon edit" src="img/edit.png">
						</a>
					</span>';
					 */
				}
			?>	
	
		</ul>
	
	</div><!--songs-->

</div><!--song-wrapper-->











</div><!--outer-wrapper -->
</html>
