<?php
session_start();
error_reporting(0);
include('inc/config.php');

//user registration
if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$password = md5($_POST['password']);

	$query = mysqli_query($con, "insert into user(firstName,lastName,email,gender,password)
    values('$firstname','$lastname','$email','$gender','$password')");
	$msg = "Registration Successfull!!";
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
	<title>User Registration</title>
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
			if (document.registration.password.value != document.registration.cpassword.value) {
				alert("Password and Re-Type Password Field do not match  !!");
				document.registration.cpassword.focus();
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

						<h2 class="page-title">User Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-success">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<p style="padding-left: 1%; color: green">
											<?php if ($msg) {
												echo htmlentities($msg);
											} ?>
										</p>
										<form method="POST" action="" name="register" class="form-horizontal" onSubmit="return valid();">

											<div class="form-group">
												<label class="col-sm-2 control-label">First Name : </label>
												<div class="col-sm-8">
													<input type="text" name="firstname" id="firstname" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Last Name : </label>
												<div class="col-sm-8">
													<input type="text" name="lastname" id="lastname" class="form-control" required="required">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Email: </label>
												<div class="col-sm-8">
													<input type="email" name="email" id="email" class="form-control" onBlur="checkAvailability()" required="required">
													<span id="user-availability-status" style="font-size:12px;"></span>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Gender : </label>
												<div class="col-sm-8">
													<select name="gender" class="form-control" required="required">
														<option value="">Select Gender</option>
														<option value="male">Male</option>
														<option value="female">Female</option>
														<option value="others">Others</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Password: </label>
												<div class="col-sm-8">
													<input type="password" name="password" id="password" class="form-control" required="required">
												</div>
											</div>
											<div class="col-sm-6 col-sm-offset-4">
												<button class="btn btn-default" type="reset">Reset</button>
												<input type="submit" name="submit" Value="SignUp" class="btn btn-primary">
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