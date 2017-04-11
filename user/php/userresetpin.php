<?php
session_start();
if(isset($_SESSION["userid"])){
$UID = $_SESSION["userid"];

if(isset($_POST["pin"]) && isset($_POST["re-pin"])){
$pin = $_POST["pin"];
$repin = $_POST["re-pin"];

if($pin=='' && $repin=='')
{
	echo "<script language='Javascript'>
	window.alert('Fields are empty')
	window.location.href='../html/userhome.php'
	</script>";
}
if($pin!='' && $repin=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter PIN')
	window.location.href='../html/userhome.php'
	</script>";
}
if($pin=='' && $repin!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter PIN again')
	window.location.href='../html/userhome.php'
	</script>";
}

if($pin == $repin)
{
	$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");

		try{
			$connect->begin_transaction();
			$connect->query("UPDATE user SET PIN = '$pin' WHERE UID='$UID'");
			$connect->commit();

			echo "<script language='Javascript'>
			window.alert('PIN Reset successfully')
			window.location.href='../html/userhome.php'
			</script>";
		}
		catch(Exception $e){
			$connect->rollback();
			die($e->getMessage());
		}
} else {
	echo "<script language='Javascript'>
	window.alert('PIN doesn\'t Match')
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