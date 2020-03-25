<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="mail";
$table="userinfo";

$loginid=$_POST["loginid"];
$name=$_POST["name"];
$password=$_POST["password"];

$conn= new mysqli($servername,$username,"",$dbname);

if($conn->connect_error) {
	die("connection failed". $conn->connect_error);
}
$sql1="INSERT INTO userinfo (loginid,name,password) VALUES ('$loginid','$name','$password')";

$sql2="CREATE TABLE `$loginid` (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
TO_BY VARCHAR(30) NOT NULL,
IN_SENT VARCHAR(30) NOT NULL,
INBOX VARCHAR(100) DEFAULT NULL,
SENT VARCHAR(100) DEFAULT NULL, 
time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if($conn->query($sql1) == TRUE) {

	if($conn->query($sql2)== TRUE) {
		header("Location: login.html");
	}
	else {
	echo "Error 2: ". $conn->error;
	}
} else {
	echo "Error 1: ". $conn->error;
}
?> 
