<?php
if(isset($_GET['username']) && isset($_GET['pin']) && isset($_GET['cost'])) {

$retailerid = "1";
$username = $_GET['username'];
$pin = $_GET['pin'];
$cost = $_GET['cost'];
$option = "Other";

$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");

$sql = "SELECT UID,balance FROM user WHERE username ='$username' and PIN ='$pin'";

$result=$connect->query($sql);

if($result-> num_rows>0){
		while($row=$result->fetch_assoc()){

		try {
				$bal = $row['balance'];
				$UID = $row['UID'];
				if ($bal >= $cost) {
					$connect->begin_transaction();
					$connect->query("UPDATE user SET balance = balance - '$cost' WHERE UID ='$UID'");
	    			$connect->query("UPDATE retailer SET balance = balance + '$cost' WHERE RID = '$retailerid'");
	    			$connect->query("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), '$cost', '$option', '$UID', '$retailerid', 'Success')");
	    			$connect->commit();
	    			echo "Success";
	            }else {
	            	$connect->query("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), '$cost', '$option', '$UID', '$retailerid', 'Failed')");
	            	echo "Failed";
	            }
			} catch (Exception $e) {
    			$connect->rollback();
    			die($e->getMessage());
    			$connect->query("INSERT INTO `bill` (`date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES ( NOW(), '$cost', '$option', '$UID', '$retailerid', 'Failed')");
			}
	}

	} else{
		echo "User doesnt exists";
	}
} else {
	echo "Welcome to Universal Card";
}
?>