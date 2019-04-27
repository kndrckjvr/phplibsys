<?php
	include('./connect.php');
	$fname = mysqli_real_escape_string($db_connect, $_REQUEST['fname']);
	$lname = mysqli_real_escape_string($db_connect, $_REQUEST['lname']);
	$fullname = $lname . ', ' . $fname;
	$user = mysqli_real_escape_string($db_connect, $_REQUEST['username']);
	$pass = mysqli_real_escape_string($db_connect, $_REQUEST['password']);
	//$query = "UPDATE `usertbl` SET `fullname`= '$fullname',`lname`= '$lname',`fname`= '$fname',`user`= '$user',`pass`= '$pass',`status`= 'N'"
	$query = "UPDATE usertbl SET status = 'y' WHERE id = ". $_GET['id'];
	if(mysqli_query($db_connect, $query)) {
		header('Location: ./delusers.php');
	} else {
		header('Location: ./errSign.php');
	}
?>