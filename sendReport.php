<?php
	session_start();
	include('./connect.php');
	$name = $_SESSION['fullname'];
	$subject = mysqli_real_escape_string($db_connect, $_REQUEST['subject']);
	$content = mysqli_real_escape_string($db_connect, $_REQUEST['content']);
	$query = "INSERT INTO reporttbl (name, subject, content) VALUES ('$name', '$subject', '$content')";
	if(mysqli_query($db_connect, $query)) {
		echo '<script> alert("You have successfully send your concern. Thanks!"); window.location = "./reportForm.php";</script>';
	} else {
		header('Location: ./errSign.php');
	}
?>