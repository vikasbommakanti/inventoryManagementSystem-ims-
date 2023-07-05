<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <title>Report</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<body>
<ul class="nav nav-pills nav-stacked">
    <li><a href="admin_home.php">Admin Panel</a></li>
    <li><a href="admin_add.php">Product add</a></li>
    <li><a href="move_out.php">Storage</a></li>
    <li class="active"><a href="#">Report</a></li>
    <!-- <li><a href="tran_id.php">Transaction Ledger</a></li > -->
</ul>

<div class="table-scrol">
   

    <div class="table-responsive">
 
        <form method='post' action='download.php'>

            <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Hire Date</th>
                </tr>
                <?php 
                    include("database/db_conection.php");
                    $query = "SELECT * FROM employees";
                    $result = mysqli_query($dbcon,$query);
                    $user_arr = array();
                    while($row = mysqli_fetch_array($result)){
                    $Emp_no = $row[0];
                    $Name = $row[3];
                    $Dept = $row[6];
                    $DOB = $row[2];
                    $Gender = $row[4];
                    $Hire_date = $row[5];
                    $user_arr[] = array($Emp_no,$Name,$Dept,$Gender,$Hire_date);
                ?>
                <tr>
                <td><?php echo $Emp_no; ?></td>
                <td><?php echo $Name; ?></td>
                <td><?php echo $Dept; ?></td>
                <td><?php echo $DOB; ?></td>
                <td><?php echo $Gender; ?></td>
                <td><?php echo $Hire_date; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <?php 
                $serialize_user_arr = serialize($user_arr);
            ?>
            <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
            <!-- <input class="btn btn-lg btn-success btn-block" type="submit" value='Export' name='userExport'> -->
        </form>
    </div>
</div>
<div class="table-scrol">
    <h1 align="center">Product Report</h1>

    <div class="table-responsive">
 
        <form method='post' action='download.php'>

            <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Category</th>
                </tr>
                <?php 
                    include("database/db_conection.php");
                    $pquery = "SELECT * FROM product";
                    $presult = mysqli_query($dbcon,$pquery);
                    $product_arr = array();
                    while($row = mysqli_fetch_array($presult)){
                        $pid = $row[0];
                        $pname = $row[1];
                        $quant = $row[2];
                        $pstatus = $row[3];
                        $pcat = $row[6];
                    $product_arr[] = array($pid, $pname,$quant, $pstatus, $pcat);
                ?>
                <tr>
                <td><?php echo $pid; ?></td>
                <td><?php echo $pname; ?></td>
                <td><?php echo $quant?></td>
                <td><?php echo $pstatus; ?></td>
                <td><?php echo $pcat; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <?php 
                $serialize_product_arr = serialize($product_arr);
            ?>
            <textarea name='export_data' style='display: none;'><?php echo $serialize_product_arr; ?></textarea>
            <!-- <input class="btn btn-lg btn-success btn-block" type="submit" value='Export' name='prodExport'> -->
        </form>
    </div>
</div>
<div class="table-scrol">
    <h1 align="center">Transaction ledger</h1>

    <div class="table-responsive">
 
        <form method='post' action='download.php'>

            <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                <tr>
                    <th>Transaction ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Product ID</th>
                </tr>
                <?php 
                    include("database/db_conection.php");
                    $pquery = "SELECT * FROM outward";
                    $presult = mysqli_query($dbcon,$pquery);
                    $product_arr = array();
                    while($row = mysqli_fetch_array($presult)){
                        $tid = $row[3];
                        $pname = $row[1];
                        $quant = $row[2];
                        $pid = $row[0];
                    $out_arr[] = array($tid, $pname,$quant, $pid);
                ?>
                <tr>
                <td><?php echo $tid; ?></td>
                <td><?php echo $pname; ?></td>
                <td><?php echo $quant?></td>
                <td><?php echo $pid; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <?php 
                $serialize_out_arr = serialize($out_arr);
            ?>
            <textarea name='export_data' style='display: none;'><?php echo $serialize_out_arr; ?></textarea>
            <!-- <input class="btn btn-lg btn-success btn-block" type="submit" value='Export' name='prodExport'> -->
        </form>
    </div>
</div>

<p>
    <a href="logout.php" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-log-out"></span> Log out
    </a>
</p>

</body>

</html>
