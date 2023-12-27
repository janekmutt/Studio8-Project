<title>Insert Delivery</title>
<link rel="stylesheet" href="deliverypgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="deliveryform.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2select">
    <select class="h2select" name="Type">
        <option value="Delivery">Delivery</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//check empty
if(empty($_POST['weight'])){
	echo "<h2 class='h2text' align='center'>Please Input data Package Weight</h2>" ;
}elseif(empty($_POST['employee_ID'])){
	echo "<h2 class='h2text' align='center'>Please Input Employee ID</h2>" ;
}

else{
    //esc//ape variables for security
    $order_id = mysqli_escape_string($con, $_POST['order_id']);
    $weight = mysqli_escape_string($con, $_POST['weight']);
    $d_status = mysqli_escape_string($con, isset($_POST['d_status']));
    $track_no = mysqli_escape_string($con, $_POST['track_no']);
    $due_date = mysqli_escape_string($con, $_POST['due_date']);
    $got_date = mysqli_escape_string($con, $_POST['got_date']);
    $employee_ID = mysqli_escape_string($con, $_POST['employee_ID']);
    
    $sql = "INSERT INTO delivery (order_id,weight,d_status,track_no,due_date,got_date,employee_ID)
    VALUES ('$order_id', '$weight', '$d_status', '$track_no', '$due_date', '$got_date', '$employee_ID')
    ";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
        echo "<h1 class='h1text' align='center'>Success</h1>" ;
        
}
mysqli_close($con)
?>

<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="deliveryform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>