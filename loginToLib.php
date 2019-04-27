<?php
	include('./connect.php');

	$user = mysqli_real_escape_string($db_connect, $_REQUEST['username']);
	$pass = mysqli_real_escape_string($db_connect, $_REQUEST['password']);

	$sel_sql = "SELECT * FROM usertbl WHERE user = '$user' AND pass = '$pass'";
	$admin_sel = "SELECT * FROM admintbl WHERE user = '$user' AND pass = '$pass'";

	if($res = mysqli_query($db_connect, $admin_sel)) {
		if(mysqli_num_rows($res) > 0) {
			$row = mysqli_fetch_assoc($res);
			session_start();
			$_SESSION['fullname'] = $row['name'];
			$_SESSION['user'] = 'admin';
 			echo '<script>alert("Welcome, '. $row['name'] .'!"); window.location="./landing.php";</script>';
			exit();
		} else {
			if($res = mysqli_query($db_connect, $sel_sql)) {
				if(mysqli_num_rows($res) > 0) {
					$row = mysqli_fetch_assoc($res);
					if($row['status'] == 'y') {
						session_start();
						$penalty_date = $row['penalty_date'];
						
						/*$yearNow =date('Y');
						$monthNow = date('m');
						$dayNow = date('d');
						
						$penalty_year = substr($penalty_date,0,4);
						$penalty_month = substr($penalty_date,5,2);
						$penalty_day = substr($penalty_date,8);

						$py = $yearNow - $penalty_year;
						$pm = $monthNow - $penalty_month;
						$pd = $dayNow - $penalty_day;

						$penalty = 0;
							if($py >= 0){
								if($pm >= 0){
									if($pd >= 0){
										$penalty = $dayNow - $penalty_day;
									}
									else{
										$penalty = 2;
									}
								}
								else{
									$penalty = 2;
								}
							}
							else{
								$penalty = 2;
							}*/

							$current = strtotime("now");
							$penalty = strtotime($row['penalty_date']);
							if($penalty == null) {
								$query2 = "UPDATE usertbl SET borrowed_status = 'y' WHERE id = ". $row['id'];
								$gotoHome = '<script>alert("1Welcome, '. $row['fullname'] .'!\nYou may now borrow books from the library."); window.location = "./home.php";</script>';
							} else {
								if($penalty < $current){
									$query2 = "UPDATE usertbl SET borrowed_status = 'y', penalty_date = null WHERE id = ". $row['id'];
									$gotoHome = '<script>alert("2Welcome, '. $row['fullname'] .'!\nYou may now borrow books from the library."); window.location = "./home.php";</script>';
								} else {
									$query2 = "UPDATE usertbl SET borrowed_status = 'n' WHERE id = ". $row['id'];
									$gotoHome = '<script>alert("3Welcome, '. $row['fullname'] .'!\nYou cannot borrow books due to your recent penalty.\nIt will last until '. date('F j, Y', $penalty).'"); window.location = "./home.php";</script>';
								}
							}
						$res = mysqli_query($db_connect,$query2);

						$_SESSION['user'] = 'user';
						$_SESSION['username'] = $row['user'];
						$_SESSION['fullname'] = $row['lname'];
						$_SESSION['id'] = $row['id'];

						echo $gotoHome;
					} else {
							echo '<script>alert("Account is Deactivated!"); window.location="./";</script>';
					}
				} else {
					echo '<script>alert("Invalid Account"); window.location="./";</script>';
				}
			}
		}
	}
?>