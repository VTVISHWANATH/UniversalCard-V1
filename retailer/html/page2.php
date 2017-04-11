<?php
session_start();
if(isset($_SESSION["retailerid"])){

$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");

$retailid = $_SESSION["retailerid"];
$sql = "SELECT * FROM bill WHERE RID = '$retailid'";
$records = $connect->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transaction Details </title>
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- wrapper starts -->
<div id="wrapper1">

    <!-- container starts -->
    <div id="container">

        <!-- navigation bar starts -->
        <div id="nav">
        <ul>
            <li><a href="../html/page1.php"><span>Home</span></a></li>
            <li class="active"><a href="../html/page2.php"><span>Transaction details</span></a></li>
            <li><a href="../html/page3.php"><span>Profile</span></a></li>
            <li><a href="../html/page4.php"><span>Contact Us</span></a></li>
        </ul>
        </div>
        <!-- navigation bar ends -->


        <div class="trans_table" align="center">
            <table width="1000" border="4" cellpadding="2" cellspacing="2">
                <tr>
                    <th>BID</th>
                    <th>Date</th>
                    <th>Total amount</th>
                    <th>Type</th>
                    <th>Username</th>
                    <th>Status</th>
                </tr>
                <?php while($retailer=$records->fetch_assoc()): ?>

                <?php
                $ID = $retailer['UID'];
                $sql1 = $connect->query("SELECT username FROM user WHERE UID='$ID'");
                $res = $sql1->fetch_assoc();
                $username = $res['username'];
                ?>

                <tr>
                    <td><?php echo $retailer['BID']; ?></td>
                    <td><?php echo $retailer['date']; ?></td>
                    <td><?php echo $retailer['total_amt']; ?></td>
                    <td><?php echo $retailer['type']; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $retailer['status']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <div class="clear"></div>

    </div>
    <!-- container ends -->

</div>
<!-- wrapper ends -->

<!-- footer starts -->
<div id="footer">
  <div id="footerContainer">
    <form id="newsletter" action="../php/sessiondestroy.php" method="get">
      <input class="btn" type="image" src="../images/subscribe_btn.jpg"/>
    </form>
  </div>
</div>
<!-- footer ends -->
</body>
</html>

<?php

} else {
  echo "<script language='Javascript'>
	location.href = '../index.php'
	</script>";
}
?>
