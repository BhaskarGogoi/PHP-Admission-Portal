<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$blog_title = mysqli_real_escape_string($conn, $_POST['blog-title']);
		$blog_author= mysqli_real_escape_string($conn, $_POST['author']);
		$blog_content = mysqli_real_escape_string($conn, $_POST['blog']);
		$blog_id = mysqli_real_escape_string($conn, $_POST['submit']);

		$sql = "UPDATE blog SET blog_title = '$blog_title' , blog_author = '$blog_author', blog_content = '$blog_content' WHERE blog_id = '$blog_id'";
		$result = $conn->query($sql);
		header ("Location: //localhost/ccs-dr/admin/my-blogs.php?blogEdit=success");					
			
	} else {
		header ("Location: //localhost/ccs-dr/admin/write-blog.php?error");
		exit();
	}
	
?>
