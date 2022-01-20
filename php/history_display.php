<?php
include 'config.php';


session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    * {
      box-sizing: border-box;
  
    }

    .btn-home {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}



    #myInput {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }



    #myTable {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 18px;
    }



    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
    }



    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
    }



    #myTable tr {
      border-bottom: 1px solid #ddd;
    }



    #myTable tr.header, #myTable tr:hover {
      background-color: #f1f1f1;
    }
  </style>


  <title>Details</title>
  <style>
    div {
      border-radius: 5px;
      /*background-color: #f2f2f2;*/
      padding: 3px;
    }
  </style>
</head>
<body>
  <br><br>
  <div class="col-md-12  text-right">
                
                <button onclick="location.href='index.php'"  class="btn btn-sm btn-primary"><i class="fa fa-home"></i> Home</button>
                <a class="btn btn-sm btn-primary" href="logout.php">Logout</a>
       
               
               
            </div>

  
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>



  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>



  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript" src="js/addons/datatables.min.js"></script>





  <script>

    $(document).ready(function() {

      $('#example').DataTable();

    } );



  </script>
  
  
  
  <div class="container my-5">
    <center><h1>Order Summary  Details</h1></center>
    <a class="btn btn-primary my-5" href="userhome.php">ADD</a>
    
    <table  class="table table-striped table-bordered" id="example">
      <thead>
        <tr>
          <th scope="col">customer_ID</th>
         
          <th scope="col">NIC</th>
          <th scope="col">Vehicle</th>
          <th scope="col">Vehicle Number</th>
          <th scope="col">Created_Date</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

       <?php
       
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


       $sql ="SELECT * FROM userdetails WHERE status = 1";
       $result=mysqli_query($data,$sql);
       if($result)
       {
         while($row=mysqli_fetch_assoc($result))
         {
           $uid=$row['customer_id'];
         
           $nic=$row['nic'];
           
           $vehicle=$row['vehicle'];
           $vehicleno=$row['vehicleno'];
           $date=$row['created_date'];
           $status=$row['status'];

           ?>
           <tr>
             <td><?php echo $uid; ?></td>
             <td><?php echo $nic; ?></td>
             <td><?php vehiclename($vehicle) ?></td>
             <td><?php vehiclenumber($vehicleno) ?></td>
             <td><?php echo $date; ?></td>
             
             <td class="text-center">
               <?php
                if ($status == 1) {
                  echo "<a class='btn btn-sm btn-danger ' href='status.php?id=$uid'><i class='fa fa-ban'></i></a>";
                }
                else{
                  echo "enable";
                }
               ?>
             </td>
             <td class="text-center">
             <a class="btn btn-sm btn-primary" href="view.php?updateid=<?php echo $uid; ?>"><i class="fa fa-eye"></i></a>
           <!-- <a class="btn btn-sm btn-danger" href="delete.php?deleteid="><i class="fa fa-trash"></i></a>-->
             </td>
           </tr>
           <?php
         }

       }

       ?>
       
       
     </tbody>
   </table>

 </div>

</body>
</html>