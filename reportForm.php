<?php session_start(); if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } if($_SESSION['user'] == 'admin') { header('Location: ./logout.php'); } ?>
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
	<?php include "./header3.php"; ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 form">
					<h3 class="text-center title">REPORT FORM</h3>
					<div class="container-fluid row">
						<div class="col-md-2"></div>
						<form class="col-md-8" action="./sendReport.php" method="post">
							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" name="subject" class="form-control" maxlength="120" required />
							</div>
							<div class="form-group">
								<label for="password">Content</label>
								<textarea class="form-control" name="content" maxlength="250" rows="6"></textarea>
							</div>
							<input type="submit" name="login" value="SUBMIT" class="btn btn-login btn-block" />
							<br>
						</form>
						<div class="col-md-2"></div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>