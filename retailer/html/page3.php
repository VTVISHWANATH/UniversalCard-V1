<?php
session_start();
if(isset($_SESSION["retailerid"])){

$connect = mysqli_connect('localhost', 'root', '', 'universalcard') or die("Couldn't connect to database");

$retailid = $_SESSION["retailerid"];
$sql = "SELECT * FROM retailer WHERE RID = '$retailid'";
$records = $connect->query($sql);
$retailer=$records->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Retailer Profile </title>
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
<link href="../css/styles3.css" rel="stylesheet" type="text/css" />
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
            <li><a href="../html/page2.php"><span>Transaction details</span></a></li>
            <li class="active"><a href="../html/page3.php"><span>Profile</span></a></li>
            <li><a href="../html/page4.php"><span>Contact Us</span></a></li>
        </ul>
        </div>
        <!-- navigation bar ends -->

        <!-- featured starts-->
        <div id="featured">
            <ul>
                <li class="ss1"><a href="">Welcome to the Canteen</a></li>
            </ul>
            <form id="quote">
              <h2> Retailer details:</h2>
              <label>ID :
              <?php echo $retailer['RID']; ?></label>
              <br />
              <label>Name :
              <?php echo $retailer['username']; ?></label>
              <br />
              <label>Phone number :
              <?php echo $retailer['phone']; ?></label>
              <br />
              <label>Email ID :
              <?php echo $retailer['email']; ?></label>
              <br />
              <label>Balance :
              <?php echo $retailer['balance']; ?></label>
              <br />
            </form>
        </div>
        <!-- featured ends-->
        <div class="clear"></div>
    </div>
    <!-- container ends -->
</div>
<!-- wrapper ends -->

<!-- footer starts -->
<div id="footer">
  <div id="footerContainer">
    <form id="newsletter" action="../php/sessiondestroy.php" method="post">
      <input class="btn" type="image" src="../images/subscribe_btn.jpg"/>
    </form>
  </div>
</div>
<!-- footer ends -->
</body>
</html>

<?php
}else{
  echo "<script language='Javascript'>
  location.href = '../index.php'
  </script>";
}
?>
