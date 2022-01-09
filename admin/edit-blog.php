<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Edit Blog</title>";
?>
</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if (strpos($url, 'error=empty')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Fill out all the fields! 
				 </div>";
		}elseif (strpos($url, 'error')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Something went wrong!
				 </div>";
		}
	?>

	<section class="application">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['a_id'])) {
						$session = $_SESSION['a_id'];
						include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/admin-navbar.php');

						$blog_id = mysqli_real_escape_string($conn, $_POST['edit']);
						$sql = "SELECT * FROM blog WHERE blog_id = '$blog_id'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);

						echo"
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='application-section'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/includes/edit-blog-inc.php' enctype='multipart/form-data'  method='POST'>
										<h3>Edit Blog</h3>
										<div class='blue-dash'>
											<span></span>
										</div><br><br>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Blog Title</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' name='blog-title' value='$row[blog_title]'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Author</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' name='author' value='$row[blog_author]' >
											</div>    
										</div>
										<div class='form-group'>
											<label class='col-sm-2 control-label'>Write Blog</label>             
											<div class='col-sm-10'>          
												<textarea rows='10' cols='100' name='blog'>
												$row[blog_content]
												</textarea>
											</div>   
										</div><br><br>   
										<div class='form-group'>       
											<div class='col-sm-12'>          
												<button type='submit' class='btn btn-primary' name='submit' value='$blog_id'>Update</button>    
											</div>    
										</div>
									</form>
								</div>
							</div>";						
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    <button type='button' class='close' data-dismiss='alert'        aria-hidden='true'>       &times;    </button> You are not logged in! </div>
								<h4 style='text-align: center; margin-top: 20px;'>
									Click <a href='//localhost/ccs-dr/admin/login'><span>here</span></a>
								to login.</h4>
							</div>";}
					?>

			</div>
		</div>
	</section>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>

</body>
</html> 