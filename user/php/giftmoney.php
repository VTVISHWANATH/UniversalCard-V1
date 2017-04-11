<?php
session_start();
if(isset($_SESSION["userid"])){
$UID = $_SESSION["userid"];

if(isset($_POST["uid"]) && isset($_POST["money"]) && isset($_POST["password"])){
$uid = $_POST["uid"];
$money = $_POST["money"];
$password = $_POST["password"];

if($uid != $UID){

if($uid=='' && $money=='' && $password=='')
{
	echo "<script language='Javascript'>
	window.alert('Fields are empty')
	window.location.href='../html/userhome.php'
	</script>";
}
if($uid!='' && $money=='' && $password=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter UID')
	window.location.href='../html/userhome.php'
	</script>";
}
if($uid=='' && $money!='' && $password=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter Money')
	window.location.href='../html/userhome.php'
	</script>";
}
if($uid=='' && $money=='' && $password!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter Password')
	window.location.href='../html/userhome.php'
	</script>";
}
if($uid!='' && $money=='' && $password!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter data')
	window.location.href='../html/userhome.php'
	</script>";
}
if($uid!='' && $money!='' && $password=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter data')
	window.location.href='../html/userhome.php'
	</script>";
}
if($uid=='' && $money!='' && $password!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter data')
	window.location.href='../html/userhome.php'
	</script>";
}
/*****************************************************/
$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");
$sql = "SELECT UID,username,email FROM user WHERE UID='$uid'";
$result=$connect->query($sql);
if($result-> num_rows>0)
{
	$row = $result->fetch_assoc();

	$sql_1 = "SELECT balance,username,email FROM user WHERE UID='$UID' and password = '$password'";
	$result_1 = $connect->query($sql_1);
	if($result_1-> num_rows>0){

			$row_1 = $result_1->fetch_assoc();
			$bal = $row_1['balance'];
				try{
					if ($money <= $bal) {
						$connect->begin_transaction();
						$connect->query("UPDATE user SET balance = balance - '$money' WHERE UID='$UID'");
						$connect->query("UPDATE user SET balance = balance + '$money' WHERE UID='$uid'");
						$connect->commit();

						echo "<script language='Javascript'>
						window.alert('successfully Transferred')
						window.location.href='../html/userhome.php'
						</script>";
						/********Mail Sent to current user **************/
						$to = $row_1['email'];
						$subject = "Successfully Transferred Rs ".$money." eMoney to ".$row['username']." - Universal Card Team";
						$message = '<html>
									<head>
									  <title>eMoney has been Transferred Successfully</title>
									</head>
									<body>
									  <h2>Universal Card Team</h2>
									  <h3><b>As per your request,</b></h3>
									  <h4><b>We Successfully Transferred Rs '.$money.' eMoney to - '.$row['username'].' with UID - '.$uid.'</b></h4>
									  <p><i>If this action is not done by you then Contact Universal Card help@universalcard.16mb.com </i></p>
									  <p>Thank you for using Universal Card</p>
									</body>
									</html>';
				      	$headers  = 'MIME-Version: 1.0' . "\r\n";
				        #$headers .= "Content-type: text/html - Dont Reply To this mail \r\n";   #<= add this for to get a html file
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";    #<= add this for to get a plain text
						#Content-type: text/html for html file to be send or Content-type: text/plain for normal text
						$headers .= "To: ".$to." \r\n";
						$headers .= "From: help@universalcard.16mb.com \r\n";
						$headers .= "Do not Replay for this mail as it is auto generated. \r\n";
				        $retval = mail ($to,$subject,$message,$headers);
						/********Mail sent to Other user **************/
						
						$to = $row['email'];
						$subject = "".$row_1['username']." Gifted Rs ".$money." eMonry to you - Universal Card Team";
						$message = '<html>
									<head>
									  <title>Gift eMoney has been added</title>
									</head>
									<body>
									  <h2>Universal Card Team</h2>
									  <h4><b>'.$row_1['username'].' Gifted Rs '.$money.' eMoney to you. With his UID - '.$UID.'</b></h4>
									  <p>Thank you for using Universal Card</p>
									</body>
									</html>';
				      	$headers  = 'MIME-Version: 1.0' . "\r\n";
				        #$headers .= "Content-type: text/html - Dont Reply To this mail \r\n";   #<= add this for to get a html file
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";    #<= add this for to get a plain text
						#Content-type: text/html for html file to be send or Content-type: text/plain for normal text
						$headers .= "To: ".$to." \r\n";
						$headers .= "From: help@universalcard.16mb.com \r\n";
						$headers .= "Do not Replay for this mail as it is auto generated. \r\n";
				        $retval = mail ($to,$subject,$message,$headers);

						/*********************************************/
					} else {
						echo "<script language='Javascript'>
						window.alert('Insufficient Balance to transfer')
						window.location.href='../html/userhome.php'
						</script>";
					}
				}
				catch(Exception $e){
					$connect->rollback();
					die($e->getMessage());
						echo "<script language='Javascript'>
						window.alert('Failed to transfer Reason -".$e->getMessage()."')
						window.location.href='../html/userhome.php'
						</script>";
				}
	}else{
		echo "<script language='Javascript'>
		window.alert('Wrong Password')
		window.location.href='../html/userhome.php'
		</script>";
	}
} else {
	echo "<script language='Javascript'>
	window.alert('User Doesn\'t exists')
	window.location.href='../html/userhome.php'
	</script>";
}
/*****************************************************/
}else{
	echo "<script language='Javascript'>
	window.alert('Do not enter Your UID')
	window.location.href='../html/userhome.php'
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