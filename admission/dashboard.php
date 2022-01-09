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
				}elseif (strpos($url, 'blog=success')!== false) {
					echo "
						<div class='alert   alert-success alert-dismissable' style='width: 395px; margin: 20px auto; margin-top: 20px;'>    
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
								&times;
							</button>    
							Blog Successfully Submitted!
						 </div>";
				}
			?>
			<div class="row">
					<?php
						if(isset($_SESSION['applicant_id'])) {
						$session = $_SESSION['applicant_id'];
                        $sql = "SELECT applicant_id FROM applications WHERE applicant_id = '$session'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        $applied = $row['applicant_id'];

                        //getting data from applicant_image table to check if the image is already uploaded.
                        $sql2 = "SELECT applicant_id FROM applicant_image WHERE applicant_id = '$session'";
                        $result2 = $conn->query($sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $image_uploaded= $row2['applicant_id'];

                        //getting data from applicant_marks table to check if the marks are already entered.
                        $sql3 = "SELECT applicant_id FROM applicant_marks WHERE applicant_id = '$session'";
                        $result3 = $conn->query($sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        $marks= $row3['applicant_id'];

                        //getting data from application_control 
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
										echo "<li><a href='//localhost/ccs-dr/admission/application'><button type='button' class='btn btn-default'>Apply Now</button></a></li>";
										} else {
											echo "<li style='margin-top: 12px;'><h3 style='font-size: 15px;'>Currently Not Available</h3></li>";
										}
									} elseif ($image_uploaded == 0) {
										if ($Status == 'Active') {
										echo "<li><a href='//localhost/ccs-dr/admission/applicant-image-upload'><button type='button' class='btn btn-default'>Upload Image</button></a> </li>";
										} else {
											echo "<li style='margin-top: 12px;'><h3 style='font-size: 15px;'>Currently Not Available</h3></li>";
										}
											
									} elseif ($marks == 0) {
										if ($Status == 'Active') {
										echo "<li><a href='//localhost/ccs-dr/admission/applicant-marks'><button type='button' class='btn btn-default'>Submit Marks</button></a> </li>";
										} else {
											echo "<li style='margin-top: 12px;'><h3 style='font-size: 15px;'>Currently Not Available</h3></li>";
										}	
									} else {
										echo "<li><a href='//localhost/ccs-dr/admission/view-application'><button type='button' class='btn btn-default'>View Application</button></a> </li>";
										echo "<li><a href='//localhost/ccs-dr/admission/application-track'><button type='button' class='btn btn-default'>Track</button></a> </li>";
									}
								echo "</ul>
							</div>
						</div>
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='dashboard-section'>
								<h3> <span class='fa fa-user-circle' style='font-size: 30px;'></span>&nbsp; &nbsp; Account</h3>
								<ul>
									<li><a href='//localhost/ccs-dr/admission/account'><button type='button' class='btn btn-default'>View</button></a></li>
								</ul>
							</div>
						</div>";
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times;</button> You are not logged in! </div>
								<h4 style='text-align: center; margin-top: 20px;'>
									Click <a href='//localhost/ccs-dr/admission/applicant-login'><span>here</span></a>
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