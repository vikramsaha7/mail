<?php 
$servername="localhost";
$sqlusername="root";
$sqlpassword="";
$dbname="mail";
$table="userinfo";

$email=$_GET["user"];
$sendById=$_GET["sendById"];

$conn= new mysqli($servername,$sqlusername,$sqlpassword,$dbname);

if($conn->connect_error) {
	die("connection failed". $conn->connect_error);
}

//$sql="INSERT INTO $email (TO_BY,IN_SENT,INBOX) VALUES ('$from','IN','$msg')";
$sql="SELECT * FROM $email WHERE IN_SENT='IN'AND id='$sendById' ";
$result=$conn->query($sql);
$display="<p>";
if($result->num_rows >0) {

	while($row = $result->fetch_assoc() ){
		$display.=$row["INBOX"];
	}
}
else
{
	$display.="none";
}
$display.="</p>";
echo $display;
?>