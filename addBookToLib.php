<?php
	include('./connect.php');

	function GetImageExtension($imagetype) {
	  if(empty($imagetype))
	    return false;
	  switch($imagetype) {
	    case 'image/bmp': return '.bmp';
	    case 'image/gif': return '.gif';
	    case 'image/jpeg': return '.jpg';
	    case 'image/png': return '.png';
	    default: return false;
	  }
}


	if (!empty($_FILES["fileToUpload"]["name"])) {
	  $file_name=$_FILES["fileToUpload"]["name"];
	  $temp_name=$_FILES["fileToUpload"]["tmp_name"];
	  $imgtype=$_FILES["fileToUpload"]["type"];
	  
		$dateNow = date("Y-m-d");
		$name = mysqli_real_escape_string($db_connect, $_REQUEST['name']);
		$author = mysqli_real_escape_string($db_connect, $_REQUEST['author']);
		$categ = mysqli_real_escape_string($db_connect, $_REQUEST['category']);
		$date = mysqli_real_escape_string($db_connect, $_REQUEST['date']);
		$borrow = mysqli_real_escape_string($db_connect, $_REQUEST['borrowed']);
		$status = mysqli_real_escape_string($db_connect, $_REQUEST['status']);
	  
	  $ext=GetImageExtension($imgtype);

	  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	  $imagename=date("d-m-Y")."-".time().$ext;
	  $image_path = "img/".$imagename;

	  $image_submission_date = date("Y-m-d");
	  $some_str = ",
	    image_path = '$image_path',
	    image_submission_date = '$image_submission_date' 
	  ";
	  if(move_uploaded_file($temp_name, $image_path)) {
			$query = "INSERT INTO `booktbl` (`name`, `author`, `category`, `date`, `borrowed`, `status`, `book_image`,`book_path`,`uploaded_date`) VALUES ('$name', '$author', '$categ', '$date', '$borrow', '$status','$image','$image_path', '$dateNow')";
			if(mysqli_query($db_connect, $query)) {
				header('Location: ./addbook.php');
			} else {
				header('Location: ./errSign.php');
			}
	  }
	  else{
	     exit("Error while uploading image on the server");
	  	
	  }
}
else{
			header('Location: ./errAddBook.php');
}

?>