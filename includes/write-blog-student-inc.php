<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$blog_title = mysqli_real_escape_string($conn, $_POST['blog-title']);
		$blog_author= mysqli_real_escape_string($conn, $_POST['author']);
		$blog_content = mysqli_real_escape_string($conn, $_POST['editor1']);
		$date = date("d-m-Y");
		$session = $_SESSION['s_id'];

		$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		if (empty($blog_title)) {
			header ("Location: //localhost/ccs-dr/dashboard/write-blog.php?error=empty");
			exit();
		}
		if (empty($blog_author)) {
			header ("Location: //localhost/ccs-dr/dashboard/write-blog.php?error=empty");
			exit();
		}
		if (empty($blog_content)) {
			header ("Location: //localhost/ccs-dr/dashboard/write-blog.php?error=empty");
			exit();
		}
		if (empty($date)) {
			header ("Location: //localhost/ccs-dr/dashboard/write-blog.php?error=empty");
			exit();
		}
		if (empty($file)) {
			header ("Location: //localhost/ccs-dr/dashboard/write-blog.php?error=empty");
			exit();
		}


		//Upload Image
		

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 5152000) {
					$fileNameNew = $blog_title.uniqid('',  true).".".$fileActualExt;
					$fileDestination = $_SERVER['DOCUMENT_ROOT'].'/ccs-dr/img/blog/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);

					$sql = "INSERT INTO blog (blog_title, blog_author, author_type, id, blog_content, submit_date, cover_image_name, status) VALUES ('$blog_title', '$blog_author', 'Student', '$session',  '$blog_content','$date','$fileNameNew', 'Under Review');";
					$result = mysqli_query($conn, $sql);
					header ("Location: //localhost/ccs-dr/dashboard/dashboard.php?blog=success");
				}
				else
				{
					header("Location:  //localhost/ccs-dr/dashboard/write-blog.php?imageSizeTooBig");
					exit();
				}
			}
			else
			{
				header("Location:  //localhost/ccs-dr/dashboard/write-blog.php?errorUploadingTheImage");
				exit();
			}
		
		}	
		else
		{
				header("Location: //localhost/ccs-dr/dashboard/write-blog.php?invalidImageFormat");
				exit();
		}				
			
	} else {
		header ("Location: //localhost/ccs-dr/dashboard/write-blog.php?error");
		exit();
	}
	
?>
