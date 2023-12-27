<title>Delete Delivery</title>
<link rel="stylesheet" href="deliverypgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="deliveryform.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>

<?php
$con=mysqli_connect("localhost","root","","studio8");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$delem_value = $_REQUEST['deldeli'];
$delif_value = $_REQUEST['delif'];
//echo"$delif_value";

if($delif_value == 1) {
    $query = "DELETE FROM delivery WHERE order_ID='$delem_value'";
    mysqli_query($con, $query);
    echo"<h1 style='color:black' align='center' class='h1text'>Sucessfully Deleted</h1>";
}
?>

<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="deliveryform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>