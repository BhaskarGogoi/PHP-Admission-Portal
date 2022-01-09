<?php
    ob_start();
    include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
?>
<header id='header'>
<nav class="navbar navbar-default" class='navbar-custom'>
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <a class="navbar-brand" href="//localhost/ccs-dr/index"><img src="//localhost/ccs-dr/img/logo-college2.png"></a>
       <a href="//localhost/ccs-dr/index" class="navbar-brand" id="brandText">
            <h3 style="font-size: 16px; margin-top: 5px; ">Center For Computer Studies</h3>
            <h3 style="font-size: 14px; color: #79adc9; margin-top: 4px;">Debraj Roy College</h3>
        </a>
    </div>
    <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" id='navBar'>
         <li><a href="//localhost/ccs-dr/index">Home</a></li>
         <li><a href="//localhost/ccs-dr/admission/applicant-login">Admission</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Courses <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="//localhost/ccs-dr/courses/bca">BCA</a></li>
                <li><a href="//localhost/ccs-dr/courses/pgdca">PGDCA</a></li>
                <li><a href="//localhost/ccs-dr/courses/6mccca">6MCCCA</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Student Zone <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="//localhost/ccs-dr/student-login">Student Login</a></li>
                <li><a href="//localhost/ccs-dr/downloads.php">Downloads</a></li>
            </ul>
        </li>
        <li><a href="//localhost/ccs-dr/faculty">Faculty</a></li>
        <li><a href="//localhost/ccs-dr/contact-us">Contact Us</a></li>
        <?php
            if(isset($_SESSION['s_id'])) {
                echo"
                <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle = 'dropdown'><span class='fa fa-user-alt' style='font-size: 20px;'></span> <b class='caret'></b></a>
                    <ul class='dropdown-menu'>
                        <li><a href='//localhost/ccs-dr/dashboard/account'>$_SESSION[firstname] </a><li>
                        <li><a href='//localhost/ccs-dr/dashboard/dashboard'>Dashboard</a></li>
                        <li>
                            <div class='nav-logout-button'>
                                <form action='//localhost/ccs-dr/includes/logout.script.php' method='POST'>
                                    <button name='submit'>Logout</button>
                                </form>
                            </div> 
                        </li>
                    </ul>
                </li>";} 
                elseif(isset($_SESSION['a_id'])) {
                echo"
                <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle = 'dropdown'><span class='fa fa-user-alt' style='font-size: 20px;'></span> &nbsp;Admin <b class='caret'></b></a>
                    <ul class='dropdown-menu'>
                        <li><a href='//localhost/ccs-dr/admin/account'>$_SESSION[a_firstname]</a><li>
                        <li><a href='//localhost/ccs-dr/admin/dashboard'>Dashboard</a></li>
                        <li>
                            <div class='nav-logout-button'>
                                <form action='//localhost/ccs-dr/includes/admin-logout-script.php' method='POST'>
                                    <button name='submit'>Logout</button>
                                </form>
                            </div> 
                        </li>
                    </ul>
                </li>";}
                elseif(isset($_SESSION['applicant_id'])) {
                echo "
                <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle = 'dropdown'><span class='fa fa-user-alt' style='font-size: 20px;'></span> &nbsp; <b class='caret'></b></a>
                    <ul class='dropdown-menu'>
                        <li><a href='//localhost/ccs-dr/admission/account'>$_SESSION[firstname]</a><li>
                        <li><a href='//localhost/ccs-dr/admission/dashboard'>Dashboard</a></li>
                        <li>
                            <div class='nav-logout-button'>
                                <form action='//localhost/ccs-dr/admission/includes/logout.script.php' method='POST'>
                                    <button name='submit'>Logout</button>
                                </form>
                            </div> 
                        </li>
                    </ul>
                </li>";}

        ?>   
        
      </ul>
    </div>
  </div>
</nav>
</header>
