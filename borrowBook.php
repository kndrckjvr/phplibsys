<?php 
	if(!isset($_GET['search']) || !isset($_GET['filter']) || !isset($_GET['order']) || !isset($_GET['page'])) { 
	header('Location: ./borrowBook.php?search=&filter=id&order=ASC&page=1'); } 
	else { session_start(); if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } 
	if($_SESSION['user'] == 'admin') { header('Location: ./logout.php'); } 
	if(isset($_GET['page'])) { $_SESSION['page'] = 1; } } ?>
<html>
	<head>
	   
	<?php include 'header0.php';?>	   
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
		<title>Borrow Book | Library Management System</title>
	</head>
	<body>
	
		<?php include 'loader.php'; ?>
	<?php include "./header3.php"; ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 form">
				<br>
					<h3 class="text-center title">BORROW BOOKS</h3><br>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-9">
							<form class="form-inline">
								<div class="form-group">
									<label for="search">Search: </label>
									<input type="search" name="search" class="form-control" />
								</div>
								<div class="form-group">
									<label for="filter">Filter: </label>
									<select name="filter" class="form-control">
										<option value="name">Title</option>
										<option value="author">Author</option>
										<option value="category">Category</option>
										<option value="id">ID</option>
									</select>
								</div>
								<div class="form-group">
									<label for="order">Order: </label>
									<select name="order" class="form-control">
										<option value="ASC">Ascending</option>
										<option value="DESC">Descending</option>
									</select>
								</div>
								<input type="hidden" name="page" value="<?php echo $_SESSION['page'] ?>"/>
								<input type="submit" class="btn btn-default" value="Filter" />
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-inverse table-responsive">
								<tr class="heading-table">
									<td class="table-side">BOOK COVER</td>
									<td>TITLE</td>
									<td>AUTHOR</td>
									<td>CATEGORY</td>
									<td>DATE</td>
									<td class="table-side">BORROW THIS</td>
								</tr>
								<?php 
								include('./connect.php');
								$search = mysqli_real_escape_string($db_connect, $_REQUEST['search']);
								$filter = mysqli_real_escape_string($db_connect, $_REQUEST['filter']);
								$order = mysqli_real_escape_string($db_connect, $_REQUEST['order']);
								$curr_page = $_GET["page"];
								$user_id = $_SESSION['id'];
								if($curr_page==0 || $curr_page==1){
									$curr_page = 0;
								}
								else{
									$curr_page = ($curr_page*5) - 5;
								}

								$total_rows;
								$num_pages=1;

								if(!isset($_GET['search']) || $_GET['search'] == '') {
									$query = "SELECT * FROM booktbl WHERE borrowed = 'n' AND status ='y' ORDER BY $filter $order limit $curr_page,5";
									$query2 = "SELECT * FROM booktbl WHERE borrowed = 'n' AND status ='y' ORDER BY $filter $order";
								}else {
									$query = "SELECT * FROM booktbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order limit $curr_page,5";
									$query2 = "SELECT * FROM booktbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order	";
								}
								$penalty = "";
								$penalty_query = "SELECT borrowed_status FROM usertbl WHERE id = $user_id";
								if($penalty_sql = mysqli_query($db_connect, $penalty_query)) {
									$penalty_row = mysqli_fetch_array($penalty_sql);
										$penalty = $penalty_row['borrowed_status'];
									
								}

								$counter = 0;
								$sql2 = mysqli_query($db_connect,$query2);

								if($sql = mysqli_query($db_connect, $query)) {
									$total_rows = mysqli_num_rows($sql);
									$total_rows2 = mysqli_num_rows($sql2);

									$num_pages = ceil($total_rows2/5);
									$user_query = "SELECT * FROM usertbl WHERE id = ". $user_id;
									$user_sql = mysqli_query($db_connect, $user_query);
									$user_row = mysqli_fetch_array($user_sql);
									if($total_rows > 0) {
										while($row = mysqli_fetch_array($sql)) {
											if($row['borrowed'] == 'n' && $row['status'] == 'y') {
												if($counter == 0) {
													echo '<tr class="books-table">';
												}
								?>
									<td class="id-border"><img src="<?php echo $row['book_path']; ?>" width="150px" height="200px" /></td>
									<td class="bot-border"><?php echo $row['name']?></td>
									<td class="bot-border"><?php echo $row['author']?></td>
									<td class="bot-border"><?php echo $row['category']?></td>
									<td class="bot-border"><?php echo $row['date']?></td>
									<td class="manage-border">	<?php if($penalty == 'y' && $user_row['num_of_books'] == 0){?><a href="./borrowThis.php?id=<?php echo $row['id']; ?>&book=<?php echo $row['name']; ?>&name=<?php echo $_SESSION['username']; ?>&author=<?php echo $row['author'];?>&category=<?php echo $row['category']?>&user_id=<?php echo $_SESSION['id'] ?>&curbor=<?php echo $user_row['num_of_books']; ?>&path=<?php echo $row['book_path']; ?>" class="btn btn-block btn-login">BORROW THIS</a>
										<?php 
										}
										else{?>
											<button class="btn btn-danger" disabled>BORROW THIS</button>
										<?php		
										}

										?>


									</td>
								<?php
												if($counter%5 == 0) {
													echo '</tr>';
												}
											} /*else {
											?>
										<tr>
											<td colspan="6" class="text-center">NO BOOKS AVAILABLE</td>
										</tr>
										<?php
											}*/
											?>
											<?php
										}
									} else {
										?>
										<tr>
											<td colspan="6" class="text-center">NO BOOKS FOUND</td>
										</tr>
										<?php
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
										<a href="<?php echo "./borrowBook.php?search=$search&filter=$filter&order=$order&page=$i"?>">
												 <?php echo $i; ?>
										</a>
											</li>
										<?php
										# code...#
									}
									?>		
									</ul>
								</nav>
							</div>
						</div>
					<br>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		
		<script type="text/javascript" src="./js/custom.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>