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
					<h3 class="text-center title">ADD USER FORM</h3>
					<div class="container-fluid row">
						<div class="col-md-1"></div>
						<!--./signupToLib.php-->
						<form class="col-md-10" action="./addUserToLib.php" method="post" onsubmit="return checkInputs();">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="fname">First Name</label>
										<input type="text" name="fname" id="fname" class="form-control" maxlength="25" required />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lname">Last Name</label>
										<input type="text" name="lname" id="lname" class="form-control" maxlength="25" required />
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
							<input type="submit" name="login" value="Add User" class="btn btn-login btn-block" />
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