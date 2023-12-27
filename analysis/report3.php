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
    <title>Sale Report</title>
    <link rel="stylesheet" href="workerpgs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
            <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>    
        </div>
        
        <div name="box1">
            <form class="h2text">
                <select class="h2text" name="Type" onchange="location = this.value;">
                    <option value="report1.php">Customer Report</option>
                    <option value="Analysis2.php">Daily Report</option>
                    <option value="report3.php" selected>Sale Report</option>
                    <option value="Report4.php">Delivered Total Report</option>
                    <option value="report5.php">Transaction Report</option>
                </select>
            </form>
        </div>

        <table border="0" align='center'>
        <tr>
            <td align='center'width="150">Product ID</td>
            <td align='center'width="200">Product name</td>
            <td align='center'width="150">color</td>
            <td align='center'width="150">Space</td>
            <td align='center'width="150">Quantity</td>
        </tr>

    <br>
    <?php
            $r=1;
            $query = "SELECT orderin.product_id, product.product_name ,product.product_color ,product.memory_capacity ,COUNT(orderin.product_id) AS Quanity
            FROM orderin
            JOIN product ON orderin.product_id = product.product_id
            GROUP BY product_id
            ORDER BY COUNT(orderin.product_id) DESC";       
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                echo "<td align='center'>" .$row["product_id"]. "</td>";
                echo "<td align='center'>" .$row["product_name"]. "</td>";
                echo "<td align='center'>" .$row["product_color"]. "</td>";
                echo "<td align='center'>" .$row["memory_capacity"]. "</td>";
                echo "<td align='center'>" .$row["Quanity"]. "</td>";
                echo "</tr>";
                }
        ?>
        </table>
    <div class="commitbar" align="center">
        <div class="commitedit-btn" align="center" style="width: 64px;">
            <form name="back" method="post" action="../MAINanalysis.php">
                <input name="reset" type="submit" id="Back" value="Back">
            </form>
        </div>
    </div>
</html>