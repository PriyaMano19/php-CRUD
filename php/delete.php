<?php
include 'config.php';

session_start();

if(isset($_GET['deleteid']))
{
	$uid=$_GET['deleteid'];

	$sql="DELETE FROM userdetails where uid=$uid";
	$result=mysqli_query($data,$sql);
	if($result)
	{
			//echo'deleted successfully';
		header("location:display.php");
	}
	else
	{
		die(mysqli_error($data));
	}
}

?>