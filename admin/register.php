<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');;
	echo "<title>Admin Register</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');

		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if (strpos($url, 'error=empty')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Fill out all the fields! 
				 </div>";
		}
		elseif (strpos($url, 'error=username')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Username Already Exists! 
				 </div>";
		}
		elseif (strpos($url, 'error=email')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Email Already Exists! 
				 </div>";
		} elseif (strpos($url, 'input=invalid')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Input Invalid! 
				 </div>";
		} elseif (strpos($url, 'email=invalid')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Email invalid! 
				 </div>";
		} 
	?>
	<section class="admin-register">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<?php
					if(isset($_SESSION['a_id'])) {
						echo $_SESSION['a_id'];
						
						header ("Location: //localhost/ccs-dr/admin/dashboard");
					} else {
						echo "<div class='login-form'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/includes/admin-register.script.php' method='POST'> 
										<div class='login-header'>
											<h3>Admin Register</h3>   
										</div>
										<div class='form-group'>             
											<div class='col-sm-12'>          
												<input type='text' class='form-control' id='firstname' name='firstname' placeholder='First Name'>
											</div>    
										</div>
										<div class='form-group'>             
											<div class='col-sm-12'>          
												<input type='text' class='form-control' id='lastname' name='lastname' placeholder='Last Name'>
											</div>    
										</div>
										<div class='form-group'>             
											<div class='col-sm-12'>          
												<input type='text' class='form-control' id='email' name='email' placeholder='E-Mail'>
											</div>    
										</div>
										<div class='form-group'>             
											<div class='col-sm-12'>          
												<input type='text' class='form-control' id='username' name='username' placeholder='username'>
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
												<button type='submit' name='submit' class='btn btn-primary btn-block'>Register</button>    
											</div>    
										</div>
										<h2>
											Already have an account? <a href='//localhost/ccs-dr/admin/login'><span>Click Here</span></a>
										</h2>
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