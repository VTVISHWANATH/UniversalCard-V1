<?php
session_start();

if(isset($_SESSION["userid"])){

$UID = $_SESSION["userid"];

if(isset($_POST['author']) && isset($_POST['email']) && isset($_POST['text']) ) {

		$author = $_POST['author'];
		$email = $_POST['email'];
		$text = $_POST['text'];

		$to = "help@universalcard.16mb.com";
		$subject = "Request from - UID = ".$UID." and Name = ".$author." ";
		$message = '<html>
					<head>
					  <title>Request</title>
					</head>
					<body>
					  <h2>Request To Universal Card Team - from '.$email.'</h2>
					  <h4></h4>
					  <h4>'.$text.'</h4>
					</body>
					</html>';
      	$headers  = 'MIME-Version: 1.0' . "\r\n";
        #$headers .= "Content-type: text/html - Dont Reply To this mail \r\n";   #<= add this for to get a html file
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";    #<= add this for to get a plain text
		#Content-type: text/html for html file to be send or Content-type: text/plain for normal text
		$headers .= "To: ".$to." \r\n";
		$headers .= "From: ".$email." \r\n";

        $retval = mail ($to,$subject,$message,$headers);
		if( $retval == true ) {
            echo "<script language='Javascript'>
			window.alert('Message sent successfully...')
			window.location.href='../html/userhome.php'
			</script>";
         }else {
            echo "<script language='Javascript'>
			window.alert('Message could not be sent...')
			window.location.href='../html/userhome.php'
			</script>";
         }
} else{
	echo "<script language='Javascript'>
	window.alert('Enter details properly...')
	window.location.href='../html/userhome.php'
	</script>";
}

} else {
	echo "<script language='Javascript'>
	window.alert('Log in and come here...')
	window.location.href='../index.php'
	</script>";
}
?>