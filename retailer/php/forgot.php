<?php
session_start();
if(isset($_SESSION["retailerid"])){
	echo "<script language='Javascript'>
		location.href = '../index.php'
		</script>";
}
else {
?>
<?php

$username= $_POST['username'];
#$email= $_POST['email'];

/*if($username=='' && $email=='')
{
	echo "<script language='Javascript'>
	window.alert('Fields are empty')
	window.location.href='../html/forgotpass.php'
	</script>";
}
if($username!='' && $email=='')
{
	echo "<script language='Javascript'>
	window.alert('Enter Email address')
	window.location.href='../html/forgotpass.php'
	</script>";
}
if($username=='' && $email!='')
{
	echo "<script language='Javascript'>
	window.alert('Enter Username')
	window.location.href='../html/forgotpass.php'
	</script>";
}*/
if($username == ''){
	echo "<script language='Javascript'>
	window.alert('Enter Username')
	window.location.href='../html/forgotpass.php'
	</script>";
}

$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");

$sql0 = "SELECT email FROM retailer WHERE username ='$username'";
$result=$connect->query($sql0);

if($result-> num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
		$email = $row['email'];
		$to = $row['email'];
		$subject = "Response for changing password request - Universal Card Team";
		$message = '<html>
					<head>
					  <title>Response for changing password request</title>
					</head>
					<body>
					  <h2>Universal Card Team</h2>
					  <h4><b> Click below link to reset your password </b></h4>
					  <p><i>http://universalcard.16mb.com/retailer/html/recoverpass.php?username='.$username.'&email='.$email.'</i></p>
					  <p>Thank you for contacting Universal Card Team</p>
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
		if( $retval == true ) {
            echo "<script language='Javascript'>
			window.alert('Message sent successfully...')
			window.location.href='../index.php'
			</script>";
         }else {
            echo "<script language='Javascript'>
						window.alert('Message could not be sent...')
						window.location.href='../html/forgotpass.php'
						</script>";
         }
	}

}
else
{
	echo "<script language='Javascript'>
	window.alert('User doesn\'t exists')
	window.location.href='../html/forgotpass.php'
	</script>";
}

?>
<?php } ?>
