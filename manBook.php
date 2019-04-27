<?php session_start(); 
	if(!(isset($_GET["search"]) || isset($_GET["filter"]) || isset($_GET["order"]) || isset($_GET['page'])) ) {
		$_SESSION['page'] = 1;
		header('Location: ./manBook.php?search=&filter=id&order=ASC&page=1');
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
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
		<title>Manage Book | Library Management System</title>
	</head>
	<body>
		<?php include 'loader.php'; ?>
	<?php include "./header2.php"; ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 form">
					<h3 class="text-center title">MANAGE BOOKS</h3>
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
								<input type="hidden" name="page" value="<?php echo $_GET['page'] ?>"/>
								<input type="submit" class="btn btn-default" value="Filter" />
							</form>
						</div>
					</div>
					<table class="table table-inverse">
						<tr class="heading-table">
							<td class="table-side">ID</td>
							<td>BOOK COVER</td>
							<td>TITLE</td>
							<td>AUTHOR</td>
							<td>CATEGORY</td>
							<td>DATE</td>
							<td>BORROWED</td>
							<td>STATUS</td>
							<td class="table-side">MANAGE</td>
						</tr>
						<?php 
						include('./connect.php');
						$search = mysqli_real_escape_string($db_connect, $_REQUEST['search']);
						$filter = mysqli_real_escape_string($db_connect, $_REQUEST['filter']);
						$order = mysqli_real_escape_string($db_connect, $_REQUEST['order']);

						//	header('Location: ./manBook.php?search=$search&filter=$filter&order=$order&page=1');
						$curr_page = $_GET["page"];

						if($curr_page=="" || $curr_page=="1"){
							$curr_page = 0;
						}
						else{
							$curr_page = ($curr_page*5) - 5;
						}

						$total_rows;
						$num_pages=1;


						if(!isset($_GET['search']) || $_GET['search'] == '') {
							$query = "SELECT * FROM booktbl ORDER BY $filter $order limit $curr_page,5";
							$query2 = "SELECT * FROM booktbl ORDER BY $filter $order";
						}else {
							$query = "SELECT * FROM booktbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order limit $curr_page,5";
							$query2 = "SELECT * FROM booktbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order	";
						}
						$counter = 0;
						$sql2 = mysqli_query($db_connect, $query2);

						if($sql = mysqli_query($db_connect, $query)) {

							$total_rows = mysqli_num_rows($sql);
							$total_rows2 = mysqli_num_rows($sql2);

							$num_pages = ceil($total_rows2/5);
							if(mysqli_num_rows($sql) > 0) {
								while($row = mysqli_fetch_array($sql)) {
									if($counter == 0) {
										if($row['borrowed'] == 'y')
												echo '<tr class="table-borrowed books-table">';
											else echo '<tr class="table-borrow books-table">';
									}
						?>
							<td class="id-border"><?php echo $row['id'] ?></td>
							<td class="bot-border"><img src="<?php if($row['book_path'] == "") echo "";
																else echo $row['book_path'] ?>" width="150px" height="200px"></td>
							<td class="bot-border"><?php echo $row['name']?></td>
							<td class="bot-border"><?php echo $row['author']?></td>
							<td class="bot-border"><?php echo $row['category']?></td>
							<td class="bot-border"><?php echo $row['date']?></td>
							<td class="bot-border"><?php echo strtoupper($row['borrowed'])?></td>
							<td class="bot-border"><?php echo strtoupper($row['status'])?></td>
							<?php
								if($row['status'] == 'y') {
							?>
							<td class="manage-border"><form class="link-form" action="./editBook.php" method="post"><input type="hidden" name="id" value="<?php echo $row['id'] ?>" /><input type="submit" value="EDIT"  class="btn btn-block btn-login" /></form><br><a href="./deleteBook.php?id=<?php echo $row['id'] ?>" class="btn btn-block btn-login" >ARCHIVE</a></td>
							<?php
								} else {
							?>
							<td class="manage-border"><form class="link-form" action="./editBook.php" method="post"><input type="hidden" name="id" value="<?php echo $row['id'] ?>" /><input type="submit" value="EDIT"  class="btn btn-block btn-login" /></form><br><a href="./activateBook.php?id=<?php echo $row['id'] ?>" class="btn btn-block btn-login" >UNARCHIVE</a></td>
						<?php
								}
									if($counter%6 == 0) {
										echo '</tr>';
									}
								}
							} else {
								?>
								<tr>
									<td colspan="9" class="text-center">NO BOOKS FOUND</td>
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
								<a href="./manBook.php?search=&filter=id&order=ASC&page=<?php echo $i ?> "?>
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