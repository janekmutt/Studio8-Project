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

function start_table(){
    echo "<h2 align='center' class='h2text'>The results:</h2>
        <table border='0' align='center'>
            <tr>
                <td width='75'>Order ID</td>
                <td>Customer ID</td>
                <td>Customer Name</td>
                <td>Responsible Employee ID</td>
                <td>Amount</td>
                <td>Points</td>
                <td>Total</td>
                <td>Transaction Status</td>
            </tr>";
}

$textsearch = mysqli_escape_string($con, $_GET['textsearch']);
$searchfrom = mysqli_escape_string($con, $_GET['from']);
//check empty
if(empty($_GET['textsearch'])){
	echo "<h1 style='color:Black'margin:20px align='center' >To search for something, Please input item to search for.</h1>" ;
}elseif($searchfrom == "1"){
    $sql = "SELECT * FROM studio8.order WHERE order_id='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            echo "<form name='orderedit' action='orderinEdit.php' method='post'>";
            echo "<input type='hidden' name='varname' value=".$row["order_id"].">";
            echo "<input type='hidden' name='type' value='1'>";
            echo "<td><input name='edit' type='submit' value='Edit'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2 align='center'>No results found.</h2>";
    }
}elseif($searchfrom == "2"){
    $sql = "SELECT * FROM studio8.order WHERE customer_id='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            echo "<form name='orderedit' action='orderinEdit.php' method='post'>";
            echo "<input type='hidden' name='varname' value=".$row["order_id"].">";
            echo "<input type='hidden' name='type' value='1'>";
            echo "<td><input name='edit' type='submit' value='Edit'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2 align='center'>No results found.</h2>";
    }
}elseif($searchfrom == "3"){
    $sql = "SELECT * FROM studio8.order WHERE customer_name='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            echo "<form name='orderedit' action='orderinEdit.php' method='post'>";
            echo "<input type='hidden' name='varname' value=".$row["order_id"].">";
            echo "<input type='hidden' name='type' value='1'>";
            echo "<td><input name='edit' type='submit' value='Edit'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2 align='center'>No results found.</h2>";
    }
}elseif($searchfrom == "4"){
    $sql = "SELECT * FROM studio8.order WHERE employee_id = '$textsearch'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            echo "<form name='orderedit' action='orderinEdit.php' method='post'>";
            echo "<input type='hidden' name='varname' value=".$row["order_id"].">";
            echo "<input type='hidden' name='type' value='1'>";
            echo "<td><input name='edit' type='submit' value='Edit'></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2 align='center'>No results found.</h2>";
    }
}
?>
</table><br>
<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="orderform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>