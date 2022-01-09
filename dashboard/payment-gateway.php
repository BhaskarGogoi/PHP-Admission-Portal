<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Payment Gateway</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section class="application">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['s_id'])) {
						$session = $_SESSION['s_id'];

						if(isset($_POST['pay'])) {
							$_SESSION['semester'] = $_POST['semester'];
							$_SESSION['roll'] = $_POST['roll'];
							$_SESSION['name'] = $_POST['name'];
							$_SESSION['amount'] = $_POST['amount'];
						}
					    	echo"
							<div class='col-lg-8 col-md-8 col-sm-12'>
								<div class='application-section'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/includes/pay-fees-script.php'  method='POST'>
										<h3>Pay Fees</h3>
										<div class='blue-dash'>
											<span></span>
										</div><br><br>
										<div class='form-group'>
											<label class='col-sm-3 control-label'>Card Number</label>
											<div class='col-sm-9' >
										 		<input type='text' class='form-control' name='card_number' >
									 		</div>    
										</div>
										<div class='form-group'>
											 	<label class='col-sm-3 control-label'>Expiration Date</label>            
												<div class='col-sm-9'>         
													<input type='date' class='form-control' name='expiry_date'>
												</div>    
										</div>
										<div class='form-group'>
											 	<label class='col-sm-3 control-label'>CVV/CVC</label>            
												<div class='col-sm-9'>         
													<input type='text' class='form-control' name='cvv'>
												</div>    
										</div>
										<div class='form-group'>
											 	<label class='col-sm-3 control-label'>Name on card</label>            
												<div class='col-sm-9'>         
													<input type='text' class='form-control' name='name_on_card' >
												</div>    
										</div>
										<div class='form-group'>
											 	<label class='col-sm-3 control-label'>Amount</label>            
												<div class='col-sm-9'>         
													<input type='text' class='form-control' name='amount' value='10000' readonly>
												</div>    
										</div>
										<div class='form-group'>       
											<div class='col-sm-12'>          
												<button type='submit' class='btn btn-primary' name='submit'>Pay</button>    
											</div>    
										</div>
									</form>
								</div>
							</div>
							<div class='col-lg-4 col-md-4 col-sm-12'>
								<div class='application-section'>
									<h3>PAY TO</h3>
									<div class='blue-dash'>
										<span></span>
									</div><br>
									<b>Center For Computer Studies</b><br>
									<b>Debraj Roy College</b><br><br>
									<div style='background-color: #dbeff8; padding: 15px; 5px;'>
										<b>Payment Amount: <span class='fa fa-rupee-sign'></span> 10000</b>
									</div>
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