

<?php
$conn = mysqli_connect("localhost","root","","studio8");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>



<!Doctype html>
    <head>
        <link rel="stylesheet" href="About.css">
        <title>Purchase</title>
    </head>
    <body>
        <img class="image" src="../main-asset/STUDIO8_2.jpg" alt="buyggstudio8" usemap="#buyggmap" >
        <map name="buyggmap">
        <area shape="rect" coords="42,25,299,98" alt="Homepageinbuygg" href="../index.php">
        <area shape="rect" coords="60,35,223,81" alt="aboutinbuygg" href="About2.php">                  <!--แก้ coordinate -->
        <area shape="rect" coords="60,35,223,81" alt="contractinbuygg" href="https://github.com/Sirapobchon">     <!--แก้ coordinate -->
        <area shape="rect" coords="60,35,223,81" alt="Cartinbuygg" href="../transaction/MAINtransaction.php">             <!--แก้ coordinate -->
        <area shape="rect" coords="60,35,223,81" alt="Humaninbuygg" href="../MAINselect.php">           <!--แก้ coordinate -->
        <!--<area shape="rect" coords="60,35,223,81" alt="buyphonebutton" href="buyggphone.php">-->
        
        </map>

    </body>

</html>
