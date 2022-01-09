<?php
	session_start();

	if (isset($_POST['action'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$blog_id = mysqli_real_escape_string($conn, $_POST['blog_id']);
		$action = mysqli_real_escape_string($conn, $_POST['action']);

		//-----Check if form datas are not filled-----

		if (empty($action)) {
			header ("Location: //localhost/ccs-dr/admin/verify-blog.php?error=empty");

			exit();
		} 
		if (empty($blog_id)) {
			header ("Location: //localhost/ccs-dr/admin/verify-blog.php?error=empty");

			exit();
		} 

		//-----End Check if form datas are not filled-----
	
		else {
			if ($action == "Publish") {
				$sql = "UPDATE blog SET status = 'Published'  WHERE blog_id = '$blog_id'";
				$result = $conn->query($sql);
				header ("Location: //localhost/ccs-dr/admin/verify-blog.php?success");
			}
			else {
				$verify_date = date("Y-m-d");
				$sql = "UPDATE blog SET status = 'Rejected' WHERE blog_id = '$blog_id'";
				$result = $conn->query($sql);
				header ("Location: //localhost/ccs-dr/admin/verify-blog.php?success");
			}
			

		}
				
			
	} else {
		header ("Location: //localhost/ccs-dr/admin/verify-blog.php?error");
		exit();
	}
	

	
?>