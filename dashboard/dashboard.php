<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Dashboard</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section class="dashboard">
		<div class="container">
			<?php
				$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				if (strpos($url, 'step-three=success')!== false) {
					echo "
						<div class='alert   alert-success alert-dismissable' style='width: 395px; margin: 20px auto; margin-top: 20px;'>    
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
								&times;
							</button>    
							Application Successfully Submitted!
						 </div>";
				}
			?>
			<div class="row">
					<?php
						if(isset($_SESSION['s_id'])) {
						$session = $_SESSION['s_id'];
                        $sql = "SELECT applicant_id FROM applications WHERE applicant_id = '$session'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        $applied = $row['applicant_id'];

                        //getting data from applicant_image table
                        $sql2 = "SELECT applicant_id FROM applicant_image WHERE applicant_id = '$session'";
                        $result2 = $conn->query($sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $image_uploaded= $row2['applicant_id'];

                        //getting data from applicant_marks table
                        $sql3 = "SELECT applicant_id FROM applicant_marks WHERE applicant_id = '$session'";
                        $result3 = $conn->query($sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        $marks= $row3['applicant_id'];

                        //getting data from application_control form
                        $sql4 = "SELECT * FROM application_control";
                        $result4 = $conn->query($sql4);
                        $row4 = mysqli_fetch_assoc($result4);
                        $Status= $row4['app_status'];
						echo "
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='dashboard-section'>
								<h3> <span class='fa fa-file-alt' style='font-size: 30px;'></span>&nbsp; &nbsp; Application Form</h3>
								<ul>";
								?>
								<!--Check if applied already or not-->
								<?php
									if($applied == 0) {
										if ($Status == 'Active') {
										echo "<li><a href='//localhost/ccs-dr/dashboard/application.php'><button type='button' class='btn btn-default'>Apply Now</button></a></li>";
										} else {
											echo "<li style='margin-top: 12px;'><h3 style='font-size: 15px;'>Currently Not Available</h3></li>";
										}
									} elseif ($image_uploaded == 0) {
										if ($Status == 'Active') {
										echo "<li><a href='//localhost/ccs-dr/dashboard/applicant-image-upload.php'><button type='button' class='btn btn-default'>Upload Image</button></a> </li>";
										} else {
											echo "<li style='margin-top: 12px;'><h3 style='font-size: 15px;'>Currently Not Available</h3></li>";
										}
											
									} elseif ($marks == 0) {
										if ($Status == 'Active') {
										echo "<li><a href='//localhost/ccs-dr/dashboard/applicant-marks.php'><button type='button' class='btn btn-default'>Submit Marks</button></a> </li>";
										} else {
											echo "<li style='margin-top: 12px;'><h3 style='font-size: 15px;'>Currently Not Available</h3></li>";
										}	
									} else {
										echo "<li><a href='//localhost/ccs-dr/dashboard/view-application.php'><button type='button' class='btn btn-default'>View Application</button></a> </li>";
										echo "<li><a href='//localhost/ccs-dr/dashboard/application-track.php'><button type='button' class='btn btn-default'>Track</button></a> </li>";
									}
							
								echo "</ul>
							</div>
						</div>
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='dashboard-section'>
								<h3><span class='fa fa-rupee-sign' style='font-size: 30px;'></span>&nbsp; &nbsp; Fees Payment</h3>
								<ul>
									<li><a href='//localhost/ccs-dr/dashboard/pay-fees.php'><button type='button' class='btn btn-default'>Pay Fees</button></a> </li>
									<li><a href='//localhost/ccs-dr/dashboard/payment-receipt.php'><button type='button' class='btn btn-default'>View Receipts</button></a></li>
								</ul>
							</div>
						</div>
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='dashboard-section'>
								<h3><span class='fa fa-rupee-sign' style='font-size: 30px;'></span>&nbsp; &nbsp; Blog</h3>
								<ul>
									<li><a href='//localhost/ccs-dr/dashboard/write-blog.php'><button type='button' class='btn btn-default'>Write Blog</button></a> </li>
									<li><a href='//localhost/ccs-dr/dashboard/my-blogs.php'><button type='button' class='btn btn-default'>My Blogs</button></a> </li>
								</ul>
							</div>
						</div>
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='dashboard-section'>
								<h3> <span class='fa fa-user-circle' style='font-size: 30px;'></span>&nbsp; &nbsp; Account</h3>
								<ul>
									<li><a href='//localhost/ccs-dr/dashboard/account.php'><button type='button' class='btn btn-default'>View</button></a></li>
								</ul>
							</div>
						</div>";
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    <button type='button' class='close' data-dismiss='alert'        aria-hidden='true'>       &times;    </button> You are not logged in! </div>
								<h4 style='text-align: center; margin-top: 20px;'>
									Click <a href='//localhost/ccs-dr/student-login.php'><span>here</span></a>
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