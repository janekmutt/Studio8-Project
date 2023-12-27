<link rel="stylesheet" href="../Customerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">

<h1 class="h1main">Studio8</h1>

<form class="h2text">
    <select class="h2text" name="Type">
        <option value="CustomerAddress">CustomerAddress</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//check empty
if(empty($_POST['CustomerID']))
{
	echo "Please Input CustomerID" ;
}
elseif(empty($_POST['CustomerAddress']))
{
	echo "Please Input Customer Address" ;
}
else{
    //esc//ape variables for security
    $CustomerID = mysqli_escape_string($con, $_POST['CustomerID']);
    //$AddressNo = mysqli_escape_string($con, $_POST['AddressNo']);
    $CustomerAddress = mysqli_escape_string($con, $_POST['CustomerAddress']);

    $query = "SELECT MAX(AddressNo) AS max_address FROM customeraddress WHERE CustomerID='$CustomerID'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $AddressNo = $row['max_address'] + 1;

    $sql = "INSERT INTO customeraddress (CustomerID,AddressNo,CustomerAddress)
    VALUES ('$CustomerID', '$AddressNo', '$CustomerAddress')
    ";
    if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }
        echo "Insert Success" ;
        
}
mysqli_close($con)
?>

<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="CustomerAddress.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>