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
			<div class="row">
					<?php

						if(isset($_SESSION['a_id'])) {
						include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/admin-navbar.php');

						$referral_code = mt_rand(10000, 10000000);


						//-----Check if referral is already exists----- 
						$sql = "SELECT * FROM referral_code WHERE referral_code = '$referral_code'";
						$result = $conn->query($sql);
						$Check = mysqli_num_rows($result);
						if ($Check > 0) {
							echo "Error: Already Exists";

						} else {
							$sql = "INSERT INTO referral_code (referral_code, status)
							VALUES ('$referral_code', 'unused')";
							$result = $conn->query($sql);								
						}

						$sql = "SELECT * FROM referral_code ORDER BY id desc";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);

						$ref_code = $row['referral_code'];

						echo "
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='dashboard-section'>
								<h3> <span class='fa fa-file-alt' style='font-size: 30px;'></span>&nbsp; &nbsp; Generate Referral Code</h3><br><br>
								<div class='referral-code-generate'>
									<input type='text' name='' value='$ref_code' id='referralCode'><br><br>
									<a href='//localhost/ccs-dr/admin/referral-code-generate'><button type='button' class='btn btn-default'>Re Generate</button></a>
								</div>
							</div>
						</div>
						";
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