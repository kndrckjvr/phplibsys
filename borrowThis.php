<?php
	include('./connect.php');
	$date = date("Y-m-d");
	$name = $_GET['name'];
	$book = $_GET['book'];
	$author = $_GET['author'];
	$category = $_GET['category'];
	$book_id = $_GET['id'];
	$id = $_GET['user_id'];
	$curbor = $_GET['curbor'];
	$path = $_GET['path'];
	$query = "UPDATE booktbl SET borrowed = 'y' WHERE id = ". $_GET['id'];
	if(mysqli_query($db_connect, $query)) {
		$query = "INSERT INTO reporttbl (user_id, book_id,name, borrow_date, book_title, book_author, book_category, book_path, penalty) VALUES ('$id','$book_id','$name', '$date', '$book', '$author', '$category', '$path', 'n')";
		if(mysqli_query($db_connect, $query)) {
			$query = "UPDATE usertbl SET num_of_books = '1' WHERE id = $id";
			if(mysqli_query($db_connect, $query))
				echo '<script>alert("Thank you for borrowing the \"'. $book .'\""); window.location = "./borrowBook.php";</script>';
		}
	}

	//";
?>