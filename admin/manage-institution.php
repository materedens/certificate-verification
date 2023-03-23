<?php
session_start();
error_reporting(0);
include('inc/config.php');
//delete

if (isset($_GET['uid']) && $_GET['action'] == 'del') {
	$id = $_GET['uid'];
	$query = mysqli_query($con, "delete from institution where id='$id'");
	header('location:manage-institution.php');
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
	<title>Manage Users</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script language="javascript" type="text/javascript">
		var popUpWin = 0;

		function popUpWindow(URLStr, left, top, width, height) {
			if (popUpWin) {
				if (!popUpWin.closed) popUpWin.close();
			}
			popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 510 + ',height=' + 430 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
						<h2 class="page-title" style="margin-top:4%">Manage Registered Institutions</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Institution Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Institution Name</th>
											<th>Email </th>
											<th>Reg Date </th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$ret = mysqli_query($con, "SELECT * FROM institution");
										$cnt = 1;
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<tr>
												<td><?php echo $cnt; ?></td>
												<td><?php echo $row['institutionName']; ?></td>
												<td><?php echo $row['email']; ?></td>
												<td><?php echo $row['regDate']; ?></td>
												<td>
													<a href="manage-institution.php?uid=<?php echo $row['id']; ?>&&action=del" title="Delete Record" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>
												</td>
											</tr>
										<?php
											$cnt = $cnt + 1;
										} ?>


									</tbody>
								</table>


							</div>
						</div>


					</div>
				</div>



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