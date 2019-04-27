<?php session_start();

 if(isset($_SESSION['user'])) { 
 	if($_SESSION['user'] == 'user') header('Location: ./home.php');
 	 else header('Location: ./landing.php'); 
 } ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<title>Library Management System</title>
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<?php include 'loader.php'; ?>
	<?php include "./header.php"; ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="form">
						<div id="timestamp" class="text-center"></div>
					</div>
					<div class="form">
						<h3 class="text-center title">LOGIN FORM</h3>
						<div class="container-fluid row">
							<div class="col-md-2"></div>
							<form class="col-md-8" action="./loginToLib.php" method="post">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control" maxlength="10" required />
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" maxlength="10" required />
								</div>
								<input type="submit" name="login" value="Login" class="btn btn-login btn-block" />
								<a href="./signup.php" class="btn btn-block btn-login">Sign Up</a>
								<br>
							</form>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>