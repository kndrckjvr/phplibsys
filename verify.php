<?php
include './connect.php';
if(isset($_GET['code'])) {
	$code = $_GET['code'];
	$result = mysqli_query($db_connect, "UPDATE usertbl SET verif_status = 1 WHERE verif_code = '$code';");
	if(mysqli_affected_rows($db_connect)) {
		echo '<script>alert("You have successfully verified your account!"); window.location = "./";</script>';	
	} else {
		echo '<script>alert("There was an error in verifying your account. Please come back later."); window.location = "./";</script>';	
	}
} else {
	header('Location: ./');
}

?>