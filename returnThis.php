<?php
	include('./connect.php');
	$date = date("Y-m-d");
	$name = $_GET['name'];
	$book = $_GET['book'];
	$author = $_GET['author'];
	$category = $_GET['category'];
	$id = $_GET['user_id'];
	$query = "UPDATE booktbl SET borrowed = 'n' WHERE id = ". $_GET['book_id'];
	$penalty = $_GET['penalty'];
	$penalty_date = date('Y-m-d', strtotime("now + 2 days"));
	if(mysqli_query($db_connect, $query)) {
		
		$query = "UPDATE reporttbl SET return_date ='$date' WHERE id = ". $_GET['id'];
		if(mysqli_query($db_connect, $query))
			echo '<script>alert("Thank you for returning the '. $book.'");</script>';
		
		if($penalty == 1){
			$query2 = "UPDATE usertbl SET borrowed_status = 'n', penalty_date = '$penalty_date', num_of_books = '0' WHERE id = $id";
			$query3 = "UPDATE reporttbl SET penalty = 'y' WHERE id = ". $_GET['id'];
			echo '<script> alert("You are not allowed to borrow any book for 2 days, since you failed to return borrowed books on time."); window.location = "./home.php";</script>';
		}
		else{
			$query2 = "UPDATE usertbl SET borrowed_status = 'y', num_of_books = '0' WHERE id = $id";
			$query3 = "UPDATE reporttbl SET penalty = 'n' WHERE id = ". $_GET['id'];
			echo '<script> alert("Thank you for returning the book on time."); window.location = "./home.php";</script>';
		}

		mysqli_query($db_connect,$query2);
		mysqli_query($db_connect,$query3);
	}
?>

