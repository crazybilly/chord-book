<!-- UI bits -->
<link rel="stylesheet" type="text/css" href="song.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="song.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<form action="song.php" method="get" id="tools">



<div class="tools">

	<div class="button" id="trans">

		
		<a href="<? $c= $caponow -2; echo writeSongURL($songname,$l,$on,$c); ?>">--</a>
		<a href="<? $c= $caponow -1; echo writeSongURL($songname,$l,$on,$c); ?>">-</a>
		<a href="<? $c= $caponow +1; echo writeSongURL($songname,$l,$on,$c); ?>">+</a>
		<a href="<? $c= $caponow +2; echo writeSongURL($songname,$l,$on,$c); ?>">++</a>

	</div><!--trans -->


	<a href="#" class="key opener">
		<div class="button">
		
		<? echo $keys["current"] ?>

		</div><!--key-->
	</a>


		<div class="keysub hidden button">
					<?
					
					foreach ($scale as $key => $val ) {
						if ($key != 0 or $key != "Key") {
							echo "<a href='";

								for ($i = 0; $i < 12; $i++ ) {
									if ( $scale[$i] == $keys["chart"] ) {
										$steps = 12 - $i;
										}
									}

								$c = $key + $steps;
								while ($c > 11 ) {
									$c = $c -12;
									}

							echo writeSongURL($songname,$l,$on,$c);
							echo "'>".$val."</a>";
							}
						}
					?>
				
			</div><!--keysub-->





	<div class="gear">

		<a href="#" class="opener"><img id="open-options" class="icon" src="img/gear.png" alt="open options"></a>

	</div><!--gear -->


	<div class="overlay hidden" id="options">
		
		<div class="capo">

			Capo on <select id="capo-dropdown" name="capo">

				<option value="0"></option>
				<?
					/* options 1 - 10; so the current capo is selected by default */
                    $i = 0;
					while ($i < 9) {
						$i++;
						echo "<option value='".$i."'";
						if ($i == $caponow) {
							echo " selected='selected' ";
							}
						echo ">".$i."</option>";
						}
				?>
			</select>
				<!--because the select only submits one value, keep the songname, setlist and what song we're on coming back every time -->
				<input name="s" value="<? echo $songname; ?>" type="hidden"> 
				<input name="l" value="<? echo $l; ?>" type="hidden"> 
				<input name="on" value="<? echo $on; ?>" type="hidden"> 


		</div><!--capo -->


		<div class="reset">

			<a href="<? $c = 0; echo writeSongURL ($songname,$l,$on,$c); ?>">Reset<img id="reset-icon" class="icon" src="img/reset.png" alt="reset"></a> 


		</div><!--reset -->

	</div><!--options -->

	<div class="edit">

		<a href="songeditor.php?s=<? echo $sID; ?>&l=<? echo $l; ?>">
			<img class="icon" id="edit" src="img/edit.png">
		</a>
	
	</div><!--edit-->

</div><!--tools-->
