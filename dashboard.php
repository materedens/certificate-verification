<?php
session_start();
error_reporting(0);
include('inc/config.php');
if (strlen($_SESSION['ceraid'] == 0)) {
    header('location:logout.php');
} else { ?>
    <!doctype html>
    <html lang="en" class="no-js">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="theme-color" content="#3e454c">

        <title>Dashboard</title>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-social.css">
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <link rel="stylesheet" href="css/fileinput.min.css">
        <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
        <link rel="stylesheet" href="css/style.css">


    </head>

    <body>
        <?php include("inc/header.php"); ?>

        <div class="ts-main-content">
            <?php include("inc/sidebar.php"); ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">

                            <h2 class="page-title" style="margin-top:5%">Dashboard</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">Search Certificate</div>
                                        <div class="panel-body">
                                            <form action="search-certificate.php" method="POST" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="serial-number">Serial Number:</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" id="serial-number" name="serial-number" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-sm-offset-4">
                                                    <button type="submit" class="btn btn-success" name="search">SEARCH</button>
                                                </div>
                                            </form>
                                            <!-- search certificate -->
                                            <?php
                                            if (isset($_POST['search'])) {
                                                $serialNumber = $_POST['serialNumber'];

                                                $sql = "SELECT * FROM certificates WHERE serialNumber='$serialNumber'";
                                                $result = mysqli_query($con, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo "<table>";
                                                    echo "<tr><td>Serial Number:</td><td>" . $row['serialNumber'] . "</td></tr>";
                                                    echo "<tr><td>Holder Name:</td><td>" . $row['holderName'] . "</td></tr>";
                                                    echo "<tr><td>Institution:</td><td>" . $row['issuingInstitution'] . "</td></tr>";
                                                    echo "<tr><td>Date:</td><td>" . $row['issueDate'] . "</td></tr>";
                                                    echo "<tr><td>Certificate:</td><td>" . $row['certificateUrl'] . "</td></tr>";
                                                    echo "</table>";
                                                } else {
                                                    echo "No certificate found with this serial number";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <!-- Loading Scripts -->
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