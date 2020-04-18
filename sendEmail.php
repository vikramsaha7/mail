<?php 
$servername="localhost";
$sqlusername="root";
$sqlpassword="";
$dbname="mail";
$table="userinfo";

$email=$_GET["email"];
$msg=$_GET["msg"];
$from=$_GET["from"];

$conn= new mysqli($servername,$sqlusername,$sqlpassword,$dbname);

if($conn->connect_error) {
	die("connection failed". $conn->connect_error);
}

$sql="INSERT INTO $email (TO_BY,IN_SENT,INBOX) VALUES ('$from','IN','$msg')";

if($conn->query($sql) == TRUE) {

	echo "message sent succesfully.";
} else {
	echo "Error : ". $conn->error;
}

?> 

