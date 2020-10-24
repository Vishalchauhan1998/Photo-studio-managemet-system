<?php
	include "script/db.php";
	session_start();
	if(isset($_SESSION['psadmin']))
	{
		header("location:dashboard.php");
	}
	else
	{
		if(isset($_POST['btnLogin']))
		{
			$userid = $_POST['userid'];
			$pass = $_POST['password'];
			
			$login_query = mysql_query("SELECT * FROM admin_mst WHERE LOGIN_ID = '$userid' AND LOGIN_PASSWORD = '$pass'");
			$count = mysql_num_rows($login_query);
			
			if($count == 1)
			{
				$_SESSION['psadmin'] = $userid;
				header("location:dashboard.php");
			}
			else
			{
				header("location:index.php?msg=Failed");
			}
		}
?>
<!DOCTYPE html>
		<html lang="en">
		<head>
			<script src="cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
			<link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.png">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<title>Login</title>
			<!-- CSS -->
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
			<link href="assets/css/style.css" rel="stylesheet" type="text/css">
			<!-- Head Libs -->
			<script src="cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		</head>

		<body class="body-bg-full profile-page" style="background-image: url(assets/demo/night.jpg)">
			<div id="wrapper" class="row wrapper">
				<div class="col-10 ml-sm-auto col-sm-6 col-md-4 ml-md-auto login-center mx-auto" style="margin-top:120px;">
					<div class="navbar-header text-center">
						<h3 class="text-info">
							Photo Studio.
						</h3>
					</div>
					<!-- /.navbar-header -->
					<form class="form-material" method="POST">
						<div class="form-group">
							<input type="text" placeholder="johndoe" class="form-control form-control-line" name="userid" id="example-email">
							<label for="example-email">Username</label>
						</div>
						<div class="form-group">
							<input type="password" name="password" placeholder="password" class="form-control form-control-line">
							<label>Password</label>
						</div>
						<div class="form-group">
							<button class="btn btn-block btn-lg btn-color-scheme ripple" type="submit" name="btnLogin">Login</button>
						</div>
					</form>
					<!-- /.form-material -->
				</div>
				<!-- /.login-center -->
			</div>
			<!-- /.body-container -->
			<!-- Scripts -->
			<script type="text/javascript" src="cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script type="text/javascript" src="cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="assets/js/material-design.js"></script>
		</body>
		</html>
	
<?php
	}
?>