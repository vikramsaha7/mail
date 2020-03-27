<?php
session_start();
$servername="localhost";
$sqlusername="root";
$sqlpassword="";
$dbname="mail";
$table="userinfo";

$loginid=$_POST["loginid"];
$password=$_POST["password"];

$conn= new mysqli($servername,$sqlusername,$sqlpassword,$dbname);

if($conn->connect_error) {
	die("connection failed". $conn->connect_error);
}
$sql1="SELECT * FROM userinfo WHERE loginid='".$loginid."'";
$result=$conn->query($sql1);
$row=$result->fetch_assoc();
//echo "hi: ".$row["password"];
//$sql2="SELECT name FROM userinfo WHERE loginid=`$loginid`" ;


if ($result->num_rows > 0)
{
	if($row["password"]==$password) {
		//$result2=$conn->query($sql2);
		$_SESSION["loginid"]=$loginid;
		$_SESSION["name"]=$row["name"];
		$conn->close();
		header("Location: index.php");
	}
}
else
{
	echo "wrong username/password";
	//header("Location: login.html");
}

?>

