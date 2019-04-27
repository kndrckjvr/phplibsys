<?php
	include('./connect.php');
	$name = mysqli_real_escape_string($db_connect, $_REQUEST['name']);
	$author = mysqli_real_escape_string($db_connect, $_REQUEST['author']);
	$categ = mysqli_real_escape_string($db_connect, $_REQUEST['category']);
	$date = mysqli_real_escape_string($db_connect, $_REQUEST['date']);
	$borrow = mysqli_real_escape_string($db_connect, $_REQUEST['borrowed']);
	$status = mysqli_real_escape_string($db_connect, $_REQUEST['status']);
	$query = "UPDATE `booktbl` SET `name`='$name',`author`='$author',`category`='$categ',`date`='$date',`borrowed`='$borrow',`status`='$status' WHERE ID =". $_POST['id'];


	if(mysqli_query($db_connect, $query)) {
		header('Location: ./manBook.php?search=&filter=name&order=ASC&page=1');
	} else {
		header('Location: ./errSign.php');
	}
?>