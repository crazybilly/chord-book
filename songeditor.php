<?

if (!empty($_GET['l'])) {
	$l = $_GET['l'];
	} else {
	$l = NULL;
	}

if (!empty($_GET['s']) ) {
	$s = $_GET['s'];
	$song = getsong($s);
	$chords = getchords($song);
	$new = "FALSE";
} else {
	$new = "TRUE"; 
	$song = NULL;
	$chords = NULL;
	}


?>

<link rel="stylesheet" type="text/css" href="songeditor.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<div id="songeditor">
<form name="songeditor" action="editsong.php" method="POST">

	<!--set name -->
	<input type="hidden" name="l" value="<? echo $l; ?>">
	<input type="hidden" name="new" value="<? echo $new; ?>">
	<input type="hidden" name="sid" value="<? echo $song['sID']; ?>">


	<!--song name -->
	<fieldset id="songinfo">
	
		
		<legend>Song Name</legend>


		<input type="text" class="name" name="s" value="<? echo $song['Song']; ?>">
	
		<br>
		<!--chart key-->
		<label class="key" for="k">Chart key</label>
		<? 
			/* generate the key selector w/ php */
			$select = keyselector ($song); 
			echo $select;
		?>
	
		<fieldset id="temposet">
			<label class="tempo" for="tempo">Tempo</label>
			<input type="text" class="tempo" name="tempo" value="<? echo $song['Tempo']; ?>">
			<div class="caption">1 = slow<br>10 = fast</div>
		</fieldset>

	</fieldset >

	<fieldset id="instruments">

		<legend>Instruments</legend>

		<!-- Who's playing what guitar -->
		<?
			$jaket = guitarselector ($song,"JakeT");
			echo $jaket;
			$sebok = guitarselector ($song,"Sebok");
			echo $sebok;
	

			$harmonica = harmonicaselector ($song);
			echo $harmonica;

			$onemic = onemicselector ($song);
			echo $onemic;

			?>

	<!--	
		<label class="onemic" for="onemic">One Mic</label>
		<input type="checkbox" name="onemic" value="1"
			<?
				// if ($song['OneMic'] == 1 ) {
				//	echo " checked ";
				//	}
			?>
			>
	-->

	</fieldset>
	
	<div class="submit-container" id="top-submit">
		<!--submit buttons -->
		<input type="submit" value="Save" class="submit">
		<!--
			</form>
		<form action="setlist.php?l=<? echo $l; ?>" method ="get">
		<input type="hidden" name="l" value="<? echo $l; ?>">
		<input type="submit" value="Discard">
		</form>
		-->
	</div>

	<!--chords -->
	<textarea class="chords" name="chords" rows="30"><? echo $chords; ?></textarea>


	<div class="submit-container" id="bottom-submit">
		<!--submit buttons -->
		<input type="submit" value="Save" class="submit">
		</form>
		<form action="setlist.php?l=<? echo $l; ?>" method ="get">
		<!--fix this -->
		<input type="hidden" name="l" value="<? echo $l; ?>">
		<input type="submit" value="Discard">
		</form>
	</div>


</div><!--songeditor-->


<?


/* -------------- FUNCTIONS ------------- */


	/* gets the song out of the db */
	function getsong ($sid) {

		include ('db.php');
	
		$q = "SELECT * from `SONGS` where `sID` = ".$sid;
		$qr = $link->query($q);
		$song = $qr->fetch_assoc();
	
		return $song;
	}

	/* gets the chordpro text for the song */
	function getchords ($song) {
	
		$location = "songs/".$song['Songname'].".chrd";

		if (filesize($location) > 0 ) {
		
			$s = fopen($location,"r");
			$c = fread ($s,filesize($location));

			} else {
				$c = "";
				}
			
		return $c;
	}


	/* get the list of keys and build the select */
	function keyselector ($song) {

		/* if $sid is Null, set it to 0 
		if ($sid == NULL) {
			$sid = 0;
		}
		 */

		include ('db.php');

		$q = "SELECT `Key` from `KEYS`";
		$qr = $link->query($q);

		$i = 0;
		while ($i < $qr->num_rows) {
			$keylist[$i] = $qr->fetch_row();
			$i++;
			}
	

		$select = "<select class='key' name='k'>";
		foreach ($keylist as $k) {
			$select .= "<option";
			if ($k[0] == $song['Key']) {
				$select .= " selected='selected'";
			}
			$select .= ">";
			$select .= $k[0];
			$select .= "</option>";


		}

		$select .= "</select>";

		return $select;
	}


/* functions to write the stuff in the instrumentation fieldset */


	function guitarselector ($song,$player) {

		$playerlow = strtolower($player);

		$instr = Array (
			"Acoustic",
			"Electric",
			"Either guitar",
			"Banjo",
			"Banjo or acoustic"
			);
		
		$select = "<label for='".$playerlow."' class='".$playerlow."'>".$player."</label>";

		$select .= "<select name='".$playerlow."' class='".$playerlow."'>";
		for ($i = 1; $i < 6; $i++) {
			$select .= "<option value='".$i."' ";
				
				if ( $song[$player] == $i ) { 
					$select .= "selected='selected'";
					}
			
			$g = $i-1;
			$select .= ">".$instr[$g]."</option>";
			}

		$select .= "</select>";
			
		return $select;
		}



	function harmonicaselector ($song) {

		$harmonica = "<label class='harmonica' for='harmonica'>Harmonica</label>
						<input type='checkbox' class='harmonica' name='harmonica' value='1' ";


		if ($song['Harmonica'] == 1 ) {
			$harmonica .= " checked ";
			}

		$harmonica .= ">";

		return $harmonica;
		}

	function onemicselector ($song) {

		$onemic = '<label class="onemic" for="onemic">One Mic</label>';
		$onemic.= "<select name='onemic' class='onemic'>";

		$options = Array (
			"Yes",
			"Sometimes",
			"No",
			);


		/* set value to No if is null */
		if ($song["OneMic"] == FALSE) {
			$song["OneMic"] = 3;
			}


		/* build the options */
		for ($i = 0; $i < 3; $i++) {
			
			$g = $i+1;

			$onemic .= "<option value='".$g."' ";
			if ($song["OneMic"] == $g) {
				$onemic .= "selected ";
				}
				

			$onemic .= ">".$options[$i]."</option>";

			}

		$onemic .= "</select>";

		return $onemic;

		}

		
?>
