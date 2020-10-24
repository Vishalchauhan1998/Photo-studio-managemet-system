<?php 
	include "script/db.php";
	include "check_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/pace.css">
    <script src="cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Photo Studio Application..</title>
    <!-- CSS -->
	<link href="cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/mediaelement/4.1.3/mediaelementplayer.min.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/weather-icons-master/weather-icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendors/weather-icons-master/weather-icons-wind.min.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css" rel="stylesheet" type="text/css">
	<link href="cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">
    <link href="cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="assets/css/main.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body class="header-light sidebar-dark sidebar-expand">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <nav class="navbar">
            <!-- Logo Area -->
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">
				
                    <!-- <p>OSCAR</p> -->
                </a>
            </div>
            <!-- /.navbar-header -->
            <!-- Left Menu & Sidebar Toggle -->
            <ul class="nav navbar-nav">
                <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon">menu</i></a>
                </li>
            </ul>
            <!-- /.navbar-left -->
            <div class="spacer"></div>
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- SIDEBAR -->
        <aside class="site-sidebar scrollbar-enabled clearfix">
            <!-- User Details -->
            <div class="side-user">
                <a class="col-sm-12 media clearfix" href="javascript:void(0);">
                    <figure class="media-left media-middle user--online thumb-sm mr-r-10 mr-b-0">
                        <img src="assets/demo/users/user-image.png" class="media-object rounded-circle" alt="">
                    </figure>
                    <div class="media-body hide-menu">
                        <h4 class="media-heading mr-b-5 text-uppercase">Photo Studio</h4>
                    </div>
                </a>
            </div>
            <!-- /.side-user -->
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                <ul class="nav in side-menu">
                    <li>
						<a href="dashboard.php" class="ripple"><i class="list-icon material-icons">network_check</i>
							<span class="hide-menu">DASHBOARD	</span>
						</a>
					</li>
					
					<!-- Human Resources -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">group_add</i> <span class="hide-menu">Human Resources</span></a>
							</span>
						<ul class="list-unstyled sub-menu">
							<li class="menu-item-has-children"><a href="">Customer</a>
								<ul class="list-unstyled sub-menu">
								<li><a href="insert_customer_details.php">Add Customer Details</a></li>
								<li><a href="view_customer_details.php">View Customer Details</a></li> 
								</ul>
							</li>
							
							<li class="menu-item-has-children"><a href="">Employee</a>
								<ul class="list-unstyled sub-menu">
								<li><a href="insert_employee_details.php">Add Employee Details</a></li>
								<li><a href="view_employee_details.php">View Employee Details</a></li>
								<!--<li><a href="insert_employee_exp.php">Add Employee Expense</a></li>-->							
								</ul>
							</li>
						</ul>
					</li>
                
					<!-- Outdoor Order -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">build</i> <span class="hide-menu">Order Details</span>
							</span>
						</a>
						<ul class="list-unstyled sub-menu">
							<li><a href="insert_order_details.php">Add Order Details</a></li>
							<li><a href="view_function_order_details.php">View Marraige Orders</li> 
							<li><a href="view_outdoor_order_details.php">View Outdoor Orders</li> 
						</ul>
					</li>
					
					<!-- Album Details -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">photo</i> <span class="hide-menu">Manage Album</span>
							</span>
						</a>
						<ul class="list-unstyled sub-menu">
							<li><a href="photoalbum.php">Album Details</a></li>
							<li><a href="view_photoalbum.php">View Album Details</a></li>
						</ul>
					</li>
					
					
					<!-- Album Details -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">photo</i> <span class="hide-menu">Manage Images	</span>
							</span>
						</a>
						<ul class="list-unstyled sub-menu">
							<li><a href="year.php">Manage Year</a></li>
							<li><a href="album.php">Manage Album</a></li>
							<li><a href="image.php">Manage Images</a></li>
						</ul>
					</li>
					
					<!-- Video Details -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">camera_enhance</i> <span class="hide-menu">Manage Videos	</span>
							</span>
						</a>
						<ul class="list-unstyled sub-menu">
							<li><a href="video.php">Add Video</a></li>
							<li><a href="view_video_details.php">View Videos</a></li>
						</ul>
					</li>
					
					
					<!-- Photo Graphy -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">camera_alt</i> <span class="hide-menu">Photography</span>
							</span>
						</a>
						<ul class="list-unstyled sub-menu">
							<li><a href="photography_details.php">Photo Studio</a></li>
							<!--<li><a href="photoalbum_details.php">Album Details</a></li>-->
						</ul>
					</li>
					
					<!-- Accessories -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">loyalty</i> <span class="hide-menu">Accessories</span>
							</span>
						</a>
						<ul class="list-unstyled sub-menu">
							<li><a href="insert_accessories_details.php">Accessories</a></li>
						</ul>
					</li>
					
					<!-- Slider Detail -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">burst_mode</i> <span class="hide-menu">Slider</span></a>
							</span>
						<ul class="list-unstyled sub-menu">
							<li class="menu-item-has-children"><a href="slider.php">Add Slider Detail </a></li>
							<li class="menu-item-has-children"><a href="view_slider_details.php">View Slider Detail </a></li>
						</ul>
					</li>
					
					<!-- Others -->
					<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">build</i> <span class="hide-menu">OTHERS</span>
							</span>
						</a>
						<ul class="list-unstyled sub-menu">
							<li><a href="insert_type.php">Type Details</a></li>
							<li><a href="insert_sub_type.php">Sub Type Details</a></li> 
							<li><a href="insert_function.php">Function Details</a></li> 
						</ul>
					</li>
					
				<li class="list-divider"></li>
               	<li class="menu-item-has-children">
						<a href="javascript:void(0);" class="ripple">
							<span class="color-color-scheme">
								<i class="list-icon material-icons">list</i> <span class="hide-menu">Reports</span>
							</span>
						</a>
						<ul class="list-unstyled sub-menu">
							<li><a href="customer_report.php">Customer Reports</a></li>
							<li><a href="customer_bday_report.php">Birthday Reports</a></li>
							<li><a href="anniversary_report.php">Anniversary Reports</a></li>
							<li><a href="order_report.php">Order Reports</a></li>	
							<li><a href="camera_report.php">No. of Camera Reports</a></li>
						</ul>
				</li>
				
                <li><a href="logout.php"><i class="list-icon material-icons">settings_power</i> <span class="hide-menu">Log Out</span></a>
                </li>
                </ul>
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->
