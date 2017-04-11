<?php
session_start();

if(isset($_SESSION["userid"])){
	session_unset();
	session_destroy();
}

echo "<script language='Javascript'>
	location.href = '../index.php'
	</script>";
?>
