<?php session_start(); 
	if(!(isset($_GET["search"]) || isset($_GET["filter"]) || isset($_GET["order"]) ) ) {
		header('Location: ./searchBook.php?search=&filter=id&order=ASC&page=1');
	}
	else{
		if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); }
		if($_SESSION['user'] == 'admin') { header('Location: ./logout.php'); } 
		if(isset($_GET['page'])) { $_SESSION['page'] = 1; } 
	}
	?>
	
<html>
	<head> 
	<?php include 'header0.php';?>
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
		<title>Search Book | Library Management System</title>
	</head>
	<body>
	<?php include "./loader.php"; include "./header3.php"; ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 form">
					<h3 class="text-center title">SEARCH BOOKS</h3><br>
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
								<input type="hidden" name="page" value="<?php echo $_SESSION['page']; ?>">
								<input type="submit" class="btn btn-default" value="SUBMIT" />
							</form>
						</div>
					</div>

					<table class="table table-inverse">
						<tr class="heading-table">
							<td class="table-side">BOOK COVER</td>
							<td>TITLE</td>
							<td>AUTHOR</td>
							<td>CATEGORY</td>
							<td>DATE</td>
							<td class="table-side">BORROWED</td>
						</tr>
						<?php 
						include('./connect.php');
						$search = mysqli_real_escape_string($db_connect, $_REQUEST['search']);
						$filter = mysqli_real_escape_string($db_connect, $_REQUEST['filter']);
						$order = mysqli_real_escape_string($db_connect, $_REQUEST['order']);
						$curr_page = $_GET["page"];

						if($curr_page=="" || $curr_page=="1"){
							$curr_page = 0;
						}
						else{
							$curr_page = ($curr_page*5) - 5;
						}

						$total_rows;
						$num_pages;
						if(!isset($_GET['search']) || $_GET['search'] == '') {
							$query = "SELECT * FROM booktbl ORDER BY $filter $order limit $curr_page,5";
							$query2 = "SELECT * FROM booktbl ORDER BY $filter $order";
						}else {
							$query = "SELECT * FROM booktbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order	limit $curr_page,5";
							$query2 = "SELECT * FROM booktbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order";
						}
						$counter = 0;
						$sql2 = mysqli_query($db_connect, $query2);

						if($sql = mysqli_query($db_connect, $query)) {
							$total_rows = mysqli_num_rows($sql);
							$total_rows2 = mysqli_num_rows($sql2);

							$num_pages = ceil($total_rows2/5);
							if($total_rows > 0) {
								while($row = mysqli_fetch_array($sql)) {
									if($row['status'] == 'y') {
										if($counter == 0) {
											if($row['borrowed'] == 'y')
												echo '<tr class="table-borrowed books-table">';
											else echo '<tr class="table-borrow books-table">';
										}
						?>
							<td class="id-border"><img src="<?php echo $row['book_path'] ?>" width="150px" height="200px"></td>
							<td class="bot-border"><?php echo $row['name'] ?></td>
							<td class="bot-border"><?php echo $row['author']?></td>
							<td class="bot-border"><?php echo $row['category']?></td>
							<td class="bot-border"><?php echo $row['date']?></td>
							<td class="manage-border"><?php echo strtoupper($row['borrowed'])?></td>
						<?php
										if($counter%5 == 0) {
											echo '</tr>';
										}
									}
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
								<a href="<?php echo "./searchBook.php?search=$search&filter=$filter&order=$order&page=$i";?> ">
										 <?php echo $i; ?>
								</a>
									</li>
								<?php
							}
							?>		
							</ul>
						</nav>
				</div>
				<div class="col-md-1"></div>
			</div>
			<br><br>
		</div>
		
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>
