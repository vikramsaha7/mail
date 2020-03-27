<?php
Session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>mail</title>
</head>
<body>

<?php
	if(!isset($_SESSION["loginid"]))
	{
		header("Location: login.html");
	}
	echo "hello :  ";
	echo $_SESSION["name"];
?>

<a href="logout.php">logout</a>

</body>
</html>