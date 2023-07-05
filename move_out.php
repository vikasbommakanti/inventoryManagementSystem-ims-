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
  <title>Category management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
</head>

<body>
<ul class="nav nav-pills nav-stacked">
    <li><a href="admin_home.php">Admin Panel</a></li>
    <li><a href="admin_add.php">Product add</a></li>
    <li class="active"><a href="move_out.php">Storage</a></li>
    <li ><a href="ReportGeneration.php">Report Generation</a></li>
    <!-- <li><a href="tran_id.php">Transaction Ledger</a></li > -->
</ul>
<div class="container"  >
<form method="POST">
<?php
    $sql="SELECT product_ID,product_Name,product_desc,Quantity FROM product ";
    $result=$mysqli->query($sql);       
?>
 
  <table class="table">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Description</th>
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
        <td><?php echo $rows['product_ID'];?></td>
        <td><?php echo $rows['product_Name'];?></td>
        <td><?php echo $rows['product_desc'];?></td>
        <td><?php echo $rows['Quantity'];?></td>
      </tr>
      <?php
        }
    }
        ?>
    </tbody>
  </table>
  <div class="form-group">
  <label for="usr">To move item to outward...</label><br/>
             <label for="usr">Enter Product ID</label>
                <input type="text" name="prid"  class="form-control" id="usr"  required>
        </div>
   
  <div class="form-group">
  <label for="usr">Enter Quantity</label>
  <input type="text" name="quan"  class="form-control" id="usr" required>
</div>
<div class="text-center m-2">
            <input type="submit" name="button2" class="btn btn-primary" value="Submit" />
     </div>  
<?php
        if(!empty($_POST['prid'])){
        $prid=$_POST['prid'];
        $quan=$_POST['quan'];   
        }
        if(isset($_POST['button2']))
        {
    
            $sql3="SELECT Quantity FROM product WHERE product_ID=$prid";
            $result3=$mysqli->query($sql3);
            $rows1=$result3->fetch_assoc();
            $find1=$rows1['quantity'];
            if($quan=="0")
            {
              echo '<script type="text/javascript">alert("Cannot enter 0 quantity");history.go(-1);</script>';
            }
            else{
            $sql="UPDATE product SET Quantity=Quantity-$quan WHERE product_ID=$prid";
            $result=$mysqli->query($sql);
            $sql2="SELECT * FROM product WHERE product_ID=$prid";
            $result2= $mysqli->query($sql2);
            $rows2=$result2->fetch_assoc();
            $data=$rows2['product_Name'];
            $rand = rand(1000000,10000000);
            $sql1="INSERT INTO outward (product_id, product, quantity,transaction_id) VALUES ($prid,'$data',$quan,$rand)";
            $result1=$mysqli->query($sql1);
            echo '<script type="text/javascript">alert(" Transaction Successful ");history.go(-1);</script>';
            }
        }
?>
 </form>
  </div>
  <p>
    <a href="logout.php" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-log-out"></span> Log out
    </a>
</p>
</body>