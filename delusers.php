<?php session_start(); if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } if($_SESSION['user'] == 'user') { header('Location: ./logout.php'); } ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
		<title>Deleted User | Library Management System</title>
	</head>
	<body>
	
		<?php include 'loader.php'; ?>
	<?php include "header2.php"; ?>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 form">
					<h3 class="text-center title">MANAGE USERS</h3>
					<table>
						<tr class="heading-table">
							<td>ID</td>
							<td>FIRST NAME</td>
							<td>LAST NAME</td>
							<td>USERNAME</td>
							<td>PASSWORD</td>
							<td>STATUS</td>
							<td>BOOKS BORROWED</td>
							<td>ACTIVATE</td>
						</tr>
						<?php 
						include('./connect.php');
						$query = "SELECT * FROM usertbl";
						$counter = 0;
						$sql = mysqli_query($db_connect, $query);
						$no_user_found = 0;
						$num_rows = mysqli_num_rows($sql);

						
							while($row = mysqli_fetch_array($sql)) {
								if($row['status'] == 'n') {
									$no_user_found = 1;
									if($counter == 0)
										echo '<tr>';
							?>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['fname']?></td>
								<td><?php echo $row['lname']?></td>
								<td><?php echo $row['user']?></td>
								<td><?php echo $row['pass']?></td>
								<td><?php echo strtoupper($row['status'])?></td>
								<td><?php echo $row['num_of_books']?></td>
								<td><a href="./activate.php?id=<?php echo $row['id'] ?>">ACTIVATE</a></td>
							<?php
									if($counter%7 == 0)
										echo '</tr>';
								}
							}
						
						if($no_user_found == 0){

									echo '<tr>
										<th colspan="8" class="text-center">NO BOOKS FOUND</th>
									</tr>';
						}
							?>
					</table>
					<a href="./manUser.php" class="btn btn-block btn-login">MANAGE USERS</a>
					<a href="./showadmin.php" class="btn btn-block btn-login">SHOW ADMINS</a>
					<br>
					<br>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>