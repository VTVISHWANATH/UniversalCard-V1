<?php
session_start();
if(isset($_SESSION["userid"])){
	echo "<script language='Javascript'>
		location.href = './html/userhome.php'
		</script>";
}
else {

?>
<!DOCTYPE html>
<html>
<head>
<title>User Sign in Form</title>
<link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Badge Sign In Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main">
		<h1>User Log in</h1>
		<div class="login-form">
			<h2>SignIn Form</h2>
			<div class="agileits-top">
				<form action="./php/login.php" method="post">
					<div class="styled-input">
						<input type="text" name="Username" required=""/>
						<label>Username</label>
						<span></span>
					</div>
					<div class="styled-input">
						<input type="password" name="Password" required="">
						<label>Password</label>
						<span></span>
					</div>
					<div class="wthree-text">
						<ul>
							<li>
								<input type="checkbox" id="brand" name="Check" value="">
								<label for="brand"><span></span> Remember me ?</label>
							</li>
							<li> <a href="./html/forgotpass.php">Forgot password?</a> </li>
						</ul>
						<div class="clear"> </div>
					</div>
			</div>
			<div id="error-msg">
				<p align="center"></p>
			</div>
			<div class="agileits-bottom">
				<input type="submit" name="submit" value="Sign In">
				</form>
			</div>
		</div>
	</div>
	<!-- //main -->
	<!-- copyright -->
	<div class="copyright">
		<p> © 2016 www.universalcard.16mb.com All rights reserved </p>
	</div>
	<!-- //copyright -->
</body>
</html>
<?php } ?>
