<?php
session_start();
if(isset($_SESSION["retailerid"])){

$username= $_POST['username'];
$pin= $_POST['pin'];
$cost= $_POST['cost'];
$option= $_POST['menu'];
$retailid = $_SESSION["retailerid"];
?>
<?php
if($username=='' && $pin=='' && $cost=='')
{
	echo "<script language='Javascript'>
	window.alert('Fields are empty')
	window.location.href='../html/page1.php'
	</script>";
}
if($username!='' && $pin=='' && $cost!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter pin')
	window.location.href='../html/page1.php'
	</script>";
}
if($username=='' && $pin!='' && $cost!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter username')
	window.location.href='../html/page1.php'
	</script>";
}
if($username!='' && $pin!='' && $cost=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter cost')
	window.location.href='../html/page1.php'
	</script>";
}
if($username!='' && $pin=='' && $cost=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter data in other fields')
	window.location.href='../html/page1.php'
	</script>";
}
if($username=='' && $pin!='' && $cost=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter data in other fields')
	window.location.href='../html/page1.php'
	</script>";
}
if($username=='' && $pin=='' && $cost!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter data in other fields')
	window.location.href='../html/page1.php'
	</script>";
}

$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");

$sql = "SELECT UID,balance FROM user WHERE username ='$username' and PIN ='$pin'";

$result=$connect->query($sql);

if($result-> num_rows>0){
		while($row=$result->fetch_assoc()){
/*************************************************************/
		try {
	          $bal = $row['balance'];
	          $UID = $row['UID'];
	          if ($bal >= $cost) {
						$connect->begin_transaction();
						$connect->query("UPDATE user SET balance = balance - '$cost' WHERE UID ='$UID'");
		    			$connect->query("UPDATE retailer SET balance = balance + '$cost' WHERE RID = '$retailid'");
		    			$connect->query("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), '$cost', '$option', '$UID', '$retailid', 'Success')");
		    			$connect->commit();
		    			#echo 'The amount has been transferred successfully';
		    			echo "<script language='Javascript'>location.href = '../html/loader1.php'</script>";
	          }else {
		            	#echo 'Insufficient amount to transfer';
		            	$connect->query("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), '$cost', '$option', '$UID', '$retailid', 'Failed')");
		            	echo "<script language='Javascript'>location.href = '../html/loader2.php'</script>";
		        }
			} catch (Exception $e) {
    			$connect->rollback();
    			die($e->getMessage());
    			$connect->query("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), '$cost', '$option', '$UID', '$retailid', 'Failed')");
			}
/*************************************************************/
	}

	}
	else{
		echo "<script language='Javascript'>
	window.alert('Username or PIN doesn\'t match')
	window.location.href='../html/page1.php'
	</script>";
	}
?>
<?php
}else{
  echo "<script language='Javascript'>
	location.href = '../index.php'
	</script>";
}
?>
