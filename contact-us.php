<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');;
	echo "<title>BCA</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section id="contact-us">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12 col-sm-12">
					<div class='contact-us'>
						<form class='form-horizontal' role='form' > 
							<div class='contact-us-header'>
								<h3>Contact Us</h3>
								<div class="contact-us-header-dash">
									<span></span>
								</div> <br>
							</div>
							<div class='form-group'>             
								<div class='col-sm-12'>
									<label>Name</label>          
									<input type='text' class='form-control' id='contact-us-name' name='contact-us-name'>
								</div>    
							</div>
							<div class='form-group'>             
								<div class='col-sm-12'>
									<label>Email</label>          
									<input type='email' class='form-control' id='contact-us-email' name='contact-us-email'>
								</div>    
							</div>
							<div class='form-group'>             
								<div class='col-sm-12'>
									<label>Subject</label>          
									<input type='text' class='form-control' id='contact-us-subject' name='contact-us-subject'>
								</div>    
							</div>      
							<div class='form-group'>           
								<div class='col-sm-12'> 
									<label>Your Query</label>         
									<textarea rows="10" class='form-control' name='contact-us-query' id='contact-us-query'></textarea>      
								</div>    
							</div>    
							<div class='form-group'>       
								<div class='col-sm-12'>          
									<button type='submit' class='btn btn-primary '>Submit</button>     
								</div>    
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="contact-us">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<div class='contact-us'>
						<div class='contact-us-header'>
							<h3>Map</h3>
							<div class="contact-us-header-dash">
								<span></span>
							</div>
						</div>
						<div class="contact-us-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2524.32366573486!2d93.9755819226814!3d26.522286798608743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37468e6e68be78c3%3A0x4a4897a237b00637!2sDR+College+Computer+Science+Department!5e0!3m2!1sen!2sin!4v1534053207240" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class='contact-us'>
						<div class='contact-us-header'>
							<h3>Address:</h3>
							<div class="contact-us-header-dash">
								<span></span>
							</div>
						</div>
						<div class="contact-us-address">
							<b>DR College Computer Science Department</b> <br>
							Circuit House Road, Golaghat, Golaghat, Kachugaon, Assam 785621						
						</div>						
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>

</body>
</html> 