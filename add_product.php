<?php
  $con=mysqli_connect("localhost","root","","ims");
  if($con->connect_error)
{
	echo $con->connect_error;
	die("Sorry");
}
	$sql="SELECT * FROM category";
	$result=$con->query($sql);
	$sql1="SELECT * FROM supplier";
  $result1=$con->query($sql1);

  ?>
  
<html>
<head>
<meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Inward Entries</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
}

nav {
  background-color: #333;
  color: white;
  padding: 10px;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  display: inline-block;
  margin-right: 20px;
}

nav a {
  color: white;
  text-decoration: none;
}

h1 {
  text-align: center;
  font-size: 36px;
  margin-top: 50px;
}

form {
  width: 500px;
  margin: auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

form input[type="text"],
form input[type="number"],
form select {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: none;
  background-color: #f2f2f2;
}

form input[type="submit"] {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: none;
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
  background-color: #3e8e41;
}

p {
  text-align: center;
  margin-top: 20px;
}

  </style>
</head>
<body>  
<ul class="nav nav-pills nav-stacked">
    <li><a href="welcome.php">Home</a></li>
    <li class="aCTIVE"><a href="#">Product add</a></li>
    <li><a href="wmove_out.php">Storage</a></li>
</ul>
  <h1>Product details</h1>


<form method="post" action="ine.php">  
  Product ID: <input type="text" name="productid">
  <br><br>
  Product Name: <input type="text" name="productname">
  <br><br>
  Product Status: <input type="number" name="pstatus">
  <br><br>
  Product Description: <input type="text" name="pdesc">
  <br><br>
  Quantity <input type="number" name="quant">
  <br><br>
  Supplier ID: 
  <select name="supid">
    <?php while($row1= mysqli_fetch_array($result1)):; ?>
    <option value="<?php echo $row1[0] ?>"> <?php echo $row1[0] ?></option>
    <?php endwhile; ?>
  </select>
  <br><br>
  Category ID: 
  <select name="catid">
    <?php while($row= mysqli_fetch_array($result)):; ?>
    <option value="<?php echo $row[0] ?>"> <?php echo $row[0] ?></option>
    <?php endwhile; ?>
  </select>
  <br><br>
  <input  class="btn btn-info btn-lg" type="submit" name="submit" value="Add "> 
</form>
<p>
    <a href="/IMS2/welcome.php" class="btn btn-info btn-lg">
        Go Back
    </a>
</p>
</body>
</html>