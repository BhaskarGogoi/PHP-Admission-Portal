<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Write Blog</title>";
?>
<script src="//localhost/ccs-dr/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  function Validate()
  {
     var file =document.getElementById("file").value;
     var fileInput = document.getElementById('file');
     if(file!='')
     {
           var checkimg = file.toLowerCase();
           if (!checkimg.match(/(\.jpg|\.JPG|\.jpeg|\.JPEG)$/)){ 
              document.getElementById("error").innerHTML="Only .jpg and .jpeg are allowed!";
              fileInput.value = ''; 
              return false;
           } else {
                document.getElementById("error").innerHTML="";
                var img = document.getElementById("file"); 
                if(img.files[0].size >  6291456) {
                    document.getElementById("error").innerHTML="Max File Size 5 MB!";
                    fileInput.value = '';
                    return false;
                } else{
                    document.getElementById("error").innerHTML="";
                    return true;
                }
            }
      }
  }
  </script>
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
		}elseif (strpos($url, 'imageSizeTooBig')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Image Size Too Big!
				 </div>";
		}elseif (strpos($url, 'errorUploadingTheImage')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Error uploading the image!
				 </div>";
		}elseif (strpos($url, 'invalidImageFormat')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Invalid Image Format!
				 </div>";
		}elseif (strpos($url, 'error')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Something went wrong!
				 </div>";
		}
	?>

	<section class="application">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['s_id'])) {
						$session = $_SESSION['s_id'];
						$sql = "SELECT firstname, lastname FROM student WHERE s_id = '$session'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);
						echo"
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='application-section'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/includes/write-blog-student-inc.php' enctype='multipart/form-data'  method='POST'>
										<h3>Write Blog</h3>
										<div class='blue-dash'>
											<span></span>
										</div><br><br>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Blog Title</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' name='blog-title' placeholder='Blog Title'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Author</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' name='author' value='$row[firstname] $row[lastname] 'autocomplete='off'>
											</div>    
										</div>
										<div class='form-group'>
											<label class='col-sm-2 control-label'>Write Blog</label>             
											<div class='col-sm-10'>          
												<textarea name='editor1'></textarea>
											</div>    
										</div>
										<div class='form-group'>
											<label class='col-sm-2 control-label'>Upload Cover Image</label>             
											<div class='col-sm-10'>          
												<input type='file' class='form-control' id='file' onchange='return Validate()' name='file' style='border:none; background-color: none;'>
												<div id='error' style='color: #ff0024'></div><br>
											</div>   
										</div><br><br>   
										<div class='form-group'>       
											<div class='col-sm-12'>          
												<button type='submit' class='btn btn-primary' name='submit'>Submit</button>    
											</div>    
										</div>
									</form>
								</div>
							</div>";						
						
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
	<script>
		CKEDITOR.replace( 'editor1' );
	</script>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>

</body>
</html> 