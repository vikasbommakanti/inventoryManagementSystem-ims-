<?php
session_start();//session starts here

?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Login</title>
</head>
<style>
    /* .login-panel {
        margin-top: 150px; */
        /* Center the login panel vertically */
.login-panel {
    margin-top: 150px;
}

/* Style the page header */
h1 {
    text-align: center;
    font-size: 2em;
    margin-top: 50px;
}

/* Style the login panel */
.panel-success {
    border-color: #5cb85c;
}

.panel-success > .panel-heading {
    background-color: #5cb85c;
    color: #fff;
}

.panel-success > .panel-heading h3 {
    margin-top: 0;
}

/* Style the form input fields */
.form-group {
    margin-bottom: 15px;
}

.form-control {
    height: 50px;
    font-size: 1.2em;
}

/* Style the login button */
.btn-success {
    background-color: #5cb85c;
    border-color: #5cb85c;
    font-size: 1.2em;
    height: 50px;
}

.btn-success:hover, .btn-success:focus, .btn-success:active {
    background-color: #4cae4c;
    border-color: #4cae4c;
}

/* Style the link to the admin login page */
p a {
    font-size: 0.8em;
}


</style>

<body>
<h1 align="center">Inventory Management System</h1>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Emp. No." name="empno" type="" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
                    <p>
                        <a href="admin_login.php">Managers Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<?php

include("database/db_conection.php");

if(isset($_POST['login']))
{
    $emp_no=$_POST['empno'];
    $user_pass=$_POST['pass'];

    $check_user="select * from employees WHERE emp_no='$emp_no' AND passcode='$user_pass'";

    $run=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run))
    {
        echo "<script>window.open('welcome.php','_self')</script>";

        $_SESSION['empno']=$emp_no;//here session is used and value of $user_email store in $_SESSION.

    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
?>