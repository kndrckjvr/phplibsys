<?php session_start(); 
	
	if(!(isset($_GET["page"]))){
		header('Location: ./showadmin.php?page=1');
	}
	else{
		if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } 
		if($_SESSION['user'] == 'user') { header('Location: ./logout.php'); } 
		if(isset($_GET['page'])) { $_SESSION['page'] = 1; }
	}
		?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<title>Manage Admin | Library Management System</title>
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<?php include 'loader.php'; ?>
	<?php include "./header2.php"; ?>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 form">
					<h3 class="text-center title">ADMIN TABLE</h3>
					<table class="table-success table-hover">
						<tr class="heading-table">
							<td>ID</td>
							<td>NAME</td>
							<td>USERNAME</td>
							<td>PASSWORD</td>
							<td>MANAGE</td>
						</tr>
						<?php 
						include('./connect.php');

						$curr_page = $_GET["page"];
						if($curr_page=="" || $curr_page=="1"){
							$curr_page = 0;
						}
						else{
							$curr_page = ($curr_page*3) - 3;
						}

						$query = "SELECT * FROM admintbl limit $curr_page,3";
						$query2 = "SELECT * FROM admintbl";
						$counter = 0;
						$sql2 = mysqli_query($db_connect, $query2);

						if($sql = mysqli_query($db_connect, $query)){
							$total_rows = mysqli_num_rows($sql);
							$total_rows2 = mysqli_num_rows($sql2);

							$num_pages = ceil($total_rows2/3);

							while($row = mysqli_fetch_array($sql)) {
									if($counter == 0)
										echo '<tr>';
							?>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['user']?></td>
								<td><?php echo $row['pass']?></td>
									<td><form class="link-form" action="./delete.php" method="post"><input type="hidden" name="id" value="<?php echo $row['id'] ?>" /><input type="submit" name="submit_delete_admin" value="DELETE" class="link btn btn-block btn-login" /></form> </td>
							<?php
									if($counter%6 == 0)
										echo '</tr>';
							}
						}
						?>
					</table>
					<nav aria-label="Page navigation example">
 							 <ul class="pagination pagination-lg ">
					<?php
						 for ($i=1; $i <= $num_pages; $i++) { 
								?>
								<li class="page-item <?php if($i == $_GET['page']) echo 'active'; ?>">
								<a href="./showadmin.php?page=<?php echo $i ?> "?>
										 <?php echo $i; ?>
								</a>
									</li>
								<?php
								# code...#
							}
							?>		
							</ul>
						</nav>
					<a href="./addAdmin.php" class="btn btn-block btn-login">ADD ADMIN</a>
					<a href="./manUser.php" class="btn btn-block btn-login">SHOW USERS</a>
					<br>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>