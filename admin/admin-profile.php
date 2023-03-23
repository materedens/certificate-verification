<?php
session_start();
error_reporting(0);
include('inc/config.php');
if (strlen($_SESSION['ceraid'] == 0)) {
	header('location:logout.php');
} else {
	//passwordchange
	if (isset($_POST['change'])) {
		$adminid = $_SESSION['ceraid'];
		$oldpassword = md5($_POST['oldpassword']);
		$newpassword = md5($_POST['newpassword']);
		$query = mysqli_query($con, "SELECT ID FROM admin WHERE ID='$adminid' and Password='$oldpassword'");
		$row = mysqli_fetch_array($query);
		if ($row > 0) {
			$ret = mysqli_query($con, "UPDATE admin SET Password='$newpassword' WHERE ID='$adminid'");
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
		<title>Admin Profile</title>
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
		<script type="text/javascript">
			function valid() {

				if (document.changepwd.newpassword.value != document.changepwd.cpassword.value) {
					alert("Password and Re-Type Password Field do not match  !!");
					document.changepwd.cpassword.focus();
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

							<h2 class="page-title">Admin Profile</h2>


							<div class="row">
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">Admin profile details</div>
										<div class="panel-body">
											<form method="post" class="form-horizontal">

												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Username </label>
													<div class="col-sm-10">
														<input type="text" value="" disabled class="form-control"><span class="help-block m-b-none">
															Username can't be changed.</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Email</label>
													<div class="col-sm-10">
														<input type="email" class="form-control" name="emailid" id="emailid" value="" required="required">

													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Reg Date</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" value="" disabled>
													</div>
												</div>



												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="submit">Cancel</button>
													<input class="btn btn-primary" type="submit" name="update" value="Update Profile">
												</div>
										</div>

										</form>

									</div>
								</div>

								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">Change Password</div>
										<div class="panel-body">
											<form method="post" class="form-horizontal" name="change" id="change-pwd" onSubmit="return valid();">
												<p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></p>

												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-4 control-label">Current Password </label>
													<div class="col-sm-8">
														<input type="password" value="" name="oldpassword" id="cpassword" class="form-control" onBlur="checkpass()" required="required">
														<span id="password-availability-status" class="help-block m-b-none" style="font-size:12px;"></span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">New Password</label>
													<div class="col-sm-8">
														<input type="password" class="form-control" name="newpassword" id="newpassword" value="" required="required">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label">Confirm Password</label>
													<div class="col-sm-8">
														<input type="password" class="form-control" value="" required="required" id="cpassword" name="cpassword">
													</div>
												</div>
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
			function checkAvailability() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data: 'emailid=' + $("#emailid").val(),
					type: "POST",
					success: function(data) {
						$("#user-availability-status").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}
		</script>
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