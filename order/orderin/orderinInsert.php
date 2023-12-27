<link rel="stylesheet" href="../workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="orderinform.php"><img src="../../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2text">
    <select class="h2text" name="Type">
        <option value="OrderIn">Order In</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//check empty
if(empty($_POST['order_id']))
{
	echo "<h1 style='color:Black'margin:20px align='center' >Please Input Order ID" ;
}
else{
    //esc//ape variables for security
    $order_id = mysqli_escape_string($con, $_POST['order_id']);
    //$ItemNo = mysqli_escape_string($con, $_POST['ItemNo']);
    $product_id = mysqli_escape_string($con, $_POST['product_id']);

    $query = "SELECT MAX(ItemNo) AS max_address FROM orderin WHERE order_id='$order_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $ItemNo = $row['max_address'] + 1;

    $sql = "INSERT INTO orderin (order_id,ItemNo,product_id)
    VALUES ('$order_id', '$ItemNo', '$product_id')
    ";
    if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }
        echo "<h1 style='color:Black'margin:20px align='center' >Insert Success</h1>" ;
        
}
mysqli_close($con)
?>

<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="orderinform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>