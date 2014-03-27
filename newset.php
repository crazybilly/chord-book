<? 

include ("db.php");

/* creates a new setlist and returns the new setlists' id */
function newsetlist ($name,$date,$type) {

	include ("db.php");

	/* insert the new setlist */
	$newsetq = "INSERT into `SETLISTS` (`Name`,`Date`,`Type`) VALUES (\"".$name."\",\"".$date."\",\"".$type."\")";
	$newsetresult = $link2->query($newsetq);

	/* get the id of the setlist you just inserted */
	$newsetidq = "SELECT max(`lID`) from `SETLISTS`";
	$newsetresult = $link2->query($newsetidq);
	$newsetid = $newsetresult->fetch_row();
	$newsetid = $newsetid[0];
	
	return $newsetid;
}

$name = $_GET['n'];
$date = $_GET['d'];
$type = $_GET['t'];

$l = newsetlist ($name,$date,$type);

/* if you can figure out how to do this via ajax, you don't need this line */
header ("Location: setlist.php?l=".$l);

?>


