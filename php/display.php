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
  <div class="col-md-12 bg-light text-right">
                
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
    <center><h1>Customer Details</h1></center>
    <a class="btn btn-primary my-5" href="userhome.php">ADD</a>
    
    <table  class="table table-striped table-bordered" id="example">
      <thead>
        <tr>
          <th scope="col">Customer_id</th>
          <th scope="col">Image</th>
          <th scope="col">FirstName</th>
          <th scope="col">LastName</th>
        
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
           $uid=$row['customer_id'];
           $image=$row['image'];
           $fname=$row['fname'];
           $lname=$row['lname'];
           
           $pno=$row['mobileno'];
           $address=$row['address'];
           $imgfile =$row['image'];
           
           echo "<tr>
           <th scope='row'>$uid</th>
           <td>  <img src='../upload/$imgfile' alt='vehicle' height='50px'> </td>
           <td>$fname</td>
           <td>$lname</td>
           <td>$pno</td>
           <td>$address</td>
           
           <td class='text-center'>
           

           <a class='btn btn-sm btn-primary' href='update.php?updateid=$uid'><i class='fa fa-edit'></i></a>
           <a class='btn btn-sm btn-danger' href='delete.php?deleteid=$uid'><i class='fa fa-trash'></i></a>

           </td>

           </tr>";
         }

       }

       ?>
       
       
     </tbody>
   </table>

 </div>

</body>
</html>