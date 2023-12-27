<?php

$conn = mysqli_connect("localhost","root","","studio8");

// Check connection
if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully";
?>
<!DOCTYPE html>
<html>
<head>
    <title>STUDIO8_Homepage</title>
    <link rel="stylesheet" href="maincss/MAINpage.css">
    <link rel="stylesheet" href="main-unused/About.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <a href="index.php"><img src="main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="" class="search-btn">
                <input type="text" placeholder="Search Here!" name="q">
                <button type="submit"><img src="icon/searchIcon.png"></button>
            </form>
            <ul>
                <!--<li><a href="#" class = "navbarTabFont">Overview</a></li>-->
                <li><a href="main-unused/About2.php" class = "navbarTabFont">About</a></li>
                <li><a href="https://github.com/Sirapobchon" class = "navbarTabFont">Contact us</a></li>
                <a href="transaction/MAINtransaction.php"><img src="icon/CartIcon.png" class="navbarIcon"></a>
                <a href="MAINselect.php"><img src="icon/SignIcon.png" class="navbarIcon"></a>
            </ul>
        </div>
        <div class="btn_accessories">
            <a href="#accesories" class = "btn">View more accessories</a>
            <a href="#accesories" class = "btn-nonline"> ></a>
        </div>
        <div class="Social">
            <a href="#" target="_blank"><img src="icon/IGIcon.png" class="SocialIcon"></a>
            <a href="#" target="_blank"><img src="icon/WhatAppIcon.png" class="SocialIcon"></a>
            <a href="#" target="_blank"><img src="icon/FBIcon.png" class="SocialIcon"></a>
        </div>
    </div>
    <div class="bannerplus">
        <h1 id="accesories" class="h1text"></h1>
            <img class="image" src="main-asset/STUDIO8_1.jpg" alt="acessoriesstudio8" usemap="#acessmap"">
            <map name="acessmap">
            <area shape="rect" coords="39,18,376,105" alt="acess" href="#">
            <area shape="rect" coords="581,211,882,424" href="main-unused/buyggphone.php">
        </map>
    </div>
    <!--<div class="bottominfo">
        <h1 id="opening" class="h1text"></h1>

        <div class="bottomdiv">
            <div class="Social">
                <a href="#" target="_blank"><img src="icon/IGIcon.png" class="SocialIcon"></a>
                <a href="#" target="_blank"><img src="icon/WhatAppIcon.png" class="SocialIcon"></a>
                <a href="#" target="_blank"><img src="icon/FBIcon.png" class="SocialIcon"></a>
            </div>
        </div>
    </div>-->
</body>
</html>