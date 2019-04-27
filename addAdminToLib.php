<?php
	include('./connect.php');
	$name = mysqli_real_escape_string($db_connect, $_REQUEST['admin_name']);
	$user = mysqli_real_escape_string($db_connect, $_REQUEST['username']);
	$pass = mysqli_real_escape_string($db_connect, $_REQUEST['password']);

	$query = "INSERT INTO admintbl (name, user, pass) VALUES ('$name', '$user', '$pass')";
	if(mysqli_query($db_connect, $query)) {
		
		echo '<script>alert("You have Successfully created an Admin."); window.location = "./"; </script>';
	} else {
		header('Location: ./errSign.php');
	}
?>