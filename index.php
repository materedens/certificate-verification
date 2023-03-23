<?php
session_start();
error_reporting(0);
include('inc/config.php');

//userlogin
if (isset($_POST['login'])) {
    $user = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT ID FROM user WHERE email='$user' && Password='$password'");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['ceraid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        $msg = "Invalid Details!!";
    }
}

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Certificate Verification</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
        function valid() {
            if (document.forgot.password.value != document.forgot.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.forgot.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <?php include('inc/header.php'); ?>
    <div class="ts-main-content">
        <?php include('inc/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">User Login </h2>

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="well row pt-2x pb-3x bk-light">
                                    <div class="col-md-8 col-md-offset-2">

                                        <form action="" name="login" class="form-login" method="POST">
                                            <p style="font-size:16px; color:red" align="center">
                                                <?php if ($msg) {
                                                    echo $msg;
                                                }  ?> </p>
                                            <label for="" class="text-uppercase text-sm">Email:</label>
                                            <input type="email" placeholder="Email" name="email" class="form-control mb" required="true">
                                            <label for="" class="text-uppercase text-sm">Password:</label>
                                            <input type="password" placeholder="Password" name="password" class="form-control mb" required="true">

                                            <input type="submit" name="login" class="btn btn-primary btn-block" value="LogIn">
                                        </form>
                                    </div>
                                </div>
                                <div class="text-center text-light" style="color:black;">
                                    <a href="forgot-password.php" style="color:black;">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
</body>

</html>