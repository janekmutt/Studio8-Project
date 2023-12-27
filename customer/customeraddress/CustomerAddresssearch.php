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

function start_table(){
    echo "<h2 align='center' class='h2text'>The results</h2>
        <table border='0' align='center'>
            <tr>
            <td width='100'>CustomerID</td>
            <td width='100'>AddressNo</td>
            <td width='100'>CustomerAddress</td>
            </tr>";
}

$textsearch = $_GET['textsearch'];
$searchfrom = mysqli_escape_string($con, $_GET['from']);
//check empty
if(empty($_GET['textsearch'])){
	echo "<h1 class='h1text'>To search for something, Please input item to search for.</h1>" ;
}elseif($searchfrom == "1"){
    $sql = "SELECT * FROM customeraddress WHERE CustomerID='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>" .$row["CustomerID"]. "</td>";
                echo "<td>" .$row["AddressNo"]. "</td>";
                echo "<td>" .$row["CustomerAddress"]. "</td>";
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                //echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
                echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "2"){
    $sql = "SELECT * FROM customeraddress WHERE role='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["CustomerID"]. "</td>";
            echo "<td>" .$row["AddressNo"]. "</td>";
            echo "<td>" .$row["CustomerAddress"]. "</td>";       
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                //echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
                echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "3"){
    $sql = "SELECT * FROM customeraddress WHERE role_ID='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["CustomerID"]. "</td>";
            echo "<td>" .$row["AddressNo"]. "</td>";
            echo "<td>" .$row["CustomerAddress"]. "</td>";  
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                //echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
                echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "4"){
    $sql = "SELECT * FROM customeraddress WHERE status='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["CustomerID"]. "</td>";
            echo "<td>" .$row["AddressNo"]. "</td>";
            echo "<td>" .$row["CustomerAddress"]. "</td>";  
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                //echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
                echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}
?>
</table><br>
<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="CustomerAddress.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>