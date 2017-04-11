<?php
session_start();
if(isset($_SESSION["retailerid"])){
	echo "<script language='Javascript'>
		location.href = '../index.php'
		</script>";
}
else {

if(isset($_GET['username']) && isset($_GET['email'])){
	
$username = $_GET['username'];
$email = $_GET['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recover password</title>
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
			<span style="color:purple;">Recover Password</span> <br />
			<span >Set your new password here</span>
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
				<form action="../php/recover.php" method="post" class="form">
					<h3 >Enter New Password</h3>
					<input type="password" class="forgot-input" name="password" value="" placeholder="New Password" required="" />
					<h3>Enter Password again</h3>
					<input type="password" class="forgot-input" name="re-password" value="" placeholder="Password again" required="" />
					<br /><br />
					<?php echo "<input type='hidden' name='username' value='$username' />" ?>
					<?php echo "<input type='hidden' name='email' value='$email' />" ?>
					<input type="submit" name="submit" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Submit" />
				</form>
		</div>
		<!--Content wrapper ends-->

		<!--Footer starts-->
		<div id="footer" >
			<h2 style="text-align:center; padding-top:30px;">&copy; 2016 by www.universalcard.16mb.com</h2>
		</div>
		<!--Footer ends-->
	</div>
	<!--Main Container ends-->
</body>
</html>
<?php
} else {
	echo "<script language='Javascript'>
		location.href = '../index.php'
		</script>";
}
} ?>
