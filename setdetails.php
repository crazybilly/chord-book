<html class="no-js">
<!-- UI bits -->
<link rel="stylesheet" type="text/css" href="ui-lightness/jquery-ui-1.8.20.custom.css" />
<link rel="stylesheet" type="text/css" href="setdetails.css" />
<link rel="stylesheet" type="text/css" href="setlist.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script src="setlist.js" type="text/javascript"></script>
<script src="modernizr.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="chart.js" type="text/javascript"></script>
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
	//while ($i <= ($setqresult->num_rows +1 ) ) {
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


/* functions to determine what instrument icon to show */
function jaket($settype,$instr) {
	$name = Array (
		"blank",
		"acoustic",
		"electric",
		"3",
		"banjo",
		"5",
		);

$result = "";

	if ($settype == "1") {
		if ($instr == 3) {
			$result = "acoustic";
			} elseif ($instr == 5) {
				$result = "banjo";
			} else {
				$result = $name[$instr];
			}
		}
			
	if ($settype == "2") {
		if ($instr == "3") {
			$result = "acoustic";
			} elseif ($instr == "5") {
				$result = "acoustic";
			} else {
				$result = $name[$instr];
			}
		}
			
	if ($settype == "3") {
		if ($instr == 3) {
			$result = "electric";
			} elseif ($instr == 5) {
				$result = "acoustic";
			} else {
				$result = $name[$instr];
			}
		}

	return $result;
}

function sebok($settype,$instr) {
	$name = Array (
		"blank",
		"acoustic",
		"electric",
		"3",
		"banjo",
		"5",
		);

$result = "";

	if ($settype == "1") {
		if ($instr == 3) {
			$result = "banjo";
			} elseif ($instr == 5) {
				$result = "banjo";
			} else {
				$result = $name[$instr];
			}
		}
			
	if ($settype == "2") {
		if ($instr == "3") {
			$result = "electric";
			} elseif ($instr == "5") {
				$result = "banjo";
			} else {
				$result = $name[$instr];
			}
		}
			
	if ($settype == "3") {
		if ($instr == 3) {
			$result = "electric";
			} elseif ($instr == 5) {
				$result = "electric";
			} else {
				$result = $name[$instr];
			}
		}

	return $result;
}


/* function to write the song lis*/

	function writeSong ($song,$l,$lType) {

		if ($song["Harmonica"]) {
			$h = "harmonica";
			} else $h="";
		if ($song["OneMic"]) {
			$m = "onemic";
			} else $m="";

	
		$html = '<li value="'.$song["sID"].'" class=" '.$h.' '.$m.' "> '; /*'.$h.' '.$m.'>'.PHP_EOL;  */
		$html .= '	<div class="songtop">'.PHP_EOL;
		
		$html .= '		<div class="songname">'.PHP_EOL;
		$html .= '			'.$song["Song"].PHP_EOL;
		$html .= '		</div><!--songname-->'.PHP_EOL;
		
		$html .= '		<div class="tempo">'.PHP_EOL;
		$html .= '			'.$song["Tempo"].PHP_EOL;
		$html .= '		</div><!--Tempo-->'.PHP_EOL;
		
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
		$html .= '			<span class="jaket instrument">'.PHP_EOL;
		$html .= '				<img src="img/'.jaket($lType,$song["JakeT"]).'.png">'.PHP_EOL; 
		$html .= '			</span>'.PHP_EOL;
		$html .= '			<span class="sebok instrument">'.PHP_EOL;
		$html .= '				<img src="img/'.sebok($lType,$song["Sebok"]).'.png">'.PHP_EOL;
		$html .= '			</span>'.PHP_EOL;
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




?>

<div id="outer-wrapper" >


<!--                     setlist wrapper ----------------------------- -->

<div id="setlist-wrapper" class="wrapper">
	<div id="setlist-header" class="header">
	<h3>
		<form id="setchooser" name="setlist-chooser" action="setdetails.php" method="get">
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
	
		<ul class="sortable chart-list">
	
		<?

			$songlist = Array();

			/* get the songs in this set */
			$songq= "SELECT t.song_order, t.sid as sID, s.song as Song, s.songname as Songname, t.key as Songkey, s.Tempo, s.JakeT, s.Sebok, s.Harmonica, s.OneMic FROM `SONGS_IN_SETS` t INNER JOIN `SONGS` s ON t.sid=s.sid WHERE t.lid = ".$l." ORDER BY t.SONG_ORDER" ;
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
					echo writeSong($val,$l,$currentsetlisttype);

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
    <a href="setlist.php?l=<? echo $l ?>" class="button submit"><img src="img/home.png"></a>
    <a href="print.php?l=<? echo $l ?>" target="_blank" class="button submit"><img src="img/pdf-chordbook.png"</a>
    <a href="song.php?l=<? echo $l ?>" class="button submit"><img src="img/document-text.png"></a>
    <a href="printsetlist.php?l=<? echo $l ?>" target="_blank" class="button submit"><img src="img/printer.png"></a>
</div><!--footer-->


</div><!--setlist wrapper-->

<!--the chart lives here-->
	<!--deprecated in favor of using li width 
		<div id="chart-div"></div>
	-->



</div><!--outer-wrapper -->
</html>
