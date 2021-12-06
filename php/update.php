<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}


session_start();

include 'config.php';

$uid=$_GET['updateid'];

$sql="SELECT * FROM userdetails where uid=$uid";
$result=mysqli_query($data,$sql);
$row=mysqli_fetch_assoc($result);

$fname=$row['fname'];
$lname=$row['lname'];
$dob=$row['dob'];
$pno=$row['mobileno'];
$address=$row['address'];

if(isset($_POST['update']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$pnum=$_POST['num'];
	$address=$_POST['add'];
	

	$sql="UPDATE userdetails set uid=$uid,fname='$fname',lname='$lname',dob='$dob',mobileno='$pnum',address='$address' where uid=$uid";
	$result=mysqli_query($data,$sql);
	if($result)
	{
    //echo'updated successfully';
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
  <style>
    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
  </style>
</head>
<body>
  <br><br>
  <button class="btn btn-primary"><a class="text-light" href="logout.php">Logout</a></button>

  <center><h1>userhome Page</h1></center>
</body>

<div class="container my-5">

  <form  method="POST" id="myForm">
    <div class="mb-3">
      <label  class="form-label">First Name</label>
      <input type="text" class="form-control" plcaeholder="Enter your first name" name="fname" autocomplete="off" value=<?php echo $fname;?> >
    </div>

    <div class="mb-3">
      <label  class="form-label">Last Name</label>
      <input type="text" class="form-control" plcaeholder="Enter your last name" name="lname" autocomplete="off" value=<?php echo $lname;?>  >
    </div>

    <div class="mb-3">
      <label  class="form-label">Date Of Birth </label>
      <input type="Date" class="form-control" plcaeholder="Enter your Date Of Birth" name="dob" autocomplete="off" value=<?php echo $dob;?>  >
    </div>

    <div class="mb-3">
      <label  class="form-label">Mobile Nnumber </label>
      <input type="text" class="form-control" plcaeholder="Enter your Mobile Nnumber" name="num" autocomplete="off" value=<?php echo $pno;?> >
    </div>

    <div class="mb-3">
      <label  class="form-label">Addresss </label>
      <input type="text" class="form-control" plcaeholder="Enter your Addresss " name="add" autocomplete="off" value=<?php echo $address;?>  >
    </div>


    <button type="submit" name="update"class="btn btn-primary">Update</button>
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
