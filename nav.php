<? 

$setlistsongs = getSetlist($l);
	/* length is now zero based */
	$setlength = count($setlistsongs) - 1;

/* what's the next song? */
	$next = $on + 1;
	/* this isn't working right */
	while ($next > $setlength ) {
		$next = count($setlistsongs)-1;
		}
	$nextsong = $setlistsongs[$next];


/* what's the prev song? */
	$prev = $on - 1;
	if ($prev < 0 ) {
		$prev = 0;
		}
	$prevsong = $setlistsongs[$prev];


echo '<div class="nav">';





/* assuming $prev is > 0, show prev bar */
if ( $on > 0 ) {
	echo '<a href="';
	echo writeSongURL($prevsong,$l,$prev,""); 
	echo '"><img src="img/left.png"></a>';
	} else {
	echo "<div class='placeholder'></div>";
	}

/* home link */
?>
	<a href="setlist.php"><img src="img/home.png"></a>

<?

/* assuming $next isn't bigger than the count of songs we've got, show next button */


if ($on < $setlength ) {
	echo '<a href="';
	echo writeSongURL($nextsong,$l,$next,"");
	echo '"><img src="img/right.png"></a>';
	} else {
	echo "<div class='placeholder'></div>";
	} 

echo "</div><!--nav -->";

?>
