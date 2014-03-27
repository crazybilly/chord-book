<?

include ("db.php");

/* get the variables from the POST */
	$l = $_POST["l"];
	$songs = explode(",", $_POST['s']); 
	$keys = explode(",", $_POST['k']); 
	

print_r ($l);
print_r ($songs);
print_r ($keys);


/* wipe out the old setlist */
$rmq = "DELETE FROM `SONGS_IN_SETS` WHERE `lID` = ".$l;
echo "<br>";
echo $rmq;
$rmqresult = $link2->query($rmq); 


/* input the new records */
$inqpre = "INSERT INTO `SONGS_IN_SETS` (`lID`, `sID`,`Song_Order`,`Key`) VALUES (";

foreach ($songs as $index => $song) {
	$i = $index + 1;
	$inq = $inqpre.$l.", ".$song.", ".$i.", \"".$keys[$index]."\")";
	echo "<br>";
	echo $inq;
	$inqresult = $link2->query($inq);
	}


?>
