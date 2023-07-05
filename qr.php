<?php
  session_start();
// Include the qrlib file
include 'phpqrcode/qrlib.php';


  $text = $_SESSION['name'];
  $path = 'images/';
$file = $path.uniqid().".png";
  
// $ecc stores error correction capability('L')
$ecc = 'L';
$pixel_Size = 10;
$frame_Size = 10;
  
// Generates QR Code and Stores it in directory given
QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size);
  
// Displaying the stored QR code from directory
echo "<center><img src='".$file."'></center>";
// $text variable has data for QR 

  
// QR Code generation using png()
// When this function has only the
// text parameter it directly
// outputs QR in the browser
//QRcode::png($text);
?>
<html>
<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <body>
    
  <p>
    <a href="/IMS2/welcome.php" class="btn btn-info btn-lg">
        Back
    </a>
  </p>
  </body>
</html>