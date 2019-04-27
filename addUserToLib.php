<?php
	include('./connect.php');
	$fname = mysqli_real_escape_string($db_connect, $_REQUEST['fname']);
	$lname = mysqli_real_escape_string($db_connect, $_REQUEST['lname']);
	$fullname = $lname . ', ' . $fname;
	$user = mysqli_real_escape_string($db_connect, $_REQUEST['username']);
	$pass = mysqli_real_escape_string($db_connect, $_REQUEST['password']);

	$query = "INSERT INTO usertbl (fullname, lname, fname, user, pass, status) VALUES ('$fullname', '$lname', '$fname', '$user', '$pass', 'y')";
	if(mysqli_query($db_connect, $query)) {
		
		echo '<script>alert("Successfully Signedup."); window.location = "./"; </script>';
	} else {
		header('Location: ./errSign.php');
	}
?>