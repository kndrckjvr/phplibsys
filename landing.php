<?php session_start(); if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } 


if($_SESSION['user'] == 'user') { header('Location: ./logout.php'); } ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<title>Home | Library Management System</title>
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<?php include 'loader.php'; ?>
	<?php include "header2.php"; ?>
				<div class="absolute-center">
						<div class="col-md-3"></div>
						<div class="col-md-6 form">
							<h1 class="text-center">ADMIN PAGE</h1>
							<h6 class="welcome-message text-center">Welcome, Admin <?php echo $_SESSION['fullname']; ?></h6>
						</div>
						<div class="col-md-3"></div>
				</div>

		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>