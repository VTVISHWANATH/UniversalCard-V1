<?php
session_start();
if(isset($_SESSION["retailerid"])){
	echo "<script language='Javascript'>
		location.href = '../html/page1.php'
		</script>";
}
else {
?>
<?php

$username= $_POST['username'];
$password= $_POST['password'];

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

$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");

$sql = "SELECT RID,password FROM retailer WHERE username ='$username'";

$result=$connect->query($sql);

if($result-> num_rows>0){
	while($row=$result->fetch_assoc()){
		$sudo = $row['RID'];
		$out = $row['password'];
	}

	function verify($password, $hashedPassword) {
	    return crypt($password, $hashedPassword) == $hashedPassword;
	}
	$verify = verify($password, $out);
	if($verify){
		$_SESSION["retailerid"] = $sudo;
		echo "<script language='Javascript'>
        location.href = '../html/page1.php'
        </script>";
	}else{
		echo "<script language='Javascript'>
		window.alert('Incorrect Password')
		window.location.href='../index.php'
		</script>";
	}
} else
{
    echo "<script language='Javascript'>
	window.alert('Username or Password doesn\'t match')
	window.location.href='../index.php'
	</script>";
}
?>
<?php } ?>