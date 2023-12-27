<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivered Total Report</title>
    <link rel="stylesheet" href="workerpgs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
            <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>    
        </div>
        
        <div>
            <form class="h2text">
                <select class="h2text" name="Type" onchange="location = this.value;">
                    <option value="report1.php">Customer Report</option>
                    <option value="Analysis2.php">Daily Report</option>
                    <option value="report3.php">Sale Report</option>
                    <option value="Report4.php" selected>Delivered Total Report</option>
                    <option value="report5.php">Transaction Report</option>
                </select>
            </form>
        </div>

        <table border="0" align='center'>
        <tr>
            <td align='center'width="100">Order ID</td>
            <td align='center'width="100">Delivery Date</td>
            <td align='center'width="100">Receive Date</td>
            <td align='center'width="100">Customer ID</td>
            <td align='center'width="100">Delivery Status</td>
            <td align='center'width="100">Delivered Total</td>
        </tr>

    <br>
    <?php
            $r=1;
            $query = "SELECT studio8.order.order_id, delivery.due_date ,delivery.got_date ,studio8.order.customer_id ,delivery.d_status,no_deliver
            FROM studio8.order JOIN delivery
            ON studio8.order.order_id = delivery.order_id
            JOIN (SELECT Count(studio8.order.order_id) AS no_deliver, customer_id FROM studio8.order JOIN delivery
            ON studio8.order.order_id = delivery.order_id
            WHERE d_status=1
            GROUP BY customer_id) AS `tablee`
            ON tablee.customer_id=studio8.order.customer_id
            ORDER BY order_id ASC;";       
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                echo "<td align='center'>" .$row["order_id"]. "</td>";
                echo "<td align='center'>" .$row["due_date"]. "</td>";
                echo "<td align='center'>" .$row["got_date"]. "</td>";
                echo "<td align='center'>" .$row["customer_id"]. "</td>";
                echo "<td align='center'>" .$row["d_status"]. "</td>";
                echo "<td align='center'>" .$row["no_deliver"]. "</td>";
                echo "</tr>";
                }
        ?>
</html>