<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Blog</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');

	?>

	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="blog-single">
					<?php
						$id = mysqli_real_escape_string($conn, $_GET['id']);
						$sql = "SELECT * FROM blog WHERE blog_id='$id'";
					    $result = $conn->query($sql);
					    $row = mysqli_fetch_assoc($result);

					    echo"
					    <img src='//localhost/ccs-dr/img/blog/$row[cover_image_name]'>
					    <h3><b>$row[blog_title] </b></h3>
					    <h6><span class='fa fa-user-alt'></span> &nbsp; $row[blog_author] &nbsp; &nbsp;<i class='far fa-calendar-alt'></i>&nbsp; &nbsp; $row[submit_date]</h6><br>
					    <p>$row[blog_content]</p>";
					?>					
				</div>
			</div>

			<!--=========== Courses Side Bar ================-->

			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="courses-sidebar">
					<div class="courses-sidebar-title">
						Latest Blogs
					</div>
					<div>
						<ul>
							<?php
							$sql = "SELECT * FROM blog WHERE status = 'Published' ORDER BY blog_id DESC LIMIT 5";
							$result = $conn->query($sql);

							while($row = mysqli_fetch_assoc($result)) {
								echo "<li><a href='//localhost/ccs-dr/blog-single?id=$row[blog_id]'>$row[blog_title]</a></li><hr>";
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>


</body>
</html>