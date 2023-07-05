<?php
session_start();

if(!$_SESSION['empno'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}


?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>
        Registration
    </title>
    <style>
        /* Center the content vertically */
body {
  /* display: flex; */
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  font-family: Arial, sans-serif;
}

/* Style the navigation menu */
.nav-pills > li > a {
  border-radius: 0;
  background-color: #4CAF50;
  color: white;
  width : 100%;
}

.nav-pills > li > a:hover,
.nav-pills > li > a:focus {
  background-color: #5cb85c;
  width: 100%;
}

/* Style the welcome message */
h1 {
  font-size: 48px;
  text-align: center;
  margin-bottom: 20px;
}

p {
  font-size: 24px;
  text-align: center;
  margin-bottom: 20px;
}

/* Style the buttons */
.btn {
  border-radius: 0;
  font-size: 24px;
}

.btn-info {
  background-color: #2196F3;
  color: white;
}

.btn-info:hover,
.btn-info:focus {
  background-color: #0d8bf2;
}

.btn-lg {
  padding: 15px 30px;
  margin: 10px;
}

/* Style the logout button */
.glyphicon-log-out {
  margin-right: 10px;
}

    </style>
</head>

<body >
<ul class="nav nav-pills nav-stacked">
    <li class="aCTIVE"><a href="welcome.php">Home</a></li>

    <!-- <li> <a href="temp.php">add Supplier</a></li> -->
    <li><a href="add_product.php">Product add</a></li>
    <li><a href="wmove_out.php">Storage</a></li>
</ul>
<h1>Welcome</h1><br>
<p >
<?php
include("database/db_conection.php");
$empno = $_SESSION['empno'];
$pquery = "SELECT * FROM employees where emp_no='$empno'";
$presult = mysqli_query($dbcon,$pquery);
$row = mysqli_fetch_array($presult);
echo "$row[3] NO: $row[0]";
?>
</p>
<p>
    <a href="add_product.php" class="btn btn-info btn-lg">
        Add Product
    </a>
</p>
<p>
    <a href="temp.php" class="btn btn-info btn-lg">
        Add Supplier
    </a>
</p>

<!--<h1><a href="logout.php">Logout here</a> </h1>-->
<p>
    <a href="logout.php" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-log-out"></span> Log out
    </a>
</p>


</body>

</html>

