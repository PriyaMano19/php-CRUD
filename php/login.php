<?php
include 'config.php';

session_start();


if(isset($_POST['log']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql="select * from login where username= '".$username."' AND password= '".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{ 

   $_SESSION["username"]=$username;
   header("location:index.php");
 }
 elseif($row["usertype"]=="admin")
 {   
  $_SESSION["username"]=$username;
  header("location:adminhome.php");
}
else
{
  echo "username or password incorrect";
}

}

if(isset($_POST['regi']))
{
	
	$Rusername=$_POST['Rusername'];
	$Rpassword=$_POST['Rpassword'];
	$Rusertype=$_POST['Rusertype'];

	$query = "INSERT INTO login (username,password,usertype) values('$Rusername','$Rpassword','$Rusertype')";
	$query_run= mysqli_query($data,$query);
	if($query_run)
	{
		header("location:login.php");
	}
	else
	{
		die(mysqli_error($data));
	}
}



?>







<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
   * {
	box-sizing: border-box;
}
body {
	font-family: poppins;
	font-size: 16px;
	color: #fff;
}
.form-box {
	background-color: rgba(0, 0, 0, 0.7);
	margin: auto auto;
	padding: 40px;
	border-radius: 5px;
	box-shadow: 0 0 10px #000;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	width: 500px;
	height: 430px;
}
.form-box:before {
	background-image: url("../image/car1.png");
	width: 100%;
	height: 100%;
	background-size: cover;
	content: "";
	position: fixed;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -1;
	display: block;
	filter: blur(2px);
}
.form-box .header-text {
	font-size: 32px;
	font-weight: 600;
	padding-bottom: 30px;
	text-align: center;
}
.form-box input {
	margin: 10px 0px;
	border: none;
	padding: 10px;
	border-radius: 5px;
	width: 100%;
	font-size: 18px;
	font-family: poppins;
}
.form-box input[type=checkbox] {
	display: none;
}
.form-box label {
	position: relative;
	margin-left: 5px;
	margin-right: 10px;
	top: 5px;
	display: inline-block;
	width: 20px;
	height: 20px;
	cursor: pointer;
}
.form-box label:before {
	content: "";
	display: inline-block;
	width: 20px;
	height: 20px;
	border-radius: 5px;
	position: absolute;
	left: 0;
	bottom: 1px;
	background-color: #ddd;
}
.form-box input[type=checkbox]:checked+label:before {
	content: "\2713";
	font-size: 20px;
	color: #000;
	text-align: center;
	line-height: 20px;
}
.form-box span {
	font-size: 14px;
}
.regi {
	background-color: deepskyblue;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
	padding: 10px;
	margin: 20px 0px;
}
span a {
	color: #BBB;
}

 
</style>
</head>
<body>


  


<div class="form-box">
      
      <form class="modal-content animate" action="#" method="post">
       
      <div class="header-text">
			Login Form
		</div>
        
          <input type="text" placeholder="Enter Username" name="username" required>

     
          <input type="password" placeholder="Enter Password" name="password" required>
         
          <input id="terms" type="checkbox"> 
          <label for="terms"></label>
          <span>Agree with <a href="#">Terms & Conditions</a></span> 
             
          <input type="submit" class="regi" name="log" value="Login"/>
          <a href="#">Forget Password</a>
      
        
      </form>
    </div>
    




   <!-- <div id="id02" class="modal">
      
      <form class="modal-content animate" action="#" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
          
        </div>

        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="Rusername" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="Rpassword" required>

          

          <label for="psw"><b>User Type</b></label>
          <select id="cars" name="Rusertype">
            <option value="user">user</option>
            <option value="admin">admin</option>
            
          </select> 
          
          
          <input type="submit" class="regi" name="regi" value="Register"/>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
          
        </div>
      </form>
    </div>-->

    <script>
// Get the modal
var modal = document.getElementById('id01');
var regi =  document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



</body>
</html>
