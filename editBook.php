<?php 
	session_start(); if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } if($_SESSION['user'] == 'user') { header('Location: ./logout.php'); }
	$genre = array('Science Fiction', 'Satire', 'Drama', 'Action and Adventure', 'Romance', 'Mystery', 
		'Horror', 'Self-help', 'Health', 'Guide', 'Travel', 'Children\'s', 'Religion', 'Science', 'History',
		'Math', 'Anthology', 'Poetry', 'Encyclopedias', 'Dictionaries', 'Comics', 'Art', 'Cookbooks',
		'Diaries', 'Journals', 'Prayer Books', 'Series', 'Trilogy', 'Biographies', 'Autobiographies',
		'Fantasy');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<title>Edit Book | Library Management System</title>
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<?php include 'loader.php'; ?>
	<?php include "header2.php"; ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 form">
					<h3 class="text-center title">EDIT BOOK FORM</h3>
					<div class="container-fluid row">
						<div class="col-md-1"></div>
						<!---->
						<form class="col-md-10" action="./updateBook.php" method="post" onsubmit="">
							<div class="form-group">
								<label for="id">ID</label>
								<input type="number" name="id" value="<?php echo $_POST['id']; ?>" class="form-control" readonly />
							</div>
							<?php
								include('./connect.php');
								$query = "SELECT * FROM booktbl WHERE ID = ". $_POST['id'];
								$counter = 0;
								$sql = mysqli_query($db_connect, $query);
								while($row = mysqli_fetch_array($sql)) {
							?>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" maxlength="200" value="<?php echo $row['name'] ?>" class="form-control" />
							</div>
							<div class="form-group">
								<label for="author">Author/s</label>
								<input type="text" name="author" maxlength="200" value="<?php echo $row['author'] ?>" class="form-control" />
							</div>
							<div class="form-group">
								<label for="category">Category</label>
								<select name="category" class="form-control">
								<?php
									for($i = 0; $i < 31; $i++) {
								?>
									<option value="<?php echo $genre[$i]; ?>" <?php if($genre[$i] == $row['category']) { echo 'selected'; }?> ><?php echo $genre[$i]; ?></option>
								<?php
									}
								?>
								</select>
							</div>
							<div class="form-group">
								<label for="date">Date Obtained</label>
								<input type="date" name="date" class="form-control"  value="<?php echo $row['date'] ?>" />
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<legend>Borrowed</legend>
										<label class="form-check-label">
									    <input class="form-check-input" type="radio" name="borrowed" value="y" <?php  if($row['borrowed'] == 'y') { echo 'checked'; } ?> /> Yes
									  	</label>
										<label class="form-check-label">
									    <input class="form-check-input" type="radio" name="borrowed" value="n" <?php  if($row['borrowed'] == 'n') { echo 'checked'; } ?> /> No
									  </label>
									</div>
									<div class="col-md-6">
										<legend>Active</legend>
										<label class="form-check-label">
									    <input class="form-check-input" type="radio" name="status" value="y" <?php  if($row['status'] == 'y') { echo 'checked'; } ?> /> Yes
									  </label>
										<label class="form-check-label">
									    <input class="form-check-input" type="radio" name="status" value="n" <?php  if($row['status'] == 'n') { echo 'checked'; } ?> /> No
									  </label>
									</div>
								</div>
							</div>
							<?php 
								} 
							?>
							<input type="submit" name="login" value="Edit Book" class="btn btn-login btn-block" />
							<a href="./manBook.php" class="btn btn-login btn-block">RETURN</a>
						</form>
						<div class="col-md-1"></div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<br>
		<script type="text/javascript" src="./js/custom.js"></script>
	</body>
</html>