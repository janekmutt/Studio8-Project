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
    <title>Transaction Report</title>
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
                    <option value="report3.php">Sale Report</option>
                    <option value="Report4.php">Delivered Total Report</option>
                    <option value="report5.php" selected>Transaction Report</option>
                </select>
            </form>
        </div>
        <div name="box2">
            <table border="0" align='center'>
            <tr>
                <td align='center'width="150">Order ID</td>
                <td align='center'width="150">Customer ID</td>
                <td align='center'width="150">Paid</td>
                <td align='center'width="150">Approve by</td>
            </tr>
            <?php
                    $r=1;
                    $query = "SELECT * FROM studio8.order
                    ORDER BY transaction_status DESC,order_id";       
                    $result = mysqli_query($con, $query);
                    foreach( $result as $row ) {
                        $r++;
                        echo "<tr>";
                        echo "<td align='center'>" .$row["order_id"]. "</td>";
                        echo "<td align='center'>" .$row["customer_id"]. "</td>";
                        echo "<td align='center'>" .$row["transaction_status"]. "</td>";
                        echo "<td align='center'>" .$row["employee_id"]. "</td>";
                        echo "</tr>";
                        }
                ?>
            </table>
        </div>
    <div class="commitbar" align="center">
        <div class="commitedit-btn" align="center" style="width: 64px;">
            <form name="back" method="post" action="../MAINanalysis.php">
                <input name="reset" type="submit" id="Back" value="Back">
            </form>
        </div>
    </div>
</html>