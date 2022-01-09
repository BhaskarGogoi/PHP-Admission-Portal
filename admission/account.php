<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Account</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section class="account">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['applicant_id'])) {
						$session = $_SESSION['applicant_id'];
                        $sql = "SELECT * FROM applicant_profile WHERE applicant_id = '$session'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result); 
						echo "
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='account-section'>
								<h3>Account Summary</h3>
								<div class='blue-dash'>
									<span></span>
								</div><br><br>
								<div class='account-summery'>
									<h2>First Name: $row[firstname]</h2>
									<h2>Last Name: $row[lastname]</h2>
									<h2>Username : $row[username]</h2>
									<h2>Email : $row[email]</h2>
								</div>
							</div>
						</div>";
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    <button type='button' class='close' data-dismiss='alert'        aria-hidden='true'>       &times;    </button> You are not logged in! </div>
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