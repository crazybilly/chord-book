<html class="no-js">
<!-- UI bits -->
<link rel="stylesheet" type="text/css" href="ui-lightness/jquery-ui-1.8.20.custom.css" />
<link rel="stylesheet" type="text/css" href="setlist.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script src="setlist.js" type="text/javascript"></script>
<script src="modernizr.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="chart.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>



<div id="outer-wrapper">


<!--                     setlist wrapper ----------------------------- -->

<div id="setlist-wrapper" class="wrapper">
	<div id="setlist-header" class="header">
	<h3>
		<form id="setchooser" name="setlist-chooser" action="setlist.php" method="get">
		<select id="setlist-chooser" name="l">
	
	<option value=1>Test 2012-09-08</option><option value=2 selected='selected' >Prairie Pedal 2012-09-30</option><option value=> </option><option value=> </option>		</select>
		</form>
	</h3>
	
	
		<div id="setlist-toolbar" class="toolbar">
			<a href="#" id="newset"><img src="img/add.png" class="icon new setedit"></a>
			<a href="#" id="editset"><img src="img/edit.png" class="icon edit setedit"></a>
			<a href="removeset.php?l=2" id="removeset"><img src="img/remove.png" class="icon delete setedit"></a>
		</div><!--setlist-toolbar-->
	
			<!--form to create new setlists (hidden by default, runs on jquery UI -->
			<div id="newsetform" class="modal">
				<form action="newset.php" method="get">
					<label for="n">Name</label>
					<input type="text" name="n" id="setlistname">
					<label for="d">Date</label>
					<input type="text" name="d" class="setlistdate">
				</form>
			</div><!--newsetform-->
	
			<!--form to edits setlists (hidden by default, runs on jquery UI -->
			<div id="editsetform" class="modal">
				<form action="editset.php" method="get">
					<input type="hidden" name="l" value="2">
					<label for="n">Name</label>
					<input type="text" name="n" id="setlistname" value="Prairie Pedal">
					<label for="d">Date</label>
					<input type="text" name="d" class="setlistdate" value="2012-09-30">
				</form>
			</div><!--newsetform-->
	
			<!--form to change the keys of individual songs (hidden by default, runs on jquery UI -->
			<div id="changesongkey" class="modal">
				<form action="changesongkey.php" method="get">
	
					<input type="hidden" name="l" value="2">
	
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
	
		<ul class="sortable-new">
	
		<li value="1">
	<div class="songtop">
		<div class="songname">
			New Madrid
		</div><!--songname-->
		<div class="tempo">
		3
		</div>
		<div class="songmobiletools songtools">
			<span href="#" class="mobileup">
				<img class="icon" src="img/up.png">
			</span>

			<span href="#" class="mobiledown">
				<img class="icon" src="img/down.png">
			</span>

			<span href="#" class="expandtools">
				<img class="icon" src="img/gear.png">
			</span>

		</div><!--songmobiletools-->

	</div><!--songtop-->

	<div class="songdesktools songtools">
		

			<a href="songeditor.php?s=1&l=2" class="edit">
				<img class="icon" src="img/edit.png">
			</a>

			<a href="song.php?s=NewMadrid" class="view">
				<img class="icon" src="img/view.png">
			</a>

			<span href="#" class="add">
				<img class="icon" src="img/add.png">
			</span>

			<span href="#" class="key">
				G
			</span>

			<span href="#" class="remove">
				<img class="icon" src="img/remove.png">
			</span>
	</div><!--songdesktools-->
</li>
<li value="55">
	<div class="songtop">
		<div class="songname">
			Opposite's True
		</div><!--songname-->
		<div class="tempo">
		5
		</div>
		<div class="songmobiletools songtools">
			<span href="#" class="mobileup">
				<img class="icon" src="img/up.png">
			</span>

			<span href="#" class="mobiledown">
				<img class="icon" src="img/down.png">
			</span>

			<span href="#" class="expandtools">
				<img class="icon" src="img/gear.png">
			</span>

		</div><!--songmobiletools-->

	</div><!--songtop-->

	<div class="songdesktools songtools">
		

			<a href="songeditor.php?s=55&l=2" class="edit">
				<img class="icon" src="img/edit.png">
			</a>

			<a href="song.php?s=opposites-true" class="view">
				<img class="icon" src="img/view.png">
			</a>

			<span href="#" class="add">
				<img class="icon" src="img/add.png">
			</span>

			<span href="#" class="key">
				B
			</span>

			<span href="#" class="remove">
				<img class="icon" src="img/remove.png">
			</span>
	</div><!--songdesktools-->
</li>
<li value="14">
	<div class="songtop">
		<div class="songname">
			Atomic Power
		</div><!--songname-->
		<div class="tempo">
		3
		</div>
		<div class="songmobiletools songtools">
			<span href="#" class="mobileup">
				<img class="icon" src="img/up.png">
			</span>

			<span href="#" class="mobiledown">
				<img class="icon" src="img/down.png">
			</span>

			<span href="#" class="expandtools">
				<img class="icon" src="img/gear.png">
			</span>

		</div><!--songmobiletools-->

	</div><!--songtop-->

	<div class="songdesktools songtools">
		

			<a href="songeditor.php?s=14&l=2" class="edit">
				<img class="icon" src="img/edit.png">
			</a>

			<a href="song.php?s=atomicpower" class="view">
				<img class="icon" src="img/view.png">
			</a>

			<span href="#" class="add">
				<img class="icon" src="img/add.png">
			</span>

			<span href="#" class="key">
				A
			</span>

			<span href="#" class="remove">
				<img class="icon" src="img/remove.png">
			</span>
	</div><!--songdesktools-->
</li>
<li value="19">
	<div class="songtop">
		<div class="songname">
			California Stars
		</div><!--songname-->
		<div class="tempo">
		2
		</div>
		<div class="songmobiletools songtools">
			<span href="#" class="mobileup">
				<img class="icon" src="img/up.png">
			</span>

			<span href="#" class="mobiledown">
				<img class="icon" src="img/down.png">
			</span>

			<span href="#" class="expandtools">
				<img class="icon" src="img/gear.png">
			</span>

		</div><!--songmobiletools-->

	</div><!--songtop-->

	<div class="songdesktools songtools">
		

			<a href="songeditor.php?s=19&l=2" class="edit">
				<img class="icon" src="img/edit.png">
			</a>

			<a href="song.php?s=california-stars" class="view">
				<img class="icon" src="img/view.png">
			</a>

			<span href="#" class="add">
				<img class="icon" src="img/add.png">
			</span>

			<span href="#" class="key">
				A
			</span>

			<span href="#" class="remove">
				<img class="icon" src="img/remove.png">
			</span>
	</div><!--songdesktools-->
</li>
<li value="4">
	<div class="songtop">
		<div class="songname">
			Along in the Sun and The Rain
		</div><!--songname-->
		<div class="tempo">
		3
		</div>
		<div class="songmobiletools songtools">
			<span href="#" class="mobileup">
				<img class="icon" src="img/up.png">
			</span>

			<span href="#" class="mobiledown">
				<img class="icon" src="img/down.png">
			</span>

			<span href="#" class="expandtools">
				<img class="icon" src="img/gear.png">
			</span>

		</div><!--songmobiletools-->

	</div><!--songtop-->

	<div class="songdesktools songtools">
		

			<a href="songeditor.php?s=4&l=2" class="edit">
				<img class="icon" src="img/edit.png">
			</a>

			<a href="song.php?s=alonginthesunandtherain" class="view">
				<img class="icon" src="img/view.png">
			</a>

			<span href="#" class="add">
				<img class="icon" src="img/add.png">
			</span>

			<span href="#" class="key">
				D
			</span>

			<span href="#" class="remove">
				<img class="icon" src="img/remove.png">
			</span>
	</div><!--songdesktools-->
</li>
<li value="92">
	<div class="songtop">
		<div class="songname">
			Black Dresses
		</div><!--songname-->
		<div class="tempo">
		4
		</div>
		<div class="songmobiletools songtools">
			<span href="#" class="mobileup">
				<img class="icon" src="img/up.png">
			</span>

			<span href="#" class="mobiledown">
				<img class="icon" src="img/down.png">
			</span>

			<span href="#" class="expandtools">
				<img class="icon" src="img/gear.png">
			</span>

		</div><!--songmobiletools-->

	</div><!--songtop-->

	<div class="songdesktools songtools">
		

			<a href="songeditor.php?s=92&l=2" class="edit">
				<img class="icon" src="img/edit.png">
			</a>

			<a href="song.php?s=black-dresses" class="view">
				<img class="icon" src="img/view.png">
			</a>

			<span href="#" class="add">
				<img class="icon" src="img/add.png">
			</span>

			<span href="#" class="key">
				A
			</span>

			<span href="#" class="remove">
				<img class="icon" src="img/remove.png">
			</span>
	</div><!--songdesktools-->
</li>
		</ul>
	
		<!-- hidden form for submitting the setlist via AJAX -->	
	
	
	</div><!--set-->


<div id="footer">
    <a href="setdetails.php?l=2" class="button submit">Details</a>
    <a href="print.php?l=2" target="_blank" class="button submit">Print</a>
    <a href="song.php?l=2" class="button submit">View</a>
    <a href="printsetlist.php?l=2" target="_blank" class="button submit">Print set</a>
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
				<a href="songeditor.php?l=2"><img src="img/add.png" class="icon new"></a>
			</span>
		</div><!--song-toolbar-->
	</div><!--song-header-->
	
	
	<div id="songs" class="viewbox">
		
		<div  id="chart-div"></div>


	</div><!--songs-->

</div><!--song-wrapper-->











</div><!--outer-wrapper -->
</html>

