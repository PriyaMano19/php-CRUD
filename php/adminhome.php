<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>adminhome Page</h1>
</body>
    <?php echo $_SESSION["username"] ?>

	<a href="logout.php">Logout</a>
</body>
</html>
