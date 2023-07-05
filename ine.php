<?php
// Initialize the session
session_start();
       
// Store the submitted data sent
// via POST method, stored 
  
// Temporarily in $_POST structure.


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pid = $_POST["productid"];
  $pname = $_POST["productname"];
  $pstatus = $_POST["pstatus"];
  $quantity = $_POST["quant"];
  $pdesc = $_POST["pdesc"];
  $supid = $_POST["supid"];
  $catid = $_POST["catid"];
}
$_SESSION['name'] = $_POST['productid'];
$con=new mysqli("localhost","root","","ims");
if($con->connect_error)
{
	echo $con->connect_error;
	die("Sorry");
}
else
{
	echo "DB connected";
	$sql="INSERT INTO product VALUES('$pid','$pname', '$quantity', '$pstatus','$pdesc','$supid','$catid')";
	if($con->query($sql))
	{
		echo "Data stored";
		
	}
	else
	{
		echo "Insert Data Fail";
	}
}
// header("location:qr.php");
?>