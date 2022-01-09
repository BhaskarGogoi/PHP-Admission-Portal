<?php

	include 'includes/header.php';
	echo "<title>CSS-DR</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>
	<section class="home_slider" class="no-margin">
		<div class="carousel slide" id="slider" data-ride="carousel">
			<ol class="carousel-indicators">
				<li class="active" data-slide-to="0" data-target="#slider"></li>
				<li data-slide-to="1" data-target="#slider"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active" id="slide1" style="background-image: url('//localhost/ccs-dr/img/slide2.jpg');">
					<div class="carousel-caption">
						<h4 style="font-family: Kalpurush;">সমন্বয়</h4>
						<p>Third best wall magazine published by Computer Science Department. Competition held on 01-Sep-2018 on the occasion of College Foundation Day</p>
					</div>
				</div>
				<div class="item" id="slide2" style="background-image: url('//localhost/ccs-dr/img/slide4.jpg');">
					<div class="carousel-caption">
						<h4>LAB 1</h4>
						<p>Well Equiped Computer Laboratory</p>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#slider" data-slide="prev" role="button"><span class="icon-prev"></span></a>			
			<a class="right carousel-control" href="#slider" data-slide="next" role="button"><span class="icon-next"></span></a>			
		</div>
	</section>

	<section id="about_us">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="about-us">
						<h3 class="about-us-title"><b>ABOUT US</b></h3>
						<div class="blue-dash">
							<span></span>
						</div><br>
						<p>The Center for Computer Studies , Debraj Roy College was established in 2001 with a view to support the employee, staff and other departments of the college. The center is running successfully computer courses in higher secondary and three year degree courses. In the year 2010, Dibrugarh University has accorded permission to offer BCA, PGDCA and DCA as self-financing courses. Accordingly we are going to offer these professional courses from the academic session 2011-2012.<br>
						&nbsp;&nbsp;&nbsp;&nbsp;The first batch (2011-12) of students achieved 100% result with the BCA students securing consistency in top most performance.  
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="notification-area">
						<h3 class="about-us-title"><b>Notifications</b></h3>
						<div class="blue-dash">
							<span></span>
						</div><br>
						<ul>
							<li>
								<a href="//localhost/ccs-dr/admission/applicant-login">
									<div>
										Admission Going On <span style="background-color: #ff0000; color: #fff; font-size: 11px; padding: 3px; border-radius: 3px; ">New</span>
									</div>
									<div class="notification-date">
										10-Aug-2018
									</div>
								</a>
							</li>
							<li><a href="//localhost/ccs-dr/result">Result</a></li>
							<li><a href="#">RUSA Tender</a></li>
							<li><a href="#">Event</a></li>
						</ul>
					</div>
					 <!-- <marquee direction="up"> A scrolling text created with HTML Marquee element.</marquee> -->
				</div>
			</div>
		</div>
	</section>

	<!-- Principal and HOD info -->
	<section id="why_us">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="why-us-title">
						<h3 class="about-us-title"><b>WHY US</b></h3>
						<div class="why-us-title-dash"></div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="why-us-single">
								<div class="whyus_icon">
			                      <span class="fa fa-desktop"></span>
			                    </div>
			                    <h3>Technology</h3>
		                    </div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="why-us-single">
								<div class="whyus_icon">
			                      <span class="fa fa-users"></span>
			                    </div>
			                    <h3>Best Tutors</h3>
			                </div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="why-us-single">
								<div class="whyus_icon">
			                      <span class="fa fa-flask"></span>
			                    </div>
			                    <h3>Practical Training</h3>
			                </div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="why-us-single">
								<div class="whyus_icon">
			                      <span class="fa fa-question-circle"></span>
			                    </div>
			                    <h3>Support</h3>
			                </div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Principal and HOD info -->

	<section id="principal-hod-info">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="principal-info">
						<div class="principal-hod-info-img"></div>
						<h3 class="about-us-title"><b>Principal's Message</b></h3>
						<div class="blue-dash">
							<span></span>
						</div><br>						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="hod-info">
						<div class="principal-hod-info-Img"></div>
						<h3 class="about-us-title"><b>HOD's Message</b></h3>
						<div class="blue-dash">
							<span></span>
						</div><br>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- 	<section>
		<div class="container" style="background-color: blue;">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="quote-box">
						<div class="quote-text">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>

</body>

</html>
