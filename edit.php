<?php session_start(); if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } if($_SESSION['user'] == 'user') { header('Location: ./logout.php'); } ?>
<?php
	if(!isset($_POST['id'])) {
		header('Location: ./'); 
		session_start();
		session_unset();
		session_destroy();
	}
	$id = $_POST['id'];
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
		<title>Home | Library Management System</title>
	</head>
	<body>
	
		<?php include 'loader.php'; ?>
	<?php include "./header2.php"; ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 form">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<form action="./update.php" method="post" onsubmit="return checkInputs();">
								<div class="form-group">
									<h3 class="text-center">EDIT USER</h3>
									<label for="id">ID</label>
									<input type="number" value="<?php echo $id ?>" class="form-control" name="id" readonly />
								</div>
								<?php 
									include('./connect.php');
									$query = "SELECT * FROM usertbl WHERE ID = ". $id;
									$counter = 0;
									$sql = mysqli_query($db_connect, $query);
									while($row = mysqli_fetch_array($sql)) {
								?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="fname">First Name</label>
												<input type="text" name="fname" value="<?php echo $row['fname'] ?>" id="fname" class="form-control" maxlength="25" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="lname">Last Name</label>
												<input type="text" name="lname" value="<?php echo $row['lname'] ?>" id="lname" class="form-control" maxlength="25" required />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" name="username" value="<?php echo $row['user'] ?>" id="user" class="form-control" maxlength="10" required />
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" name="password" value="<?php echo $row['pass'] ?>" id="password" class="form-control" maxlength="10" required />
										<br>
										<p id="result" class="text-center"></p>
									</div>
									<input type="submit" name="login" value="Edit User" class="btn btn-login btn-block" />
									<a href="./manUser.php" class="btn btn-block btn-login">GO BACK</a>
								<?php 
									} 
								?>
							</form>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>