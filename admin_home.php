<?php
session_start();
if(!$_SESSION['managerno'])
{

    header("Location: admin_login.php");//redirect to login page to secure the welcome page without login access.
}

?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <title>IMS ADMIN</title>
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
<!--<?php
    $manno = $_SESSION['managerno'];    
echo $manno;
?>-->

<ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#">Admin Panel</a></li>
    <li><a href="admin_add.php">Product add</a></li>
    <li><a href="move_out.php">Storage</a></li>
    <li><a href="ReportGeneration.php">Report Generation</a></li>
    <!-- <li><a href="tran_id.php">Transaction Ledger</a></li > -->
</ul>


<div class="table-scrol">
    <h1 align="center">Employee Details</h1>

    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
            <thead>

            <tr>

                <th>Employee ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Passcode</th>
                <th>Delete User</th>
            </tr>
            </thead>

            <?php
            include("database/db_conection.php");
            $view_users_query="select * from employees";//select query for viewing users.
            $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.
            $dept = array("Inward", "Storage", "Outward");
            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
            {
                $user_id=$row[0];
                $user_name=$row[3];
                $user_pass=$row[1];
                $user_dept=$row[6];

            ?>

            <tr>
                <!--here showing results in the table -->
                <td><?php echo $user_id;  ?></td>
                <td><?php echo $user_name;  ?></td>
                <td><?php echo $dept[$user_dept-1];  ?></td>
                <td><?php echo $user_pass;  ?></td>
                <td>
                    <a href="delete.php?del=<?php echo $user_id ?>">
                    <button class="btn btn-danger">Delete</button>
                    </a>
                </td> <!--btn btn-danger is a bootstrap button to show danger-->
            </tr>

            <?php } ?>

        </table>
    </div>
</div>

<p>
    <a href="add.php" class="btn btn-info btn-lg">
        Add User
    </a>
</p>
<p>
    <a href="admin_add.php" class="btn btn-info btn-lg">
        Add Product
    </a>
</p>

<p>
    <a href="logout.php" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-log-out"></span> Log out
    </a>
</p>

</body>

</html>
