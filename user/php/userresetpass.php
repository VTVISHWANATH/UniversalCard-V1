<?php
session_start();
if(isset($_SESSION["userid"])){
$UID = $_SESSION["userid"];

if(isset($_POST["password"]) && isset($_POST["re-password"])){
$password = $_POST["password"];
$repassword = $_POST["re-password"];

if($password=='' && $repassword=='')
{
	echo "<script language='Javascript'>
	window.alert('Fields are empty')
	window.location.href='../html/userhome.php'
	</script>";
}
if($password!='' && $repassword=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter password')
	window.location.href='../html/userhome.php'
	</script>";
}
if($password=='' && $repassword!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter password again')
	window.location.href='../html/userhome.php'
	</script>";
}

if($password == $repassword)
{
	$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");

		try{
			$connect->begin_transaction();
			$connect->query("UPDATE user SET password='$password' WHERE UID='$UID'");
			$connect->commit();

			echo "<script language='Javascript'>
			window.alert('Password Reset successfully')
			window.location.href='../html/userhome.php'
			</script>";
		}
		catch(Exception $e){
			$connect->rollback();
			die($e->getMessage());
		}
} else {
	echo "<script language='Javascript'>
	window.alert('Password doesn\'t Match')
	window.location.href='../index.php'
	</script>";
}
}else {
	echo "<script language='Javascript'>
		location.href = '../index.php'
		</script>";
}
}else {
	echo "<script language='Javascript'>
		location.href = '../index.php'
		</script>";
	}
?>