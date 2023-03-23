<?php
session_start();
error_reporting(0);
include('inc/config.php');
if (strlen($_SESSION['ceraid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['update'])) {
        $user = $_SESSION['ceraid'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];

        $query = mysqli_query($con, "UPDATE user SET firstName='$fname',lastName='$fname',gender='$gender' WHERE ID='$user'");
        if ($query) {
            $msg = "Profile update successful!!";
        } else {
            $msg = "Something Went Wrong. Please try again.";
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
        <title>Profile Updation</title>
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

    </head>

    <body>
        <?php include('inc/header.php'); ?>
        <div class="ts-main-content">
            <?php include('inc/sidebar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $user = $_SESSION['ceraid'];
                            $ret = mysqli_query($con, "SELECT * FROM user WHERE ID='$user'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {

                            ?>

                                <h2 class="page-title"><?php echo $row['firstName']; ?>'s&nbsp;Profile </h2>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">User Profile</div>


                                            <div class="panel-body">
                                                <form method="post" action="" name="update" class="form-horizontal" onSubmit="return valid();">
                                                    <p style="font-size:16px; color:red" align="center">
                                                        <?php if ($msg) {
                                                            echo $msg;
                                                        }  ?> </p>


                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">First Name : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row['firstName']; ?>" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Last Name : </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row['lastName']; ?>" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Gender : </label>
                                                        <div class="col-sm-8">
                                                            <select name="gender" class="form-control" required="required">
                                                                <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                                <option value="others">Others</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Email id: </label>
                                                        <div class="col-sm-8">
                                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" readonly>
                                                            <span id="user-availability-status" style="font-size:12px;"></span>
                                                        </div>

                                                    </div>
                                                <?php } ?>
                                                <div class="col-sm-6 col-sm-offset-4">

                                                    <input type="submit" name="update" Value="Update Profile" class="btn btn-primary">
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
<?php } ?>