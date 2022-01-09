<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Applicant Image Upload</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');		
	?>

	<section class="application">
		<div class="container">
		<?php
			$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			if (strpos($url, 'error=empty')!== false) {
				echo "
					<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
							&times;
						</button>    
						Fill out all the fields! 
					 </div>";
			} elseif (strpos($url, 'step-one=success')!== false) {
				echo "
					<div class='progress progress-striped' style='width: 80%; margin: 20px auto;'>    
						<div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: 35%;'>
							<span class='sr-only'>30% Complete (info)</span>1/3   
						</div> 
					</div";
			} 
		?>
			<div class="row">
					<?php
					if(isset($_SESSION['applicant_id'])) {
						$session = $_SESSION['applicant_id'];
					    $sql = "SELECT * FROM applicant_image WHERE applicant_id = '$session'";
					    $result = $conn->query($sql);
					    $row = mysqli_fetch_assoc($result);
					    $applicant_image_status = $row['applicant_image_status'];

					    if($applicant_image_status < 1) {
							echo"
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='application-section'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/admission/includes/upload_file.php'  method='POST' enctype='multipart/form-data'>
										<h3>Image Upload</h3>
										<div class='blue-dash'>
											<span></span>
										</div><br><br>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Applicant Photo</label>            
											<div class='col-sm-10'>         
												<input type='file' id='inputfile' name='applicant_image'>
											</div>    
										</div> <br><br>    
										<div class='form-group'>       
											<div class='col-sm-12'>          
												<button type='submit' class='btn btn-primary' name = 'submit'>Submit</button>    
											</div>    
										</div>
									</form>
								</div>
							</div>";
						} else {
							header("Location: //localhost/ccs-dr/admission/applicant-marks");
						}
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>       
									&times;    
								</button> You are not logged in! </div>
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