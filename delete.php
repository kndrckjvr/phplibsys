<?php
	include('./connect.php');
	if(isset($_POST["submit_delete_admin"])){
		$query = "DELETE FROM `admintbl` WHERE `id` = " .$_POST['id'];
		if(mysqli_query($db_connect, $query)) {
			header('Location: ./showadmin.php');
		} else {
			header('Location: ./errSign.php');
		}
	}
	else{
		$fname = mysqli_real_escape_string($db_connect, $_REQUEST['fname']);
		$lname = mysqli_real_escape_string($db_connect, $_REQUEST['lname']);
		$fullname = $lname . ', ' . $fname;
		$user = mysqli_real_escape_string($db_connect, $_REQUEST['username']);
		$pass = mysqli_real_escape_string($db_connect, $_REQUEST['password']);
		//$query = "UPDATE `usertbl` SET `fullname`= '$fullname',`lname`= '$lname',`fname`= '$fname',`user`= '$user',`pass`= '$pass',`status`= 'N'"
		$query = "UPDATE usertbl SET status = 'n' WHERE id = ". $_GET['id'];
		if(mysqli_query($db_connect, $query)) {
			header('Location: ./manUser.php');
		} else {
			header('Location: ./errSign.php');
		}
	}
?>