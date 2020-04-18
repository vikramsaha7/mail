<?php 
$servername="localhost";
$sqlusername="root";
$sqlpassword="";
$dbname="mail";
$table="userinfo";

$email=$_GET["user"];

$conn= new mysqli($servername,$sqlusername,$sqlpassword,$dbname);

if($conn->connect_error) {
	die("connection failed". $conn->connect_error);
}

//$sql="INSERT INTO $email (TO_BY,IN_SENT,INBOX) VALUES ('$from','IN','$msg')";
$sql="SELECT * FROM $email WHERE IN_SENT='IN' ";
$result=$conn->query($sql);
$display="<p>";
if($result->num_rows >0) {

	while($row = $result->fetch_assoc() ){
		$display.="<button class='";
		$display.="w3-button w3-block w3-teal' ";
		$display.="id='";
		$display.=$row["id"];
		$display.="' onclick='ajaxForInMessage(this.id)' >";
		$display.=$row["TO_BY"];
		$display.="</button>";
	}
}
else
{
	$display.="none";
}
$display.="</p>";
echo $display;
?> 

