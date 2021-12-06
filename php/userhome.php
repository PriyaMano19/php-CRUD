<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}

include 'config.php';
if(isset($_POST['save']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$pnum=$_POST['num'];
	$address=$_POST['add'];
	

	$sql="INSERT INTO userdetails (fname,lname,dob,mobileno,address) values('$fname','$lname','$dob','$pnum','$address')";

	$result=mysqli_query($data,$sql);
	if($result)
	{
		header("location:display.php");
	}
	else 
	{
		die(mysqli_error($data));

	} 

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 

  <title>userhome</title>
</head>
<style>
  div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
</style>

<body>


  <br>

  <button class="btn btn-primary"><a class="text-light" href="logout.php">Logout</a></button>
  <button class="btn btn-primary"><a class="text-light" href="display.php">Show Details</a></button>

  <div class="container my-5">

    <form  method="POST" id="myForm">
      <center><h1>User Details</h1></center>
      <div class="mb-3">
        <label  class="form-label">First Name</label>
        <input type="text" class="form-control" plcaeholder="Enter your first name" name="fname" >
      </div>

      <div class="mb-3">
        <label  class="form-label">Last Name</label>
        <input type="text" class="form-control" plcaeholder="Enter your last name" name="lname" >
      </div>

      <div class="mb-3">
        <label  class="form-label">Date Of Birth </label>
        <input type="Date" class="form-control" plcaeholder="Enter your Date Of Birth" name="dob" >
      </div>

      <div class="mb-3">
        <label  class="form-label">Mobile Nnumber </label>
        <input type="text" class="form-control" plcaeholder="Enter your Mobile Nnumber" name="num" >
      </div>

      <div class="mb-3">
        <label  class="form-label">Addresss </label>
        <input type="text" class="form-control" plcaeholder="Enter your Addresss " name="add" >
      </div>


      <button type="submit" name="save"class="btn btn-primary">Save</button>
      <input type="button" class="btn btn-primary" onclick="myFunction()" value="Reset">
    </form>

  </div>

  <script>
    function myFunction() {
      document.getElementById("myForm").reset();
    }
  </script>
</body>
</html>
