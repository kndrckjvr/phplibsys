<?php session_start(); 
if(!isset($_SESSION['fullname'])) {
 	header('Location: ./logout.php'); 
}
if($_SESSION['user'] == 'admin') { 
	header('Location: ./logout.php');
}
if(!isset($_GET['search'])) {
	echo "<script>window.location = './home.php?search=&filter=name&order=DESC&page=1';</script>";
}
	?>
<html>
	<head>

	<?php include 'header0.php';?>

	<title>Home | Library Management System</title>
	
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<?php include 'loader.php'; ?>
			<?php include "header3.php"; ?>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 form">
					<h1 class="text-center">USER PAGE</h1>
					<h6 class="welcome-message text-center">Welcome, <?php echo $_SESSION['fullname']; ?></h6>
				</div>
				<div class="col-md-3"></div>
			</div>

			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 form">
					<h3 class="text-center title">MY BOOKS</h3><br>
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
										<option value="DESC">Descending</option>
										<option value="ASC">Ascending</option>
									</select>
								</div>
								<input type="hidden" name="page" value="<?php echo $_SESSION['page'] ?>"/>
								<input type="submit" class="btn btn-default" value="Filter" />
							</form>
						</div>
					</div>

					<table class="table table-inverse">
						<tr class="heading-table">
							<td class="table-side">TITLE</td>
							<td>AUTHOR</td>
							<td>CATEGORY</td>
							<td>DATE BORROWED</td>
							<td class="table-side">DATE RETURNED</td>
						</tr>
						<?php 
						include('./connect.php');
						$search = mysqli_real_escape_string($db_connect, $_REQUEST['search']);
						$filter = mysqli_real_escape_string($db_connect, $_REQUEST['filter']);
						$order = mysqli_real_escape_string($db_connect, $_REQUEST['order']);	
						$curr_page = $_GET["page"];
						$user_id = $_SESSION['id'];
						$dayNow = date('d');
						$yearNow =date('Y');
						$monthNow = date('m');

						if($curr_page == 0 || $curr_page == 1){
							$curr_page = 0;
						}
						else{
							$curr_page = ($curr_page*5) - 5;
						}

						$total_rows;
						$num_pages = 0;

						if(!isset($_GET['search']) || $_GET['search'] == '') {
							$query = "SELECT * FROM reporttbl WHERE user_id = $user_id ORDER BY $filter $order limit $curr_page,5";
							$query2 = "SELECT * FROM reporttbl WHERE  user_id = $user_id ORDER BY $filter $order";
						}else {
							$query = "SELECT * FROM reporttbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order limit $curr_page,5";
							$query2 = "SELECT * FROM reporttbl WHERE $filter LIKE '%$search%' ORDER BY $filter $order	";
						}
						$counter = 0;
						$sql2 = mysqli_query($db_connect,$query2);

						if($sql = mysqli_query($db_connect, $query)) {
							$total_rows = mysqli_num_rows($sql);
							$total_rows2 = mysqli_num_rows($sql2);

							$num_pages = ceil($total_rows2/5);

							if($total_rows > 0) {
								while($row = mysqli_fetch_array($sql)) {
									$borrowed_date = strtotime($row['borrow_date'] . " + 4 days");
									$current_date	= strtotime("now");
									if($borrowed_date <= $current_date) {
										$penalty = 1;
									} else {
										$penalty = 0;
									}
									
									$user_penalty = $row['penalty'];

									//if($row['borrowed'] == 'n' && $row['status'] == 'y') {
										if($counter == 0) {
											if($user_penalty == 'y'){
												if($row['return_date']==null)
													echo '<tr class="table-penalty" style="color:#fff;">';
												else echo '<tr class="table-penalty">';
											}
											else{
												if($row['return_date']== null)
													echo '<tr class="table-borrowed" style="color:#fff;">';
												else echo '<tr class="table-borrow">';

											}

										}
						?>
							<td class="id-border"><?php echo $row['book_title']?></td>
							<td class="bot-border"><?php echo $row['book_author']?></td>
							<td class="bot-border"><?php echo $row['book_category']?></td>
							<td class="bot-border"><?php echo $row['borrow_date']?></td>
							<?php /*<td><?php if($row['return_date'] == "0000-00-00") echo "Not Yet Returned";
										else{ echo $row['return_date'];} ?></td> */ ?>
							<td class="manage-border"><?php if($row['return_date'] == "0000-00-00" || $row['return_date'] == ""){ 
											?><a href="./returnThis.php?id=<?php echo $row['id']; ?>&book_id=<?php echo $row['book_id']; ?>&book=<?php echo $row['book_title']; ?>&name=<?php echo $_SESSION['username']; ?>&author=<?php echo $row['book_author'];?>&category=<?php echo $row['book_category']?>&user_id=<?php echo $_SESSION['id']; ?>&penalty=<?php echo $penalty;?>" class="btn btn-block btn-login">RETURN THIS</a>
									<?php
									} 
								else{
									echo $row['return_date'];
								}
								?>
							</td>
						<?php
										if($counter%5 == 0) {
											echo '</tr>';
										}
									/*} else {
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
									<td colspan="5" class="text-center table-no-found">NO BOOKS FOUND</td>
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
								<a href="<?php echo "./home.php?search=$search&filter=$filter&order=$order&page=$i";?> ">
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
				<div class="col-md-1"></div>
			</div>
				<br>
		</div>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>