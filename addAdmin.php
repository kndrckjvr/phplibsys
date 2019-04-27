<?php session_start(); if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } if($_SESSION['user'] == 'user') { header('Location: ./logout.php'); } ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<title>Add User | Library Management System</title>
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
	
		<?php include 'loader.php'; ?>
	<?php include "header2.php"; ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 form">
					<h3 class="text-center title">ADD ADMIN FORM</h3>
					<div class="container-fluid row">
						<div class="col-md-1"></div>
						<!--./signupToLib.php-->
						<form class="col-md-10" action="./addAdminToLib.php" method="post" onsubmit="return checkInputs();">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="fname">Name</label>
										<input type="text" name="admin_name" id="fname" class="form-control" maxlength="25" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="user" class="form-control" maxlength="10" required />
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control" maxlength="10" required />
								<br>
								<p id="result" class="text-center"></p>
							</div>
							<input type="submit" name="login" value="Login" class="btn btn-login btn-block" />
							<a href="./showadmin.php" class="btn btn-block btn-login">Go Back</a>
							<br>
						</form>
						<div class="col-md-1"></div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>