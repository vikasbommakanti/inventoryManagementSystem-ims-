<?php
    $dbcon=mysqli_connect("localhost","root","", "ims");
    if($dbcon)
    {
        $query = "Truncate outward";
        $result = mysqli_query($dbcon,$query);
        if($result)
        {
            echo '<script type="text/javascript">alert(" Transaction Successful ")</script>';
        }
    }
?>