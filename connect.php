<?php
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "librarymanagementsystem";
	$db_connect = mysqli_connect($servername, $user, $pass, $dbname);
	if(mysqli_connect_errno()) {
		echo mysqli_connect_error();
		exit();
	}
?>