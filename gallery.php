<?php

  include 'includes/header.php';
  echo "<title>Image Gallery</title>";
?>

</head>

<body>
  <?php
    include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
  ?>
    <!-- <div class="slide">
      <img src="//localhost/ccs-dr/img/slide1.jpg">
    </div> -->
  <section id="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div id="gallerySLide" class="gallery_area">
              <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="img">
                <a href="//localhost/ccs-dr/img/gallery/magazine-third.jpg"><img src="//localhost/ccs-dr/img/gallery/magazine-third.jpg"></a>
                </div>
              </div>
               <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="img">
                <a href="//localhost/ccs-dr/img/gallery/magazine.jpg"><img src="//localhost/ccs-dr/img/gallery/magazine.jpg"></a>
                </div>
              </div>
               <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="img">
                <a href="//localhost/ccs-dr/img/gallery/magazine-unveiling.jpg"><img src="//localhost/ccs-dr/img/gallery/magazine-unveiling.jpg"></a>
                </div>
              </div>
               <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="img">
                <a href="//localhost/ccs-dr/img/gallery/dept1.jpg"> <img src="//localhost/ccs-dr/img/gallery/dept1.jpg"></a>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="img">
                <a href="//localhost/ccs-dr/img/gallery/teachers.jpg"><img src="//localhost/ccs-dr/img/gallery/teachers.jpg"></a>
                </div>
              </div>
               <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="img">
                 <a href="//localhost/ccs-dr/img/gallery/college-gate.jpg"> <img src="//localhost/ccs-dr/img/gallery/college-gate.jpg"></a>
                </div>
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
