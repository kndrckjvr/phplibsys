<?php
	include('./connect.php');
	$fname = mysqli_real_escape_string($db_connect, $_REQUEST['fname']);
	$lname = mysqli_real_escape_string($db_connect, $_REQUEST['lname']);
	$fullname = $lname . ', ' . $fname;
	$user = mysqli_real_escape_string($db_connect, $_REQUEST['username']);
	$pass = mysqli_real_escape_string($db_connect, $_REQUEST['password']);

	$query = "SELECT * FROM usertbl";
	$sql =mysqli_query($db_connect,$query);
	if(mysqli_query($db_connect,$query)){

		while($row = mysqli_fetch_array($sql)) {
			echo $row['user'];
			if(!($user == $row['user'])){
				$query = "INSERT INTO usertbl (fullname, lname, fname, user, pass, status) VALUES ('$fullname', '$lname', '$fname', '$user', '$pass', 'y')";
				if(mysqli_query($db_connect, $query)) {
					echo '<script>alert("Successfully Signedup."); window.location = "./"; </script>';
				} else {
					header('Location: ./errSign.php');
				}
			}
			else{
					echo '<script>alert("Username already taken."); window.location = "./"; </script>';
			}
		}
	}
?>