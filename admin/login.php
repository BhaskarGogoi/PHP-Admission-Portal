<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');;
	echo "<title>Admin Login</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>
	<section class="admin-Login">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<?php
					$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					if (strpos($url, 'register=success')!== false) {
						echo "
						<div class='alert alert-success alert-dismissable' style='width: 395px; margin: 0 auto; margin-bottom: 20px;'>    
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>    
							Student Successfully Registered! 
						</div>";
					} elseif (strpos($url, 'error=empty')!== false) {
						echo "
						<div class='alert alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-bottom: 20px;'>    
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>    
							Full out all the fields! 
						</div>";
					} elseif (strpos($url, 'error=not-found')!== false) {
						echo "
						<div class='alert alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-bottom: 20px;'>    
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>    
							Username/Password not found! 
						</div>";
					}

					if(isset($_SESSION['a_id'])) {
						header ("Location: //localhost/ccs-dr/admin/dashboard");
					} else {
						echo "<div class='login-form'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/includes/admin-login-script.php' method='POST'> 
										<div class='login-header'>
											<h3>Admin Login</h3>   
										</div>
										<div class='form-group'>             
											<div class='col-sm-12'>          
												<input type='text' class='form-control' id='username' name='username' placeholder='username' required='required'>
											</div>    
										</div>    
										<div class='form-group'>           
											<div class='col-sm-12'>          
												<div class='button-inside'>          
													<input type='password' id='passwordView' class='form-control' id='password' name='password' placeholder='Password' required='required'>
													<button type='button' onclick='changePwdView()'><i class='fa fa-eye' aria-hidden='true'></i></button>
												</div>      
											</div>    
										</div>       
										<div class='form-group'>       
											<div class='col-sm-12'>          
												<button type='submit' class='btn btn-primary btn-block'>Sign in</button>     
											</div>    
										</div>
										
									</form>
								</div>";}
					?>
				</div>
			</div>
		</div>
	</section>

	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>

</body>
</html> 