<?php
session_start();
if(isset($_SESSION["userid"])){
	echo "<script language='Javascript'>
		location.href = '../index.php'
		</script>";
}else {
if(isset($_POST['username']) && isset($_POST['email'])){

$password= $_POST['password'];
$repassword= $_POST['re-password'];
$username = $_POST['username'];
$email = $_POST['email'];

if($password=='' && $repassword=='')
{
	echo "<script language='Javascript'>
	window.alert('Fields are empty')
	window.location.href='../html/recoverpass.php'
	</script>";
}
if($password!='' && $repassword=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter password')
	window.location.href='../html/recoverpass.php'
	</script>";
}
if($password=='' && $repassword!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter password again')
	window.location.href='../html/recoverpass.php'
	</script>";
}

if($password == $repassword)
{
	$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");
	
	$sql = "SELECT UID FROM user WHERE username ='$username' and email ='$email'";
	$result=$connect->query($sql);

	if($result-> num_rows>0){
	while($row=$result->fetch_assoc())
	{
		try{
			$UID = $row['UID'];
			$connect->begin_transaction();
			$connect->query("UPDATE user SET password='$password' WHERE UID='$UID'");
			$connect->commit();

			echo "<script language='Javascript'>
			window.alert('Password Reset successfully')
			window.location.href='../index.php'
			</script>";
		}
		catch(Exception $e){
			$connect->rollback();
			die($e->getMessage());
		}
	}
} else {
	echo "<script language='Javascript'>
	window.alert('User doesn\'t exists')
	window.location.href='../index.php'
	</script>";
}

} else {
	echo "<script language='Javascript'>
	window.alert('Password doesn\'t match')
	window.location.href='../html/recoverpass.php?username=".$username."&email=".$email."'
	</script>";
	
}
} else {
	echo "<script language='Javascript'>
	window.alert('Enter Username and Email')
	window.location.href='../index.php'
	</script>";
}
}
?>
