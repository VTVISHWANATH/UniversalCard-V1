<?php
session_start();
if(isset($_SESSION["userid"])){

$UID = $_SESSION["userid"]
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--
Template 2024 Vertiwood
http://www.tooplate.com/view/2024-vertiwood
-->
<title>User Home</title>
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link href="../css/bttn.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" href="css/coda-slider.css" type="text/css" charset="utf-8" />

<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
	
<div id="slider">
    <div id="tooplate_wrapper">
    	
        <div id="tooplate_sidebar">
        	
            <div id="header" align="center">
            	<h1>User Info</h1>
            </div>

            <div id="menu">
                <ul class="navigation">
                	<li><a href="#home" class="selected">Home</a></li>
                    <li><a href="#transaction_details">Transaction details</a></li>
                    <li><a href="#gift_money">Gift eMoney</a></li>
                    <li><a href="#resetpass">Reset Password</a></li>
                    <li><a href="#resetpin">Reset PIN</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#logout">Log Out</a></li>
                    <li><a href="#contact" class="last">Contact US</a></li>
                </ul>
            </div>
			
		</div> <!-- end of sidebar -->  
    
        <div id="content">
       	  	<div class="scroll">
        	  <div class="scrollContainer">

                <div id="block1" class="panel" id="home">
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");
                $sql = "SELECT * FROM user WHERE UID ='$UID'";
                $result=$connect->query($sql);
                $row=$result->fetch_assoc();
                ?>
                    <h1>User Details</h1> 
                    <h2></h2>
                    <h4>User ID (UID): <?php echo $row['UID'];?></h4>	           
                    <h4>Username: <?php echo $row['username'];?></h4>
                    <h4>Phone number: <?php echo $row['phone'];?></h4>
                    <h4>Email ID: <?php echo $row['email'];?></h4>
                    <h4>RF Card ID(RFID): <?php echo $row['RFID'];?></h4>
                    <h2></h2>
                    <h2><b>Balance: <?php echo $row['balance'];?></b></h2>            
                </div> <!-- end of home -->
				
                <div class="panel" id="transaction_details">
                    <?php
                    $sql_1 = "SELECT * FROM bill WHERE UID ='$UID'";
                    $result_1=$connect->query($sql_1);
                    ?>
                    <h1>Transaction Details</h1> 
                    <div class="styletable">
                        <table width="auto" border="4" cellpadding="2" cellspacing="2">
                            <tr>
                                <th><em>BID</em></th>
                                <th><em>Date<em></th>
                                <th><em>Total amount</em></th>
                                <th><em>Type</em></th>
                                <th><em>Retailer</em></th>
                                <th><em>Status</em></th>
                            </tr>
                            <?php while($row_1=$result_1->fetch_assoc()): ?>
                            <?php
                                $ID = $row_1['RID'];
                                $sql_2 = $connect->query("SELECT username FROM retailer WHERE RID='$ID'");
                                $res = $sql_2->fetch_assoc();
                                $rname = $res['username'];
                            ?>
                            <tr>
                            <td><?php echo $row_1['BID']; ?></td>
                            <td><?php echo $row_1['date']; ?></td>
                            <td><?php echo $row_1['total_amt']; ?></td>
                            <td><?php echo $row_1['type']; ?></td>
                            <td><?php echo $rname; ?></td>
                            <td><?php echo $row_1['status']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>    
                </div> <!-- end of transaction_details -->

                <div id="block1" class="panel" id="gift_money" align="center">
                	<h2>Gift eMoney to your Friend</h2>
                    <form action="../php/giftmoney.php" method="post" class="form">
						<h3 >Enter User ID (UID)</h3>
						<input type="number" class="forgot-input" name="uid" value="" placeholder="User ID (UID)" required="" pattern="[0-9]{6}" minlenght="1" maxlength="6" min="1"/>
						<br /><br />
						<h3>Enter eMoney</h3>
						<input type="number" class="forgot-input" name="money" value="" placeholder="eMoney" required="" pattern="[0-9]{6}" minlenght="1" maxlength="6" min="1"/>
						<br /><br />
						<h3>Enter Your Password</h3>
						<input type="password" class="forgot-input" name="password" value="" placeholder="Password" required="" />
						<br /><br />
						<input type="submit" name="submit" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Submit" />
					</form>                    
      	      	</div> <!-- end of gift_money -->

                <div id="block1" class="panel" id="resetpass" align="center">
                	<h2>Reset Password</h2>
                	<form action="../php/userresetpass.php" method="post" class="form">
						<h3 >Enter New Password</h3>
						<input type="password" class="forgot-input" name="password" value="" placeholder="New Password" required="" />
						<br /><br />
						<h3>Enter Password again</h3>
						<input type="password" class="forgot-input" name="re-password" value="" placeholder="Password again" required="" />
						<br /><br />
						<input type="submit" name="submit" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Submit" />
					</form>
      	      	</div> <!-- end of resetpass -->

      	      	<div id="block1" class="panel" id="resetpin" align="center">
                	<h2>Reset PIN - 4 digit number</h2>
                    <form action="../php/userresetpin.php" method="post" class="form">
						<h3 >Enter New PIN</h3>
						<input type="password" class="forgot-input" name="pin" value="" placeholder="New PIN" required="" pattern="[0-9]{4}" minlenght="4" maxlength="4"/>
						<br /><br />
						<h3>Enter PIN again</h3>
						<input type="password" class="forgot-input" name="re-pin" value="" placeholder="PIN again" required="" pattern="[0-9]{4}" minlenght="4" maxlength="4"/>
						<br /><br />
						<input type="submit" name="submit" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Submit" />
					</form>                    
      	      	</div> <!-- end of resetpin -->

        	    <div id="block1" class="panel" id="about">
                	<h2>About Us - Universal Card</h2>
                    <img src="images/vishwanath.jpg" alt="Image 03" class="image_wrapper image_fl" />
                    <img src="images/monika.jpg" alt="Image 03" class="image_wrapper image_fl" />
                    <div class="cleaner h10"></div>
                    <h5>V T Vishwanath - 9591104023 - vtvishwanathbhat@gmail.com</h5>
                    <h5>Monika A H - 7829506322 - monikaahhvr@gmail.com</h5>
                    
                    <img src="images/chetana.jpeg" alt="Image 03" class="image_wrapper image_fl" />
                    <img src="images/priyanka.jpg" alt="Image 03" class="image_wrapper image_fl" />
                    <div class="cleaner h10"></div>
                    <h5>Chetana R C - 8951697387 - chetanarc25@gmail.com</h5>
                    <h5>Priyanka T - 9740652534 - priyankatupakad99@gmail.com</h5>
                     
      	      	</div> <!-- end of about -->
				
                 <div class="panel" id="logout">
                    <form action="../php/logout.php" method="post" align="center" >
                        <br />
                        <img src="../images/main.png" height="150" width="200" />
                        <br />
                        <h2></h2>
                        <h3>Do You Really want to LogOut ?</h3>
                        <h2></h2>
                        <input type="submit" value="LogOut" class="bttn-gradient bttn-primary bttn-lg" />
                        <h2></h2>
                    </form>
                </div> <!-- end of logout -->

        	    <div class="panel" id="contact">
                    <br />
                    <h2>Contact Information</h2>
                    <h4>Universal Card Team</h4>
                    <h5>help@universalcard.16mb.com<h5>
                    <p>BVB College Of Engineering and Technology, Hubli - 580031</p>
                    <div class="cleaner h10"></div>
                    <div id="contact_form">
                      	<form name="contact" action="../php/mailus.php" method="post">
					  
							<label for="author2">Name:</label><input type="text" id="author2" name="author" class="required input_field" required="" />
							<div class="cleaner h10"></div>
							
							<label for="email">Email:</label><input type="text" id="email" name="email" class="validate-email required input_field" required="" />
							<div class="cleaner h10"></div>
							
							<label for="text">Message:</label><textarea id="text" name="text" rows="0" cols="0" class="required" required=""></textarea>
							<div class="cleaner h10"></div>
							
							<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Send" />
							<input type="reset" class="submit_btn float_r" name="reset" id="reset" value="Reset" />
                    	</form>
                  	</div>
        	  	</div><!-- end of contact -->
      	  	</div> <!-- end of scroll -->
		</div>
		
        <div class="cleaner"></div>
	</div>
    </div> <!-- end of content -->
	
    <div id="footer">
        <p>&copy; 2016 www.universalcard.16mb.com All Rights Reserved</p>
	</div>

</div>
</body>
</html>

<?php
} else {
  echo "<script language='Javascript'>
    location.href = '../index.php'
    </script>";
}
?>