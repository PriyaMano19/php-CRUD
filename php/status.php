<?php

include 'config.php';

$id=$_GET['id'];
//$status=$_GET['status'];

/*if ($status == 1) {
    $update_status =  0;
}
if ($status == 0) {
    $update_status =  1;
}*/

$q="UPDATE userdetails set status=0 where customer_id=$id";

mysqli_query($data,$q);
header('location:history_display.php');
?>