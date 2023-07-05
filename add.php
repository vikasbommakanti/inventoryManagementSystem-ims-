
<?php

$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ims";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

// Retrieve the form data using the $_POST superglobal
if (isset($_POST['userid']) && isset($_POST['passcode'])&&(isset($_POST['name']))&&isset($_POST['gender'])&&isset($_POST['dob'])&&isset($_POST['hire_date'])&&isset($_POST['dp'])){
    $name= $_POST['name'];
    $userid = $_POST['userid'];
    $gender = $_POST['gender'];
    $passcode = $_POST['passcode'];
    $dob = $_POST['dob'];
    $hire_date = $_POST['hire_date'];
    $dp = $_POST['dp'];
    $sql = "INSERT INTO employees VALUES ( '$userid',' $passcode','$dob','$name','$gender','$hire_date','$dp')";

    if (mysqli_query($conn, $sql)) {
        echo "Thread created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}




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
    <li class="aCTIVE"><a href="#">User add</a></li>
    <li><a href="wmove_out.php">Storage</a></li>
</ul>
  <h1>User details</h1>


<form method="post" action="add.php">  
  Employee ID: <input type="int" name="userid" required>
  <br><br>
  Emp Passcode: <input type="password" name="passcode" required>
  <br><br>
  <!-- Employee birthdate: <input type="date" name="pstatus">
  <br><br> -->
  Name: <input type="text" name="name" required>
  <br><br>
  Gender<input type="text" name="gender" required>
  <br><br>
  BirthDate<input type="date" name="dob" required>
  <br><br>
  HireDate<input type="date" name="hire_date" required>
  <br><br>
  Department<input type="number" name="dp" required>
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