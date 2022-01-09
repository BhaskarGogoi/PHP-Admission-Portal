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
			<div class="col-lg-8 col-md-8 col-sm-12">
				<div class="blog">
					<div class="blog-breadcum-title">Blog</div>
					<div class="blue-dash">
						<span></span>
					</div><br><br>
					<?php
						$sql = "SELECT * FROM blog WHERE status = 'Published' ORDER BY blog_id DESC";
					    $result = $conn->query($sql);
					    while($row = mysqli_fetch_assoc($result)) {
					    	echo"
						    <div class='col-lg-6 col-md-6 col-sm-12'>
								<div class='blog-item'>
									<img src='//localhost/ccs-dr/img/blog/$row[cover_image_name]'>
									<h4>$row[blog_title]</h4>
									<h6><span class='fa fa-user-alt'></span> &nbsp; $row[blog_author] &nbsp; &nbsp;<i class='far fa-calendar-alt'></i>&nbsp; &nbsp; $row[submit_date]</h6>
									<div class='paragraph'>
										<p>$row[blog_content]</p>
									</div><br>
									<form role='form' action='//localhost/ccs-dr/blog-single' method='GET'>
									<button value='$row[blog_id]' name='id'>More</button>
									</form>
								</div>
							</div>";
					    }
					?>
				</div>
			</div>

			<!--=========== Courses Side Bar ================-->

			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="courses-sidebar">
					<div class="courses-sidebar-title">
						Latest Result
					</div>
					<div>
						<ul>
							<li><a href="bca-result">BCA Result</a></li><hr>
							<li><a href="#">PGDCA Result</a></li><hr>
							
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