<?php
session_start();
if(isset($_SESSION["retailerid"])){
	echo "<script language='Javascript'>
		location.href = './html/page1.php'
		</script>";
}
else {
?>

<!DOCTYPE html>
<html>
<head>
<title id="title">Retailer Login</title>
<link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />

<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Digital Login Form Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300italic,300,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Salsa' rel='stylesheet' type='text/css'>
<!-- js -->
<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
<!-- js -->
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- script for close -->
<script>
$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.vlcone').fadeOut('slow', function(c){
			$('.vlcone').remove();
		});
	});
});
</script>
<!-- //script for close -->
</head>
<body>
<div>
    <div class="content">
		<h1>Retailer Login Form</h1>
		<div class="main vlcone">
			<!--div class="alert-close"> </div-->
			<div class="hotel-left">
				<div class="pay_form">
					<h2>Login Here</h2>
					<form action="./php/db.php" method="POST">
						<!--input class="logo" type="text" value="Username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">
						<input class="key" type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required=""-->

						<input class="logo" type="text" placeholder="Username" name="username" required="">
						<input class="key" type="password" placeholder="Password" name="password" required="">

                        <p id="logmsg" align="center" style="color:yellow"> Enter username and password </p><br />
						<input type="submit" value="Login" name="submit">
					</form>
					<a href="./html/forgotpass.php">Forgot Password</a>
				</div>
				
				<!--a href="#" class="login-right">Register</a-->
				<div class="clear"></div>
			</div>
			<div class="hotel-right">
				<h3 style="color:red">UNIVERSAL CARD<span>SMART CARD FOR EVERYTHING</span></h3>
				<!--p style="color:red">A perfect place for buy goods online.</p-->
			</div>
			<div class="clear"></div>
		</div>
		<p class="footer">&copy; 2016 www.universalcard.16mb.com All Rights Reserved</p>
	</div>
</div>

</body>
</html>
<?php } ?>
