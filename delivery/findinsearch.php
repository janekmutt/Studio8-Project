<title>Search Delivery</title>
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

function start_table(){
    echo "<h2 class='h2select'>The results:</h2>
        <table border='0' align='center'>
            <tr class='tablefont'>
                <td width='75'>Order ID</td>
                <td width='125'>Package Weight</td>
                <td width='102'>Delivery Status</td>
                <td width='180'>Tracking Number</td>
                <td width='120'>Delivery Date</td>
                <td width='120'>Receive Date</td>
                <td width='180'>Responisble Employee ID</td>
                <td>Edit Page</td>
            </tr>";
}

$textsearch = mysqli_escape_string($con, $_GET['textsearch']);
$searchfrom = mysqli_escape_string($con, $_GET['from']);
//check empty
if(empty($_GET['textsearch'])){
	echo "<h1 class='h1text' align='center'>To search for something, Please input item to search for.</h1>" ;
}elseif($searchfrom == "1"){
    $sql = "SELECT * FROM delivery WHERE order_ID='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
            echo "<input type='hidden' name='varname' value=".$row["order_ID"].">";
            echo "<input type='hidden' name='type' value='1'>";
            echo "<td><input name='edit' type='submit' value='Edit'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2 class='h2text' align='center'>No results found.</h2>";
    }
}elseif($searchfrom == "2"){
    $sql = "SELECT * FROM delivery WHERE track_no='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
            echo "<input type='hidden' name='varname' value=".$row["order_ID"].">";
            echo "<input type='hidden' name='type' value='1'>";
            echo "<td><input name='edit' type='submit' value='Edit'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2 class='h2text' align='center'>No results found.</h2>";
    }
}elseif($searchfrom == "3"){
    $sql = "SELECT * FROM delivery WHERE employee_ID='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
            echo "<input type='hidden' name='varname' value=".$row["order_ID"].">";
            echo "<input type='hidden' name='type' value='1'>";
            echo "<td><input name='edit' type='submit' value='Edit'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2 class='h2text' align='center'>No results found.</h2>";
    }
}elseif($searchfrom == "4"){
    $sql = "SELECT * FROM delivery WHERE * LIKE '%$textsearch%'";
    $result = mysqli_query($con, $sql);
    echo $result;
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
            echo "<input type='hidden' name='varname' value=".$row["order_ID"].">";
            echo "<input type='hidden' name='type' value='1'>";
            echo "<td><input name='edit' type='submit' value='Edit'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2 class='h2text' align='center'>No results found.</h2>";
    }
}
?>
</table><br>
<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="deliveryform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>