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
	$nicno=$_POST['nic'];
	$pnum=$_POST['num'];
	$address=$_POST['add'];
  $vehicle=$_POST['vehi'];
  $vehicleno=$_POST['vehino'];
  $file = $_FILES['img']['name'];
  $filename =  $vehicleno.$_FILES["img"]["name"];

if(file_exists("upload/" .$_FILES['img']['name'] )) {

  $store = $_FILES['img']['name'];
  //$_SESSION['status'] ="image already exist. '.$store.'";
 
}else{
          $sql="INSERT INTO userdetails (image,fname,lname,nic,mobileno,address,vehicle,vehicleno) values('$filename','$fname','$lname','$nicno','$pnum','$address','$vehicle','$vehicleno')";



        $result=mysqli_query($data,$sql);
          if($result)
          {
            move_uploaded_file($_FILES['img']['tmp_name'], "../upload/".$filename);
            header("location:display.php");
            
          }
          else 
          {
            die(mysqli_error($data));

          } 

    }

}

/*if(isset($_POST['upload'])) {
    $file = $_FILES['img']['name'];


    $sql = "INSERT INTO userdetails (image) values ('$file')";


  $result=mysqli_query($data,$sql);
  if($result)
  {
    //header("location:display.php");
    move_uploaded_file($_FILES['img']['tmp_name'], "$file" );
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


  
  .input-control.error input{
    border-color: #ff3860;
  }
  .input-control.success input{
    border-color: #09c372;
  }

  .input-control.error {
    border-color: #ff3860;
    font-size: 9px;
    height: 13px;
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
        <input type="text" class="form-control form-control-sm" id="nic" plcaeholder="Enter your NIC-Number " name="nic" >
        <span id="errornic" class="error"></span><br>


     
        <label  class="form-label">First Name</label>
        <input type="text" class="form-control form-control-sm" id="fname" plcaeholder="Enter your first name" name="fname" >
        <span id="errorfname" class="error"></span><br>

      
        <label  class="form-label">Last Name</label>
        <input type="text" class="form-control form-control-sm" id="lname" plcaeholder="Enter your last name" name="lname" >
        <span id="errorlname" class="error"></span><br>
    
        <label  class="form-label">Mobile Nnumber </label>
        <input type="text" class="form-control form-control-sm" id="mno" plcaeholder="Enter your Mobile Nnumber" name="num" >
        <span id="errormno" class="error"></span><br>
     
        <label  class="form-label">Address </label>
        <input type="text" class="form-control form-control-sm" id="add" plcaeholder="Enter your Addresss " name="add" >
        <span id="erroradd" class="error"></span><br>

     
     
        <label  class="form-label">Vehicle </label>
        <select  name="vehi" id = "vehicle" class="form-control form-control-sm">
        <option>select vehicle</option>
         <?php
         $query = "SELECT * FROM vehicle";
         $result=mysqli_query($data,$query);
         while($row = mysqli_fetch_array($result)){
           echo '<option value="'.$row['vid'].'">'.$row['vehicletype'].'</option>';
         }


         ?>

        </select>
     

   
        <label  class="form-label">Vehicle Number </label>
        <select  name="vehino" id="num" class="form-control form-control-sm">
        <option>select vehicle Number</option>

        </select>
  

      
    
        <label  class="form-label">Upload Photo </label>
        <input type="file" class="form-control form-control-sm"  name="img" >
        
         
  

      <br><br><br>
      


      <button type="submit" name="save" id="save" class="btn btn-primary">Save</button>
      <input type="button" class="btn btn-primary" onclick="myFunction()" value="Reset">
    </form>

        </div>

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

  <script>

  $(document).ready(function(){
  $("#save").click(function(){
   var nic = $("#nic").val();
   var fname = $("#fname").val();
   var lname = $("#lname").val();
   var mno = $("#mno").val();
   var address = $("#add").val();
   

    if (nic == "") {
      $("#errornic").html("NIC is required");
      
    }
    if (fname == "") {
      $("#errorfname").html("First Name is required");
    }
    if (lname == "") {
      $("#errorlname").html("Last Name is required");
    }
   if (mno == "" || mno.length() < 10) {
      $("#errormno").html("Mobile Number Name is required");
    }
    else if (address == "") {
      $("#erroradd").html("Address is required");
    }
    
  });
});
  </script>

</body>
</html>
