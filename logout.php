<?php
	session_start();
	session_unset();
	session_destroy();
echo'
	<html>
	<head> 
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
		<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
		<title>Logout | Library Management System</title>
	</head>
	<body>';
	include 'loader.php';
	echo	'<script type="text/javascript" src="./js/custom.js"></script>';
	echo '<script>alert("Logging out."); window.location = "./"; </script>';
	echo '</body></html>';
?>