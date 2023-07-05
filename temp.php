<?php


$mysqli = new mysqli("localhost", "root", "", "ims");

// Check if there are any connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// Create the SQL query to retrieve data from the "supplier" table
$sql = "SELECT * FROM supplier";

// Execute the query and store the result set in a variable
$result = $mysqli->query($sql);

// Check if there are any errors in executing the query
if (!$result) {
    die("Query failed: " . $mysqli->error);
}

// Print the table header
echo "<table>";
echo "<tr><th>Column 1</th><th>Column 2</th></tr>";

// Loop through each row in the result set and print the data in a table row
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["sup_no"] . "</td><td>" . $row["name"] . "</td></tr>";
}

// Close the table
echo "</table>";

// Close the MySQLi connection
$mysqli->close();
?>



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
if (isset($_POST['name']) && isset($_POST['id'])){
    $name = $_POST['name'];
    $id = $_POST['id'];
    
    $sql = "INSERT INTO supplier VALUES ( '$id','$name','939886')";

    if (mysqli_query($conn, $sql)) {
        echo "Thread created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}




?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Supplier</title>
    <style>
        /* Style for table */
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Style for form */
form {
  max-width: 500px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

    </style>
</head>
<body>
	<h1>Add Supplier</h1>
	<form method="POST" action="temp.php">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="id">ID:</label>
		<input type="text" name="id" id="id" required><br><br>
		<input type="submit" value="Add Supplier">
	</form>
</body>
</html>

