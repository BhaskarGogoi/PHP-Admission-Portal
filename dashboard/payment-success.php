<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Payment Success</title>";
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

						$sql = "SELECT * FROM semester_fees WHERE s_id = $session";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);

						if (mysqli_num_rows($result) > 0) {
					    	echo"
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='payment-success-section'>
									<h4>Payment Success <hr></h4>
									<h3><b>Transaction ID:</b> $row[transaction_id]</h3>
									<h3><b>Roll No:</b> $row[roll_no]</h3>
									<h3><b>Name:</b> $row[student_name]</h3>
									<h3><b>Semester:</b> $row[semester]</h3>
									<h3><b>Amount:</b> $row[amount]</h3>
									<h3><b>Payment Date:</b> $row[amount]</h3>
								</div>
							</div>";	
						} else {
							echo"
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='payment-success-section'>
									<h3>Semester Fees Not Yet Paid</h3>
								</div>
							</div>";
						}		
						
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