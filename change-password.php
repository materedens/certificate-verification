<?php
session_start();
error_reporting();
include('inc/config.php');

if (strlen($_SESSION['ceraid'] == 0)) {
    header('location:logout.php');
} else {
    //passwordchange
    if (isset($_POST['change'])) {
        $user = $_SESSION['ceraid'];
        $cpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);
        $query = mysqli_query($con, "SELECT ID FROM user WHERE ID='$user' and Password='$cpassword'");
        $row = mysqli_fetch_array($query);
        if ($row > 0) {
            $ret = mysqli_query($con, "UPDATE user SET Password='$newpassword' WHERE ID='$user'");
            $msg = "Password Successfully Changed!!";
        } else {
            $msg = "Current Password Incorrect!!";
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
        <title>Change Password</title>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-social.css">
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <link rel="stylesheet" href="css/fileinput.min.css">
        <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
        <script type="text/javascript" src="js/validation.min.js"></script>
        <script type="text/javascript">
            function checkpass() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert('New Password and Confirm Password field does not match');
                    document.changepassword.confirmpassword.focus();
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

                            <h2 class="page-title">Change Password </h2>

                            <div class="row">

                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>Change</strong> Password
                                        </div>
                                        <div class="panel-body">
                                            <form method="POST" class="form-horizontal" name="change" id="change-pwd" onSubmit="return valid();">
                                                <p style="font-size:16px; color:red" align="center">
                                                    <?php if ($msg) {
                                                        echo $msg;
                                                    }  ?> </p>
                                                <?php
                                                $user = $_SESSION['ceraid'];
                                                $ret = mysqli_query($con, "SELECT * FROM user WHERE ID='$user'");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {


                                                ?>
                                                    <div class="hr-dashed"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">Current Password: </label>
                                                        <div class="col-sm-8">
                                                            <input type="password" value="" name="currentpassword" id="currentpassword" class="form-control" onBlur="checkpass()" required="required">
                                                            <span id="password-availability-status" class="help-block m-b-none" style="font-size:12px;"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">New Password:</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control" name="newpassword" id="newpassword" value="" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">Confirm Password:</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control" value="" required="required" id="cpassword" name="confirmpassword">
                                                        </div>
                                                    </div>
                                                <?php  } ?>
                                                <div class="col-sm-6 col-sm-offset-4">
                                                    <button class="btn btn-default" type="submit">Cancel</button>
                                                    <input type="submit" name="change" Value="Change Password" class="btn btn-primary">
                                                </div>
                                            </form>
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

        <script>
            function checkpass() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'oldpassword=' + $("#oldpassword").val(),
                    type: "POST",
                    success: function(data) {
                        $("#password-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
    </body>

    </html>
<?php } ?>