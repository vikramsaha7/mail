<?php
session_start();
$servername="localhost";
$sqlusername="admin";
$sqlpassword="9830";
$dbname="mail";
$table="userinfo";

$loginid=$_POST["loginid"];
$password=$_POST["password"];

$conn= new mysqli($servername,$sqlusername,$sqlpassword,$dbname);

if($conn->connect_error) {
	die("connection failed". $conn->connect_error);
}
$sql1="SELECT password FROM userinfo WHERE loginid=`$loginid`";
$result=$conn->query($sql1);

$sql2="SELECT name FROM userinfo WHERE loginid=`$loginid`"


if($result->num_rows>0)
{
	if($result==$password) {
		$result2=$conn->query($sql2);
		$_SESSION["loginid"]=$loginid;
		$_SESSION["name"]=$result2;
		$conn->close();
		header("Location: index.html");
	}
}
else
{
	echo "wrong username/password";
	header("Location: login.html");
}

?>

