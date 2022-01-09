<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Admin Dashboard</title>";
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
				}elseif (strpos($url, 'blogSubmit=success')!== false) {
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
						$sql = "SELECT * FROM application_control";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);

						if(isset($_SESSION['a_id'])) {
						include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/admin-navbar.php');
						echo "
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='dashboard-section'>
								<h3> <span class='fa fa-file-alt' style='font-size: 30px;'></span>&nbsp; &nbsp; Application Forms</h3>
								<ul>
								<li><a href='//localhost/ccs-dr/admin/applications'><button type='button' class='btn btn-default'>New</button></a></li>
								<li><a href='//localhost/ccs-dr/admin/accepted-applications'><button type='button' class='btn btn-default'>Accepted</button></a></li>
								<li><a href='//localhost/ccs-dr/admin/rejected-applications'><button type='button' class='btn btn-default'>Rejected</button></a></li>
								<li><a href='//localhost/ccs-dr/admin/short-listed-applications'><button type='button' class='btn btn-default'>Short Listed</button></a></li>
								</ul>
							</div>
						</div>
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='dashboard-section'>
								<h3> <span class='fa fa-file-alt' style='font-size: 30px;'></span>&nbsp; &nbsp; Referral Code Generate</h3>
								<ul>
									<li><a href='//localhost/ccs-dr/admin/referral-code-generate'><button type='button' class='btn btn-default' >Generate</button></a> </li>
								</ul>
							</div>
						</div>";
						// <div class='col-lg-12 col-md-12 col-sm-12'>
						// 	<div class='dashboard-section'>
						// 		<h3> <span  class='fas fa-laptop' style='font-size: 30px;'></span>&nbsp; &nbsp; Generate Referral Code</h3>
						// 		<ul>
						// 				<li>	
						// 					<a href='//localhost/ccs-dr/admin/referral-code-generate'><button type='submit' class='btn btn-default' name='submit'>Generate</button></a> 
						// 				</li>
						// 		</ul>
						// 	</div>
						// </div>
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