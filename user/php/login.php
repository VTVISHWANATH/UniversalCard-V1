<?php
session_start();
if(isset($_SESSION["userid"])){
	echo "<script language='Javascript'>
		location.href = '../html/userhome.php'
		</script>";
}
else {

$username = $_POST['Username'];
$password = $_POST['Password'];

if($username=='' && $password=='')
{
	echo "<script language='Javascript'>
	window.alert('Fields are empty')
	window.location.href='../index.php'
	</script>";
}
if($username!='' && $password=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter password')
	window.location.href='../index.php'
	</script>";
}
if($username=='' && $password!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter username')
	window.location.href='../index.php'
	</script>";
}

$connect= mysqli_connect('127.0.0.1', 'root', '', 'universalcard') or die("Couldn't connect to database");

#$checkbox = $_POST['Check'];

$sql = "SELECT UID,password FROM user WHERE username ='$username'";
$result=$connect->query($sql);
if($result-> num_rows>0){
	while($row=$result->fetch_assoc()){
				$sudo = $row['UID'];
				$out = $row['password'];
	}

	function verify($password, $hashedPassword) {
	    return crypt($password, $hashedPassword) == $hashedPassword;
	}
	$verify = verify($password, $out);

	if($verify){
		$_SESSION["userid"] = $sudo;
		echo "<script language='Javascript'>
        location.href = '../html/userhome.php'
        </script>";
	}else{
		echo "<script language='Javascript'>
		window.alert('Incorrect Password')
		window.location.href='../index.php'
		</script>";
	}
}
else
{
	echo "<script language='Javascript'>
	window.alert('Username or Password incorrect')
	window.location.href='../index.php'
	</script>";
}
}
?>
