<?php
include 'config.php';
if(isset($_POST['vehicleid'])) {

    $id=$_POST['vehicleid'];
    $query = "SELECT * FROM vehicle_no WHERE vehicle_id_fk = '$id'";
    $result=mysqli_query($data,$query);
    $count=mysqli_num_rows($result);

    if($count > 0) {
        while($row = mysqli_fetch_array($result)){
            echo'<option value="'.$row['vn_id'].'">'.$row['vehicle_num'].'</option>';
           
        }
    }

}



?>