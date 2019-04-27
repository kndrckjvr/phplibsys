<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
		<title>Library Management System</title>
	</head>
	<body>
	<?php include "./loader.php"; include "./header.php"; ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 form">
					<h3 class="text-center title">SIGNUP FORM</h3>
					<div class="container-fluid row">
						<div class="col-md-1"></div>
						<!--./signupToLib.php-->
						<form class="col-md-10" action="./signupToLib.php" method="post" onsubmit="return checkInputs();">
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
								<input type="password" name="password" id="password" class="form-control" maxlength="10" required onkeyup="matchPassword();"/>
								<br>
								<p id="result" class="text-center"></p>
							</div>

							<div class="form-group">
								<label for="password">Confirm Password</label>
								<input type="password" name="password2" id="password2" class="form-control" onkeyup="matchPassword();" maxlength="10"  required="" />
								<br>
								<p id="result2" class="text-center"></p>
							</div>
							<input type="submit" id="submitUpdate" name="login" value="SUBMIT" class="btn btn-login btn-block" enabled />
							<a href="./" class="btn btn-block btn-login">BACK TO LOGIN</a>
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