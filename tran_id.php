<?php 
$mysqli = new mysqli("localhost","root","","ims");

if($mysqli->connect_error){
    die('connect Error('.
    $mysqli->connect_errno.')'.
    $mysqli->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Outward management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
</head>
<body>
<ul class="nav nav-pills nav-stacked">
    <li><a href="admin_home.php">Admin Panel</a></li>
    <li><a href="admin_add.php">Product add</a></li>
    <li><a href="move_out.php">Storage</a></li>
    <li><a href="ReportGeneration.php">Report</a></li>
    <!-- <li class="active"><a href="#">Transaction Ledger</a></li > -->
</ul>

<?php

    //$sql="ALTER TABLE outward ADD transaction_id int ";   
    //$result1=$mysqli->query($sql);
    $sql="SELECT * FROM outward";
    $result2=$mysqli->query($sql);
    while($rows=$result2->fetch_assoc()){
         $rand=rand(1000000,10000000);
         $pr=$rows['product_id'];
         if($rows['transaction_id']==NULL)
         $sql="UPDATE outward SET transaction_id=$rand WHERE product_id=$pr";
         $result=$mysqli->query($sql);
    }
    $sql="SELECT * FROM outward";
    $result=$mysqli->query($sql);

?>
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th>transaction_id</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        if(!empty($result)){
        while($rows=$result->fetch_assoc())
        {
        ?>
      <tr>
        <td><?php echo $rows['transaction_id'] ?></td>
        <td><?php echo $rows['product_id'];?></td>
        <td><?php echo $rows['product'];?></td>
        <td><?php echo $rows['quantity'];?></td>
      </tr>
      <?php
        }
    }
        ?>
    </tbody>
  </table>

</div>
<p>
    <a href="rst_ledger.php" class="btn btn-info btn-lg">
        Reset Ledger
    </a>
</p>


</body>