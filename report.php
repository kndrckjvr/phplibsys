<?php session_start(); 
	if(!(isset($_GET["search"]) || isset($_GET["filter"]) || isset($_GET["order"]) ) ) {
		header('Location: ./report.php?search=&filter=id&order=ASC&page=1');
	}
	else{
		if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } 
		if($_SESSION['user'] == 'user') { header('Location: ./logout.php');
		if(!isset($_GET['page'])) { $_SESSION['page'] = 1; }  } 
	}
	?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<title>Reports | Library Management System</title>
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<?php include 'loader.php'; ?>
	<?php include "./header2.php"; ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 form">
					<h3 class="text-center title">REPORTS</h3>
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
										<option value="id">ID</option>
										<option value="name">Name</option>
										<option value="date">Date</option>
										<option value="book">Book</option>
									</select>
								</div>
								<div class="form-group">
									<label for="order">Order: </label>
									<select name="order" class="form-control">
										<option value="ASC">Ascending</option>
										<option value="DESC">Descending</option>
									</select>
								</div>
								<input type="hidden" name="page" value="<?php echo $_SESSION['page']; ?>"/>
								<input type="submit" class="btn btn-default" value="Filter" />
							</form>
						</div>
					</div>
					<table class="table table-inverse">
						<tr class="heading-table">
							<td class="table-side">ID</td>
							<td>BOOK COVER</td>
							<td>USERNAME</td>
							<td>DATE-BORROWED</td>
							<td>DATE-RETURNED</td>
							<td>BOOK</td>
							<td>AUTHOR</td>
							<td class="table-side">PENALTY</td>
						</tr>
						<?php 
						include('./connect.php');

						$search = mysqli_real_escape_string($db_connect, $_REQUEST['search']);
						$filter = mysqli_real_escape_string($db_connect, $_REQUEST['filter']);
						$order = mysqli_real_escape_string($db_connect, $_REQUEST['order']);
						$curr_page = $_GET["page"];

						if($curr_page==0 || $curr_page==1){
							$curr_page = 0;
						}
						else{
							$curr_page = ($curr_page*5) - 5;
						}
						//$query = "SELECT * FROM reporttbl";
						$counter = 0;

						if(!isset($_GET['search']) || $_GET['search'] == '') {
							$query = "SELECT * FROM reporttbl ORDER BY $filter $order limit $curr_page,5";
							$query2 = "SELECT * FROM reporttbl ORDER BY $filter $order";
						}else {
							$query = "SELECT * FROM reporttbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order limit $curr_page,5";
							$query2 = "SELECT * FROM reporttbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order	";
						}
						$total_rows;
						$num_pages = 1;
						$penalty ="";
						$sql2 = mysqli_query($db_connect, $query2);
						if($sql = mysqli_query($db_connect, $query)){

							$total_rows = mysqli_num_rows($sql2);
							if($total_rows > 0) {

							$num_pages = ceil($total_rows/5);
							while($row = mysqli_fetch_array($sql)) {
								$return_date = $row['return_date'];
								$penalty = $row['penalty'];
								if($counter == 0)
									if($penalty == 'y' || $penalty == 'Y'){
										$penalty = "PENALTY";
										if($return_date == null) {
											echo '<tr class="table-penalty books-table">';
											$return_date = "Not yet returned.";
										}else {
											echo '<tr class="table-penalty books-table">';
										}
									}
									else{
										if($return_date == null) {
											echo '<tr class="table-borrowed books-table">';
											$return_date = "Not yet returned.";
										} else {
											echo '<tr class="table-borrow books-table">';
										}
										$penalty = "NO PENALTY";
									}
							?>
								<td><?php echo $row['id'] ?></td>
								<td><img src="<?php if($row['book_path'] == "") echo "";
																	else echo $row['book_path'] ?>" width="150px" height="200px"></td>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['borrow_date']?></td>
								<td><?php echo $return_date; ?></td>
								<td><?php echo $row['book_title']?></td>
								<td><?php echo $row['book_author']?></td>
								<td><?php echo $penalty ?> </td>
							<?php
								if($counter%8 == 0)
									echo '</tr>';
								}
							} else {
								echo '<tr><td colspan="8" class="table-no-found">NO REPORTS FOUND</td></tr>';
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
								<a href="./report.php?search=&filter=id&order=DESC&page=<?php echo $i ?> "?>
										 <?php echo $i; ?>
								</a>
									</li>
								<?php
								# code...#
							}
							?>		
							</ul>
						</nav>
					<br>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>