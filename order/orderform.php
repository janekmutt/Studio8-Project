<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "CREATE TABLE IF NOT EXISTS studio8.order(
    `order_id` int(11) NOT NULL,
    `customer_id` int(11) NOT NULL,
    `customer_name` varchar(64) NOT NULL,
    `employee_id` int(11) NOT NULL,
    `amount` double NOT NULL,
    `point_redeem` double NOT NULL,
    `total` float NOT NULL,
    `transaction_status` tinyint(1) NOT NULL
    );";
mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="workerpgs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
            <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="findinsearch.php" class="search-btn">
                <input type="text" name="textsearch" placeholder="Search Here!">
                <select name="from">
                    <!--<option value="5">Any</option>-->
                    <option value="1">Order ID</option>
                    <option value="2">Customer ID</option>
                    <option value="3">Customer Name</option>
                    <option value="4">Employee ID</option>
                </select>  
                <button type="submit"><img src="../icon/searchIcon.png"></button>
            </form> 
            
        </div>
        
        <div>
            <form class="h2text">
                <select class="h2text" name="Type" onchange="location = this.value;">
                    <option value="orderform.php" selected>Order</option>
                    <option value="orderin/orderinform.php">Order Item</option>
                </select>
            </form>
        </div>

    <br>
    <table border="0" align='center'>
        <tr>
            <td>Order ID</td>
            <td>Customer ID</td>
            <td>Customer Name</td>
            <td>Responsible Employee ID</td>
            <td>Amount</td>
            <td>Points</td>
            <td>Total</td>
            <td>Transaction Status</td>
        </tr>
        <tr>
            <form name="inorder" action="inorder.php" method="post">
            <td><input type="int" name="order_id" size="5"></td>
            <td><input type="int" name="customer_id" size="5"></td>
            <td><input type="text" name="customer_name"></td>
            <td><input type="int" name="employee_id"></td>
            <td><input type="float" name="amount"></td>
            <td><input type="float" name="point_redeem"></td>
            <td><input type="float" name="total"></td>
            <td align='center'><input type="checkbox" name="transaction_status"></td>
            <td><input name="add" type="submit" value="Insert"></td>
            </form>
        </tr>
        <?php
            $r=1;
            $query = "SELECT * FROM studio8.order
                GROUP BY order_id ";
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                echo "<td>" .$row["order_id"]. "</td>";
                echo "<td>" .$row["customer_id"]. "</td>";
                echo "<td>" .$row["customer_name"]. "</td>";
                echo "<td>" .$row["employee_id"]. "</td>";
                echo "<td>" .$row["amount"]. "</td>";
                echo "<td>" .$row["point_redeem"]. "</td>";
                echo "<td>" .$row["total"]. "</td>";
                echo "<td align='center'>" .$row["transaction_status"]. "</td>";
                echo "<form name='orderedit' action='orderedit.php' method='post'>";
                echo "<input type='hidden' name='varname' value=".$row["order_id"].">";
                echo "<input type='hidden' name='type' value='1'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                echo "</form>";
                echo "</tr>";
                }
        ?>
    </table>
</body>
</html>