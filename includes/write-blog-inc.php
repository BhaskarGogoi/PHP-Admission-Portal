<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$blog_title = mysqli_real_escape_string($conn, $_POST['blog-title']);
		$blog_author= mysqli_real_escape_string($conn, $_POST['author']);
		$blog_content = mysqli_real_escape_string($conn, $_POST['blog']);
		$date = date("d-m-Y");

		//Upload Image
		$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 5152000) {
					$fileNameNew = $blog_title.uniqid('',  true).".".$fileActualExt;
					$fileDestination = $_SERVER['DOCUMENT_ROOT'].'/ccs-dr/img/blog/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);

					$sql = "INSERT INTO blog (blog_title, blog_author, blog_content, submit_date, cover_image_name) VALUES ('$blog_title', '$blog_author', '$blog_content','$date','$fileNameNew');";
					$result = mysqli_query($conn, $sql);
					header ("Location: //localhost/ccs-dr/admin/dashboard.php");
				}
				else
				{
					header("Location:  //localhost/ccs-dr/admin/write-blog.php?imageSizeTooBig");
					exit();
				}
			}
			else
			{
				header("Location:  //localhost/ccs-dr/admin/write-blog.php?errorUploadingTheImage");
				exit();
			}
		
		}	
		else
		{
				header("Location: //localhost/ccs-dr/admin/write-blog.php?invalidImageFormat");
				exit();
		}				
			
	} else {
		header ("Location: //localhost/ccs-dr/admin/write-blog.php?error");
		exit();
	}
	
?>
