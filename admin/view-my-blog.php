<?php
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>View Blog</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section class="application-view">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['a_id'])) {
						include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/admin-navbar.php');
						$session = $_SESSION['a_id'];
						$blog_id = $_POST['submit'];
						$sql = "SELECT * FROM blog WHERE blog_id = '$blog_id'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);

						echo "
						<div class='col-lg-8 col-md-8 col-sm-12'>
							<div class='blog-view-section'>";
								echo"
							    <img src='//localhost/ccs-dr/img/blog/$row[cover_image_name]'>
							    <h3><b>$row[blog_title] </b></h3>
							    <h6  style='display: inline;'><span class='fa fa-user-alt'></span> &nbsp; $row[blog_author] &nbsp; &nbsp;<i class='far fa-calendar-alt'></i>&nbsp; &nbsp; $row[submit_date] 

								    <form action='//localhost/ccs-dr/admin/edit-blog' method='POST' style='float: right;'>
								    	<button type='submit' name='edit' value='$blog_id'>Edit Blog</button>
								    </form>
							    </h6><br><br>
							    <p>$row[blog_content]</p>						
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