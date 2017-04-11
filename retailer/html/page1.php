<?php
session_start();
if(isset($_SESSION["retailerid"])){

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Canteen Home</title>
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Wraper starts-->
<div id="wrapper1">

    <!-- Container starts-->
    <div id="container">

        <!-- Navigation bar starts-->
        <div id="nav">
            <ul>
                <li class="active"><a href="../html/page1.php"><span>Home</span></a></li>
                <li><a href="../html/page2.php"><span>Transaction details</span></a></li>
                <li><a href="../html/page3.php"><span>Profile</span></a></li>
                <li><a href="../html/page4.php"><span>Contact Us</span></a></li>
            </ul>
        </div>
        <!-- Navigation bar ends-->

        <!-- featured starts-->
        <div id="featured">
            <ul>
                <li class="ss1"><a href="#">Welcome to the Canteen</a></li>
            </ul>
            <!-- form starts-->
            <form action="../php/db1.php" id="quote" method="post">
                <h2> Transaction details </h2>

                <label>Username:</label>
                <input type="text" value="" name="username" required="" />

                <label>PIN:</label>
                <input type="password" name="pin" required=""/>

                <label>Billing menu: </label>
                <select name = "menu">
                    <option value="Break fast">Break fast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Chocolates"> chocolates</option>
                    <option value="Cold drinks">Cold drinks</option>
                    <option value="Beverages"> Beverages</option>
                    <option value="Snacks"> Snacks</option>
                    <option value="Other" selected> Other</option>
                </select>

                <label> Cost </label>
                <br />
                <input type="text" name="cost" required="" />

                <input class="btn" type="image" src="../images/submit_btn.jpg"/ name="submit">
            </form>
            <!-- form ends-->
        </div>
        <!-- featured ends-->

        <!-- content starts-->
        <div id="content">
                <div class="col">
                    <h2>About Canteen details</h2>
                    <p>LHC Caneen, B V Bhoomaraddi College of</p>
                    <p>Engineering & technology,Hubli</p>
                    <a href="http://bvb.edu/" class="readmore">Read More</a>
                </div>

                <div class="col noMargin">
                    <h2>Our Services</h2>
                    <p>Snacks, Breakfast, Chocolates  </p>
                    <p>Lunch</p>
                    <p>Fast food and cold drinks</p>
                    <!--a href="#" class="readmore">Read More</a-->
                </div>
        </div>
        <!-- content ends-->
        <div class="clear"></div>

    </div>
    <!-- Container ends-->

</div>
<!-- Wraper ends-->

<!-- footer starts-->
<div id="footer">
  <div id="footerContainer">
    <form id="newsletter" action="../php/sessiondestroy.php" method="post">
      <input class="btn" type="image" src="../images/subscribe_btn.jpg"/>
    </form>
  </div>
</div>
<!-- footer ends-->

<!--script src="../js/jquery-2.1.4.min.js"></script>
<script>
    window.onbeforeunload = function() {
     $.post('../php/sessiondestroy.php');
    }
</script-->

</body>
</html>

<?php

} else {
  echo "<script language='Javascript'>
	location.href = '../index.php'
	</script>";
}
?>
