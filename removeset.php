<? 

include ("db.php");

/* creates a new setlist and returns the new setlists' id */
function removesetlist ($l) {

	include ("db.php");

	/* insert the new setlist */
	$rmsetq = "DELETE FROM `SETLISTS` WHERE `lID` = ".$l;
	echo $rmsetq;
	$rmrestq = "DELETE FROM `SONGS_IN_SETS` where `lID` = ".$l;
	echo $rmrestq;
	$rmsetresult = $link2->query($rmsetq);
	$rmsetresult = $link2->query($rmrestq);

	return $l;
}

$l = $_GET['l'];

$l = removesetlist($l);


/* if you can figure out how to do this via ajax, you don't need this line */
	header ("Location: setlist.php?l=1");

?>


