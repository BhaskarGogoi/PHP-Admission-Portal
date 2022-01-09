<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Downloads</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section class="downloads">
		<div class="container">
			<div class="row">
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<div class='downloads-section'>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="downloads-section-box">
								<h4><i class="fas fa-file" style="font-size: 23px;"></i> &nbsp;&nbsp;Prospectus</h4>
								<a href="//localhost/ccs-dr/downloads/Prospectus.pdf"><button type="button" class="btn btn-primary" style="margin-top: 20%;">Download</button></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="downloads-section-box">
								<h4><i class="fas fa-file-alt" style="font-size: 23px;"></i> &nbsp;&nbsp;Syllebus</h4>
								<ul>
									<li><a href="#">First Semester</a></li>
									<li><a href="#">Second Semester</a></li>
									<li><a href="#">Third Semester</a></li>
									<li><a href="#">Fourth Semester</a></li>
									<li><a href="#">Fifth Semester</a></li>
									<li><a href="#">Sixth Semester</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="downloads-section-box">
								<h4><i class="fas fa-question" style="font-size: 23px;"></i> &nbsp;&nbsp;Question Papers</h4>
								<ul>
									<li><a href="#">First Semester</a></li>
									<li><a href="#">Second Semester</a></li>
									<li><a href="#">Third Semester</a></li>
									<li><a href="#">Fourth Semester</a></li>
									<li><a href="#">Fifth Semester</a></li>
									<li><a href="#">Sixth Semester</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>

</body>
</html> 