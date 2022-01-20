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

  <!-- Bootstrap CSS -->
  <?php include 'head.php' ?>
  <title>userhome</title>
  
</head>
<style>
  div {
    border-radius: 1px;
    margin-left: 300px;
    padding: 10px;
    
   
   }

  div container my-5{
    background: rgba(0, 128, 0, 0.1);
    width:100%;
    
  }


  
 

</style>

<body>


  

 
 
  <br><br>


<div class="bs-example">
    <div class=" clearfix ">
         
               <button onclick="location.href='index.php'"  class="btn btn-sm btn-primary float-right ml-2"><i class="fa fa-home"></i> Home</button>
                <a class="btn btn-sm btn-primary float-right " href="logout.php">Logout</a>
       
    </div>
</div>


  <div class="container my-5" >
 <div class="col-lg-4">
    
    <form  method="POST" id="myForm" class="" enctype="multipart/form-data">
      <center><h1>Add New Details</h1></center>
       <div class="mb-3">
          <?php 
            $sql = "SELECT  image from userdetails";
            $res=mysqli_query($data,$sql);

            $output ="";

            if(mysqli_num_rows($res) < 1) {
              $output .="<h3> no image uploaded</h3>";
            }

            while ($row = mysqli_fetch_array($res) ){
               $output .="<img src='".$row['image']."'style='width:400px;height:400px;'>";
            }
            ?>
         
      </div>

        <style>
          .error{
            color: red;
            font-size: 12px;
          }
        </style>
        <label  class="form-label ">NIC-Number </label>
        <input type="text" class="form-control form-control-sm" id="nic" plcaeholder="Enter your NIC-Number " name="nic" value=  <?php echo $nic;?>  >
        <span id="errornic" class="error"></span><br>


     
        <label  class="form-label">First Name</label>
        <input type="text" class="form-control form-control-sm" id="fname" plcaeholder="Enter your first name" name="fname" value=<?php echo $fname;?>>
        <span id="errorfname" class="error"></span><br>

      
        <label  class="form-label">Last Name</label>
        <input type="text" class="form-control form-control-sm" id="lname" plcaeholder="Enter your last name" name="lname" value=<?php echo $lname;?> >
        <span id="errorlname" class="error"></span><br>
    
        <label  class="form-label">Mobile Nnumber </label>
        <input type="text" class="form-control form-control-sm" id="mno" plcaeholder="Enter your Mobile Nnumber" name="num" value=<?php echo $pno;?>>
        <span id="errormno" class="error"></span><br>
     
        <label  class="form-label">Address </label>
        <input type="text" class="form-control form-control-sm" id="add" plcaeholder="Enter your Addresss " name="add" value=<?php echo $address;?>>
        <span id="erroradd" class="error"></span><br>

     
     
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
