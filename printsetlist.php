<?

$l = $_GET['l'];

function get_setlist($l) {
include ('db.php');

	$songq = "SELECT t.song_order, t.sid as sID, s.song as Song, s.songname as Songname, t.key as Songkey FROM `SONGS_IN_SETS` t INNER JOIN `SONGS` s ON t.sid=s.sid WHERE t.lid = ".$l." ORDER BY t.SONG_ORDER" ;

	$songqresult = $link->query($songq);
	$i = 0;
	while ($i < $songqresult->num_rows) {
		$songlist[$i] = $songqresult->fetch_assoc();
		$i++;
		}

	return ($songlist);
}

function prep_set($songlist,$ret) {

	/* only write the setlist if you have songs in it */
	if (count($songlist) > 0) {
				
		/* write the songs */
		foreach ($songlist as $key => $val) {
			$names[] = $val['Song'];
			}

		foreach ($names as $key => $song) {
			$t = count($names);
			$sp = $t/2;
	
			if ($key > $sp) {	
				$second [] = $song;
				} else {
				$first[] = $song;
				}
			}

	
		if ($ret == 1) {
			$col = $first;
			} elseif ($ret == 2) {
			$col = $second;
			}

		$list = "<ul>";
		$i = 0;
		foreach ($col as $name) {
			$list .= "<li>".$name;
			$i++;
		}
		$list .= "</ul>";
		

		return $list;

	}

}

$list_of_songs = get_setlist($l);
$count = count($list_of_songs);
$half = $count/2;
$usable_height = 16.31-(1.25*2);
$line_height = $usable_height/$half;
$leading = .25*$line_height;
$font_size = $line_height-$leading;
if ($font_size > 1.2) {
	$font_size = 1.2;
}





?>

<head>
	<link rel="stylesheet" type="text/css" href="printsetlist.css" />
	<style>
		li {
		font-size: <? echo $font_size; ?>cm;
		}
	</style>
</head>
<body>

<div id="wrapper">
<div class="set" id="right">
	<? echo prep_set($list_of_songs,2); ?>
</div>

<div class="set" id="left">
	<? echo prep_set($list_of_songs,1); ?>
</div>

</div><!--wrapper-->
</body>
