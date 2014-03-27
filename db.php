<?

/* change these values as necessary */
$server = "localhost";
$user = "YOUR_USERNAME_HERE";
$password = "YOUR_PASSWORD_HERE";
$database = "chord";

$link = new mysqli($server,$user,$password,$database);
/* global $link; */


$link2 = new mysqli($server,$user,$password,$database);
global $link2;




?>
