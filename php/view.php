<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}

include 'config.php';

function vehiclename($vid){
  global $data;
 $sql ="SELECT * FROM vehicle WHERE vid = $vid";
 $result=mysqli_query($data,$sql);
 $row=mysqli_fetch_assoc($result);
echo $row['vehicletype'];
}

function vehiclenumber($vid){
 global $data;
$sql ="SELECT * FROM vehicle_no WHERE vehicle_id_fk = $vid";
$result=mysqli_query($data,$sql);
$row=mysqli_fetch_assoc($result);
echo $row['vehicle_num'];
}

$uid=$_GET['updateid'];

 $sql="SELECT * FROM userdetails where customer_id=$uid limit 1";
$result=mysqli_query($data,$sql);
$row=mysqli_fetch_assoc($result);

$fname=$row['fname'];
$lname=$row['lname'];
$nic=$row['nic'];
$pno=$row['mobileno'];
$address=$row['address'];
$vehicle=$row['vehicle'];
$vehicleno=$row['vehicleno'];
$file = $row['image'];

/*if(isset($_POST['update']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$nic=$_POST['nic'];
	$pnum=$_POST['num'];
	$address=$_POST['add'];
  $vehicle=$_POST['vehi'];
  $vehicleno=$_POST['vehino'];
  $file = $_FILES['img']['name'];
	

	$sql="UPDATE userdetails set customer_id='$uid',image='$file',fname='$fname',lname='$lname',nic='$nic',mobileno='$pnum',address='$address',vehicle='$vehicle',vehicleno='$vehicleno' where uid=$uid";
	$result=mysqli_query($data,$sql);
	if($result)
	{
    //echo'updated successfully';
    move_uploaded_file($_FILES['img']['tmp_name'], "upload/" .$_FILES['img']['name'] );
		header("location:display.php");
	}
	else 
	{
		die(mysqli_error($data));

	} 

}*/

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>userhome</title>
  <style>
    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}
  </style>
</head>
<body>
  <br><br>
  <div class="col-md-12 bg-light text-right">
                
                <button onclick="location.href='index.php'"  class="btn btn-sm btn-primary"><i class="fa fa-home"></i> Home</button>
                <a class="btn btn-sm btn-primary" href="logout.php">Logout</a>
       
               
               
            </div>


  <center><h1>userhome Page</h1></center>
</body>

<div class="container my-5">

  <form  method="POST" id="myForm" enctype="multipart/form-data">

    <div class="mb-3">
        <!--<label  class="form-label">Update Photo</label>
        <input type="file" class="form-control"  name="img" value=  >-->
        <img     src="../upload/<?php echo $row['image']; ?>"  height="150px" alt="image" >
       
         
      </div>

      <div class="mb-3">
      <label  class="form-label">NIC-No </label>
      <input type="text" class="form-control" plcaeholder="Enter your NIC-No " id="nic" name="nic" autocomplete="off" value=<?php echo $nic;?> disabled >
    </div>


    <div class="mb-3">
      <label  class="form-label">First Name</label>
      <input type="text" class="form-control" plcaeholder="Enter your first name" id="fname" name="fname" autocomplete="off" value=<?php echo $fname;?> disabled>
    </div>

    <div class="mb-3">
      <label  class="form-label">Last Name</label>
      <input type="text" class="form-control" plcaeholder="Enter your last name" id="lname" name="lname" autocomplete="off" value=<?php echo $lname;?> disabled >
    </div>

   
    <div class="mb-3">
      <label  class="form-label">Mobile Nnumber </label>
      <input type="text" class="form-control" plcaeholder="Enter your Mobile Nnumber" id="mno" name="num" autocomplete="off" value=<?php echo $pno;?> disabled>
    </div>

    <div class="mb-3">
      <label  class="form-label">Address </label>
      <input type="text" class="form-control" plcaeholder="Enter your Addresss " id="add" name="add" autocomplete="off" value=<?php echo $address;?>  disabled>
    </div>

   
    <div class="mb-3">
      <label  class="form-label">Vehicle Type </label>
      <input type="text" class="form-control"  name="vehi" autocomplete="off" value=<?php vehiclename($vehicle)?>  disabled>
    </div>

    
    <div class="mb-3">
      <label  class="form-label">Vehicle Number </label>
      <input type="text" class="form-control"  name="vehi" autocomplete="off" value=<?php vehiclenumber($vehicleno)?> disabled>
    </div>

    <br><br><br>


    <!--<button type="submit" name="update"class="btn btn-primary">Update</button>
    <input type="button" class="btn btn-primary" onclick="myFunction()" value="Reset">-->
  </form>

</div>


<script>
  function myFunction() {
    document.getElementById("myForm").reset();
  }
</script>
</body>
</html>
