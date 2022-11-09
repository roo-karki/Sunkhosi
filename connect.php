
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sunkhosi_db";
//create connection
$conn = mysqli_connect($servername,$username,$password,$database);

//check connection
if(!$conn){
	die("couldnot connect." . mysqli_connect());
}


?>


 