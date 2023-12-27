<link rel="stylesheet" href="workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="orderform.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2text">
    <select class="h2text" name="Type">
        <option value="Order">Order</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//check empty
if(empty($_POST['order_id'])){
	echo "<h1 style='color:Black'margin:20px align='center' >Please Input data Order ID" ;
}elseif(empty($_POST['customer_id'])){
	echo "<h1 style='color:Black'margin:20px align='center' >Please Input data Customer ID" ;
}elseif(empty($_POST['amount'])){
	echo "<h1 style='color:Black'margin:20px align='center' >Please Input data Amount" ;
}elseif(empty($_POST['total'])){
	echo "<h1 style='color:Black'margin:20px align='center' >Please Input data Total Price" ;
}elseif(empty($_POST['transaction_status'])){
	echo "<h1 style='color:Black'margin:20px align='center' >Please Input data Transaction_Status" ;
}else{
	//esc//ape variables for security
	$order_id = mysqli_escape_string($con, $_POST['order_id']);
	$customer_id = mysqli_escape_string($con, $_POST['customer_id']);
	$customer_name = mysqli_escape_string($con, $_POST['customer_name']);
    $employee_id = mysqli_escape_string($con, $_POST['employee_id']);
	$amount = mysqli_escape_string($con, $_POST['amount']);
	$point_redeem = mysqli_escape_string($con, $_POST['point_redeem']);
    $total = mysqli_escape_string($con, $_POST['total']);
    $transaction_status = mysqli_escape_string($con, isset($_POST['transaction_status']));

	$sql="INSERT INTO studio8.order (order_id, customer_id, customer_name, employee_id, amount, point_redeem, total, transaction_status)
	VALUES ('$order_id', '$customer_id', '$customer_name', '$employee_id', '$amount', '$point_redeem', '$total', '$transaction_status')";
	if (!mysqli_query($con,$sql)) {
	    die('Error: ' . mysqli_error($con));
	    }
	    echo "<h1 style='color:Black'margin:20px align='center' >Insert Success</h1>" ;
}	

mysqli_close($con)
?>

<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="orderform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>
