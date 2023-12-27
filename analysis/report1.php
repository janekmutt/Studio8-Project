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
    <title>Customer Report</title>
    <link rel="stylesheet" href="analysis.css">
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
                    <option value="report1.php" selected>Customer Report</option>
                    <option value="Analysis2.php">Daily Report</option>
                    <option value="report3.php">Sale Report</option>
                    <option value="Report4.php">Delivered Total Report</option>
                    <option value="report5.php">Transaction Report</option>
                </select>
            </form>
        </div>

        <table border="0" align='center'>
        <tr>
            <td align='center' width="120" class = "bold">Order ID</td>
            <td align='center' width="120" class = "bold">Product ID</td>
            <td align='center' width="120" class = "bold">Customer ID</td>
            <td align='center' width="120" class = "bold">Customer Name</td>
        </tr>

    <br>
    <?php
            $r=1;
            $query = "SELECT p.product_id, oi.order_id, o.customer_id, o.customer_name
                      FROM product p, orderin oi, studio8.order o
                      WHERE p.product_id = oi.product_id
                      AND oi.order_id = o.order_id";       
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                    echo "<td align='center'>" .$row["order_id"]. "</td>";
                    echo "<td align='center'>" .$row["product_id"]. "</td>";
                    echo "<td align='center'>" .$row["customer_id"]. "</td>";
                    echo "<td align='center'>" .$row["customer_name"]. "</td>";
                    echo "</form>";
                echo "</tr>";
                }
    ?>
</body>
</html>