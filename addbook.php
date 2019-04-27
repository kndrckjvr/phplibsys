<?php 
	session_start(); if(!isset($_SESSION['fullname'])) { header('Location: ./logout.php'); } if($_SESSION['user'] == 'user') { header('Location: ./logout.php'); }
	$genre = array('Science Fiction', 'Satire', 'Drama', 'Action and Adventure', 'Romance', 'Mystery', 
		'Horror', 'Self-help', 'Health', 'Guide', 'Travel', 'Children\'s', 'Religion', 'Science', 'History',
		'Math', 'Anthology', 'Poetry', 'Encyclopedias', 'Dictionaries', 'Comics', 'Art', 'Cookbooks',
		'Diaries', 'Journals', 'Prayer Books', 'Series', 'Trilogy', 'Biographies', 'Autobiographies',
		'Fantasy', 'Novel');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<link rel="shortcut icon" href="img/lib_icon.ico" />
		<title>Add Book | Library Management System</title>
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
<?php include 'loader.php'; ?>
	<?php 

	include "header2.php"; ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 form">
					<h3 class="text-center title">ADD BOOK FORM</h3>
					<div class="container-fluid row">
						<div class="col-md-1"></div>
						<!---->
						<form class="col-md-10" action="./addBookToLib.php" method="post" onsubmit="return checkInputsBook();"  enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" maxlength="200" class="form-control" required />
							</div>
							<div class="form-group">
								<label for="author">Author/s</label>
								<input type="text" name="author" id="author" maxlength="200" class="form-control" required />
							</div>
							<div class="form-group">
								<label for="category">Category</label>
								<select name="category" class="form-control" required>
								<?php
									for($i = 0; $i < 32; $i++) {
								?>
									<option value="<?php echo $genre[$i]; ?>"><?php echo $genre[$i]; ?></option>
								<?php
									}
								?>
								</select>
							</div>
							<div class="form-group">
								<label for="date">Date Obtained</label>
								<input type="date" name="date" class="form-control" required />
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<legend>Borrowed</legend>
										<label class="form-check-label">
									    <input class="form-check-input" type="radio" name="borrowed" value="y"> Yes
									  </label>
										<label class="form-check-label">
									    <input class="form-check-input" type="radio" name="borrowed" value="n" checked /> No
									  </label>
									</div>
									<div class="col-md-6">
										<legend>Active</legend>
										<label class="form-check-label">
									    <input class="form-check-input" type="radio" name="status" value="y" checked /> Yes
									  </label>
										<label class="form-check-label">
									    <input class="form-check-input" type="radio" name="status" value="n"> No
									  </label>
									</div>
								</div>
							</div>
							<div class="form-group">
									<label for="book_image_file">Book Cover:</label>
									<input type="file" class="form-control" name="fileToUpload" id="imgFile">
							</div>
							<div class="form-group">
									<div class="row">
										<div class="col-md-2"></div>
										<div class="col-md-6">
											<img src="./img/placeholder.jpg" id="preImage" width="150px" height="200px">
										</div>
										<div class="col-md-4"></div>
									</div>
							</div>
							<input type="submit" name="login" value="Add Book" class="btn btn-login btn-block" />
						</form>
						<div class="col-md-1"></div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<br>
		<script type="text/javascript" src="./js/custom.js"></script>
		<script type="text/javascript">
			function readURL(input) {

		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#preImage').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgFile").change(function(){
		    readURL(this);
		});
		
		</script>
	</body>
</html>