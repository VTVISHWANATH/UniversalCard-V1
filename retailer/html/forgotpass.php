<?php
session_start();
if(isset($_SESSION["retailerid"])){
	echo "<script language='Javascript'>
		location.href = '../index.php'
		</script>";
}
else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
	<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
	<link href="../css/forgotpass.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/bttn.css" rel="stylesheet" type="text/css" media="all" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>
<body>
	<!--Main Container starts-->
	<div class="main_wrapper">
		<!--Header starts-->
		<div class="header_wrapper" align="center">
			<h1>
			<span style="color:purple;">Forgot password ? </span> <br />
			<span >Don't worry we are here to help you </span>
			</h1>
		</div>
		<!--Header ends-->

		<!--Navigation bar starts-->
		<div class="menubar">
			<!-- Menu Bar starts-->
			<ul id="menu">
				<li><a href="../index.php" />Home</a></li>
				<li><a href="./contactus.php" />Contact Us</a></li>
			</ul>
			<!-- Menu Bar ends-->
		</div>
		<!--Navigation bar ends-->

		<!--Content wrapper starts-->
		<div class="contenet_wrapper">
				<form action="../php/forgot.php" method="post" class="form">
					<h3 >Enter Username or User ID</h3>
					<input type="text" class="forgot-input" name="username" value="" placeholder="Username or User ID" required="" />
					<!--h3>Enter Email</h3>
					<input type="text" class="forgot-input" name="email" value="" placeholder="Email ID" required=""-->
					<br /><br />
					<input type="submit" name="submit" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Submit" />
				</form>
		</div>
		<!--Content wrapper ends-->

		<!--Footer starts-->
		<div id="footer" >
			<h2 style="text-align:center; padding-top:30px;">&copy; 2016 by www.universalcard.16mb.com </h2>
		</div>
		<!--Footer ends-->
	</div>
	<!--Main Container ends-->
</body>
</html>
<?php } ?>
