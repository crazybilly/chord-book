<? 

include ("db.php");

/* creates a new setlist and returns the new setlists' id */
function editsetlist ($name,$date,$type,$l) {

	include ("db.php");

	/* update the setlist */
	$newsetq = "UPDATE `SETLISTS` SET `Name`=\"".$name."\",`Date`=\"".$date."\", `Type`=\"".$type."\" WHERE `lID` = ".$l;
	$newsetresult = $link2->query($newsetq);

	/* get the id of the setlist you just inserted */
	$newsetidq = "SELECT max(`lID`) from `SETLISTS`";
	$newsetresult = $link2->query($newsetidq);
	$newsetid = $newsetresult->fetch_row();
	$newsetid = $newsetid[0];
	
	return $newsetid;
}

$l = $_GET['l'];
$name = $_GET['n'];
$date = $_GET['d'];
$type = $_GET['t'];

$l = editsetlist ($name,$date,$type,$l);

/* if you can figure out how to do this via ajax, you don't need this line */
	header ("Location: setlist.php?l=".$l); 

?>


