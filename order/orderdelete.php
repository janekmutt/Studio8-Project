<link rel="stylesheet" href="workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="orderform.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<?php
$con=mysqli_connect("localhost","root","","studio8");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$delem_value = $_REQUEST['delcust'];
$delif_value = $_REQUEST['delif'];
//echo"$delif_value";

if($delif_value == 1) {
    $query = "DELETE FROM studio8.order WHERE order_id ='$delem_value'";
    mysqli_query($con, $query);
    echo"<h2 style='color:black' align='center' class='sucess'>Sucessfully Deleted</h2>";
}
?>

<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="orderform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>