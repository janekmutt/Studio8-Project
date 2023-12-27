<link rel="stylesheet" href="Customerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">

<h1 class="h1main">Studio8</h1>

<form class="h2select">
    <select class="h2select" name="Type">
        <option value="Customer">Customer</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//check empty
if(empty($_POST['Name']))
{
	echo "Please Input Name" ;
}
elseif(empty($_POST['Lastname']))
{
	echo "Please Input Lastname" ;
}
elseif(empty($_POST['Email']))
{
	echo "Please Input Email" ;
}
elseif(empty($_POST['Tel']))
{
	echo "Please Input Telephone number" ;
}
else{
    //esc//ape variables for security
    $CustomerID = mysqli_escape_string($con, $_POST['CustomerID']);
    $Name = mysqli_escape_string($con, $_POST['Name']);
    $Lastname = mysqli_escape_string($con, $_POST['Lastname']);
    $Email = mysqli_escape_string($con, $_POST['Email']);
    $Tel = mysqli_escape_string($con, $_POST['Tel']);
    
    $sql = "INSERT INTO customer (CustomerID,Name,Lastname,Email,Tel)
    VALUES ('$CustomerID', '$Name', '$Lastname', '$Email', '$Tel')
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
        <form name="back" method="post" action="Customer.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>