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

  <style>
    * {
      box-sizing: border-box;
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
      background-color: #f2f2f2;
      padding: 3px;
    }
  </style>
</head>
<body>
  <br><br>
  <button class="btn btn-primary"><a class="text-light" href="logout.php">Logout</a></button>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>



  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>



  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript" src="js/addons/datatables.min.js"></script>





  <script>

    $(document).ready(function() {

      $('#example').DataTable();

    } );



  </script>
  
  
  
  <div class="container">
    <center><h1>All Details</h1></center>
    <button class="btn btn-primary my-5"><a class="text-light" href="userhome.php">Form</a></button>
    <table  class="table table-striped table-bordered" id="example">
      <thead>
        <tr>
          <th scope="col">Uid</th>
          <th scope="col">FirstName</th>
          <th scope="col">LastName</th>
          <th scope="col">DOB</th>
          <th scope="col">MobileNumber</th>
          <th scope="col">Address</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

       <?php
       
       
       $sql ="SELECT * FROM userdetails";
       $result=mysqli_query($data,$sql);
       if($result)
       {
         while($row=mysqli_fetch_assoc($result))
         {
           $uid=$row['uid'];
           $fname=$row['fname'];
           $lname=$row['lname'];
           $dob=$row['dob'];
           $pno=$row['mobileno'];
           $address=$row['address'];
           echo '<tr>
           <th scope="row">'.$uid.'</th>
           <td>'.$fname.'</td>
           <td>'.$lname.'</td>
           <td>'.$dob.'</td>
           <td>'. $pno.'</td>
           <td>'.$address.'</td>
           <td>
           <button class="btn btn-primary"><a class="text-light" href="update.php?updateid='.$uid.'">Update</a></button>
           <button class="btn btn-danger"><a class="text-light" href="delete.php?deleteid='.$uid.'">Delete</a></button>

           </td>

           </tr>';
         }

       }

       ?>
       
       
     </tbody>
   </table>

 </div>

</body>
</html>