<?php
	include('./connect.php');
	$fname = mysqli_real_escape_string($db_connect, $_REQUEST['fname']);
	$lname = mysqli_real_escape_string($db_connect, $_REQUEST['lname']);
	$fullname = $lname.", ".$fname; 
	$oldPass =  mysqli_real_escape_string($db_connect, $_REQUEST['oldpassword']);
	$user = mysqli_real_escape_string($db_connect, $_REQUEST['username']);
	$pass1 = mysqli_real_escape_string($db_connect, $_REQUEST['password1']);
	$pass2 = mysqli_real_escape_string($db_connect, $_REQUEST['password2']);
	if($pass1 == "" && $pass2==""){
		$query = "UPDATE `usertbl` SET `fullname`='$fullname',`fname`='$fname',`lname`='$lname',`user`='$user',`pass`='$oldPass'
		WHERE ID =". $_POST['id'];
	}
	else{
		$query = "UPDATE `usertbl` SET `fullname`='$fullname',`fname`='$fname',`lname`='$lname',`user`='$user',`pass`='$pass1'
		WHERE ID =". $_POST['id'];;

	}


	if(mysqli_query($db_connect, $query)) {
		header('Location: ./updateAccount.php');
	} else {
		header('Location: ./errSign.php');
	}
?>