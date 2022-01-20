<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}




include 'config.php';

$uid=$_GET['updateid'];

$sql="SELECT * FROM userdetails where customer_id=$uid";
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
$filename = "upload/".$file;
$error_vehicle = "";

if(isset($_POST['update']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$nic=$_POST['nic'];
	$pnum=$_POST['num'];
	$address=$_POST['add'];
  echo $vehicle=$_POST['vehi'];
  $vehicleno=$_POST['vehino'];
  $file = $_FILES['img']['name'];

  
  if ($vehicle == "") {
    $error_vehicle = "please select vehicle type";
   
  }else {
    $sql="UPDATE userdetails set customer_id='$uid',image='$filename',fname='$fname',lname='$lname',nic='$nic',mobileno='$pnum',address='$address',vehicle='$vehicle',vehicleno='$vehicleno' where customer_id=$uid";
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

}

  }


	
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php include 'head.php' ?>

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
  <div class="col-md-12 bg-light text-right">
                
                <button onclick="location.href='index.php'"  class="btn btn-sm btn-primary"><i class="fa fa-home"></i> Home</button>
                <a class="btn btn-sm btn-primary" href="logout.php">Logout</a>
       
               
               
            </div>

  <center><h1>userhome Page</h1></center>
</body>

<div class="container my-5">

  <form  method="POST" id="myForm" enctype="multipart/form-data">

    <div class="mb-3">
        <label  class="form-label">Update Photo</label>
       
        <input type="file" class="form-control" name="img"  value=  <?php echo 	$filename;?>  >
        
         
      </div>

      <div class="mb-3">
      <label  class="form-label">NIC-No </label>
      <input type="text" class="form-control" plcaeholder="Enter your NIC-No " id="nic" name="nic" autocomplete="off" value=  <?php echo $nic;?>  >
    </div>


    <div class="mb-3">
      <label  class="form-label">First Name</label>
      <input type="text" class="form-control" plcaeholder="Enter your first name" id="fname" name="fname" autocomplete="off" value=<?php echo $fname;?> >
    </div>

    <div class="mb-3">
      <label  class="form-label">Last Name</label>
      <input type="text" class="form-control" plcaeholder="Enter your last name" id="lname" name="lname" autocomplete="off" value=<?php echo $lname;?>  >
    </div>

   
    <div class="mb-3">
      <label  class="form-label">Mobile Nnumber </label>
      <input type="text" class="form-control" plcaeholder="Enter your Mobile Nnumber" id="mno" name="num" autocomplete="off" value=<?php echo $pno;?> >
    </div>

    <div class="mb-3">
      <label  class="form-label">Address </label>
      <input type="text" class="form-control" plcaeholder="Enter your Addresss " id="add" name="add" autocomplete="off" value=<?php echo $address;?>  >
    </div>

    <label  class="form-label">Vehicle Type </label>
    <span><?php echo $error_vehicle; ?></span>
        <select  name="vehi" id = "vehicle" class="form-control form-control-sm">
        <option value="">select vehicle</option>
         <?php
         $query = "SELECT * FROM vehicle";
         $result=mysqli_query($data,$query);
         while($row = mysqli_fetch_array($result) ){
           $v_id=$row['vid'];
           $v_type=$row['vehicletype'];
           if ($v_id == $vehicle) {
             $sl = "selected";
           }else{
             $sl="";
           }
          echo " <option  value='$v_id'>$v_type </option>";
         }


         ?>

        </select>
     

   
        <label  class="form-label">Vehicle Number</label>
        <select  name="vehino" id="num" class="form-control form-control-sm">
        <option>select vehicle Number</option>
      
        </select>
    <br><br><br>


    <button type="submit" name="update"class="btn btn-primary">Update</button>
    <input type="button" class="btn btn-primary" onclick="myFunction()" value="Reset">
  </form>

</div>


<script>
  function myFunction() {
    document.getElementById("myForm").reset();
  }
</script>

<script type="text/javascript">
// Load sub cat  and brand for Catogery
    $(document).ready(function(){
      $("#vehicle").change(function(){
        var vid = $(this).val();
        $.ajax({
          url:"ajax.php",
          type:"POST",
          cache:false,
          data:{vehicleid:vid},
          success:function(data){
           // alert(data);
           $("#num").html(data);
          }
        });

       
       
      }); 
    });
  </script>

</body>
</html>
