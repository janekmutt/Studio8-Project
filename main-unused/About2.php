

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
        <title>About</title>
    </head>
    <body>
        <img class="image" src="../main-asset/Aboutbackground.png" alt="aboutstudio8" usemap="#aboutmap" >
        <map name="aboutmap">
        <area shape="rect" coords="54,30,414,123" alt="about" href="../index.php">
        </map>

    </body>

</html>
