<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}

include 'config.php';

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>


<div class="row">
  <div class="column">
    <img src="../image/bg-white.jpg" alt="Snow" style="width:100%">
    <a href = "formtest.php"  type="submit" class="btn btn-primary" style="width:100%">Add New Details</a>
  </div>
  <div class="column">
    <img src="../image/bg-white.jpg" alt="Forest" style="width:100%">
    <a href = "display.php"  type="submit"class="btn btn-primary" style="width:100%">Customer Details</a>
  </div>
  <div class="column">
    <img src="../image/bg-white.jpg" alt="Mountains" style="width:100%">
    <a href = "history_display.php" type="submit" class="btn btn-primary" style="width:100%">Order Summary</a>
  </div>
</div>

</body>
</html>
