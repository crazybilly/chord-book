<?

include ("db.php");

$l = $_GET['l'];
$s = $_GET['s'];
$k = $_GET['k'];

echo $l;
echo "<br>";
echo $s;
echo "<br>";
echo $k;
echo "<br>";

/* fix this */

	$q = 'UPDATE `SONGS_IN_SETS` SET `Key` = "'.$k.'" WHERE `lID` = '.$l.' AND `sID` = '.$s;

	echo $q;
	echo "<br>";

	$qr = $link2->query($q);

	header ("Location: setlist.php?l=".$l); 
?>
