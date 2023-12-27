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
    <title>Daily Report</title>
    <link rel="stylesheet" href="Customerpgs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
        <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>    
        </div>
        
        <div>
            <form class="h2select">
                <select class="h2select" name="Type" onchange="location = this.value;">
                    <option value="report1.php">Customer Report</option>
                    <option value="Analysis2.php" selected>Daily Report</option>
                    <option value="report3.php">Sale Report</option>
                    <option value="Report4.php">Delivered Total Report</option>
                    <option value="report5.php">Transaction Report</option>
                </select>
            </form>
        </div>

        <table border="0" align='center'>
        <tr>
            <td align='center' width="120" class = "bold">Product ID</td>
            <td align='center' width="120" class = "bold">Order ID</td>
            <td align='center' width="120" class = "bold">Quanity</td>
            <td align='center' width="120" class = "bold">In stock</td>
            <td align='center' width="120" class = "bold">Employee ID</td>
        </tr>

    <br>
    <?php
            $r=1;
            $query = "SELECT product.product_id, studio8.order.order_id, product.in_stock,employee.employee_ID,COUNT(orderin.product_id) AS Quanity 
            FROM product 
            JOIN orderin on orderin.product_id = product.product_id 
            JOIN studio8.order on studio8.order.order_id = orderin.order_id 
            JOIN employee on studio8.order.employee_id = employee.employee_ID 
            ORDER BY COUNT(orderin.product_id) DESC;";     
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                    echo "<td align='center'>" .$row["product_id"]. "</td>";
                    echo "<td align='center'>" .$row["order_id"]. "</td>";
                    echo "<td align='center'>" .$row["Quanity"]. "</td>";
                    echo "<td align='center'>" .$row["in_stock"]. "</td>";
                    echo "<td align='center'>" .$row["employee_ID"]. "</td>";
                    echo "</form>";
                echo "</tr>";
                }
    ?>
</body>
</html>