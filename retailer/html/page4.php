<?php
session_start();
if(isset($_SESSION["retailerid"])){

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Admin </title>
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
<link href="../css/styles2.css" rel="stylesheet" type="text/css" />
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
                <li><a href="../html/page3.php"><span>Profile</span></a></li>
                <li class="active"><a href="../html/page4.php"><span>Contact Us</span></a></li>
            </ul>
        </div>
        <!-- navigation bar ends -->

        <!-- featured starts -->
        <div id="featured">
            <ul>
                <li class="ss1"><a href="">Welcome to the Canteen</a></li>
            </ul>
            <form id="quote">
                <h2> Administrator details:</h2>
                <br />
                <label>1. V T Vishwanath - 9591104023</label>
                <label>   Email - vtvishwanathbhat@gmail.com</label>
                <br /><br />
                <label>2. Monika A H - 7829506322</label>
                <label>   Email - monikaahhvr@gmail.com</label>
                <br /><br />
                <label>3. Priyanka T - 8951697387</label>
                <label>   Email - priyankatupakad99@gmail.com</label>
                <br /><br />
                <label>4. Chetana R C - 9740652534</label>
                <label>   Email - chetanarc25@gmail.com</label>
                <br /><br />
                <label>----------------------------------------</label>
    			<label><B>		ESDM Cluster		</B></label>
                <label>B.V.Bhoomaraddi College Of Engineering and Technology,Hubli - 580031</label>
                <br />
            </form>
        </div>
        <!-- featured ends -->

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
<!-- footer starts -->
</body>
</html>

<?php
}else{
  echo "<script language='Javascript'>
  location.href = '../index.php'
  </script>";
}
?>
