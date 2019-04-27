<?php session_start(); 
	if(!isset($_GET['page'])){
		header('Location: ./manUser.php?page=1');
	}
	else{
		if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } 
		if($_SESSION['user'] == 'user') { header('Location: ./logout.php');}
		if(isset($_GET['page'])) { $_SESSION['page'] = 1; }
	} ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
		<title>Manage User | Library Management System</title>
	</head>
	<body>
		<?php include 'loader.php'; ?>w
	<?php include "./header2.php"; ?>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 form">
					<h3 class="text-center title">MANAGE USERS</h3>
					<table>
						<tr class="heading-table">
							<td class="table-side">ID</td>
							<td>FIRST NAME</td>
							<td>LAST NAME</td>
							<td>USERNAME</td>
							<td>PASSWORD</td>
							<td>STATUS</td>
							<td>BOOKS BORROWED</td>
							<td class="table-side">MANAGE</td>
						</tr>
						<?php 
						include('./connect.php');
						$curr_page = $_GET["page"];

						if($curr_page=="" || $curr_page=="1"){
							$curr_page = 0;
						}
						else{
							$curr_page = ($curr_page*5) - 5;
						}
						
						$query = "SELECT * FROM usertbl limit $curr_page,5";
						$query2 = "SELECT * FROM usertbl";

							
						$total_rows;
						$num_pages;

						$sql2 = mysqli_query($db_connect, $query2);

						$counter = 0;
						if($sql = mysqli_query($db_connect, $query)){

							$total_rows = mysqli_num_rows($sql);
							$total_rows2 = mysqli_num_rows($sql2);

							$num_pages = ceil($total_rows2/5);

							if($total_rows>0){
								while($row = mysqli_fetch_array($sql)) {
									if($row['status'] == 'y') {
										if($counter == 0)
											echo '<tr>';
								?>
									<td class="id-border"><?php echo $row['id'] ?></td>
									<td class="bot-border"><?php echo $row['fname']?></td>
									<td class="bot-border"><?php echo $row['lname']?></td>
									<td class="bot-border"><?php echo $row['user']?></td>
									<td class="bot-border"><?php echo $row['pass']?></td>
									<td class="bot-border"><?php echo strtoupper($row['status'])?></td>
									<td class="bot-border"><?php echo $row['num_of_books']?></td>
									<td class="manage-border"><form class="link-form" action="./edit.php" method="post"><input type="hidden" name="id" value="<?php echo $row['id'] ?>" /><input type="submit" value="EDIT" class="btn btn-block btn-login" /></form><br><a href="./delete.php?id=<?php echo $row['id'] ?>" class="btn btn-block btn-login">DEACTIVATE</a></td>
								<?php
										if($counter%6 == 0)
											echo '</tr>';
									}
								}
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
								<a href="./manUser.php?page=<?php echo $i ?> "?>
										 <?php echo $i; ?>
								</a>
									</li>
								<?php
								# code...#
							}
							?>		
							</ul>
						</nav>
					<a href="./delusers.php" class="btn btn-block btn-login">SHOW DEACTIVATED USERS</a>
					<a href="./showadmin.php" class="btn btn-block btn-login">SHOW ADMINS</a>
					<br>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>