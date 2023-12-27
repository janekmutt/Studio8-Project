<?php
    $con=mysqli_connect("localhost","root","","studio8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "CREATE TABLE IF NOT EXISTS `orderin` (
                `order_id` int(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                `ItemNo` int(20) NOT NULL,
                `product_id` text NOT NULL
                );
            ";
    mysqli_query($con,$sql);
    $sql = "ALTER TABLE `orderin` 
                DROP PRIMARY KEY,
                ADD PRIMARY KEY (
                `order_id`, 
                `ItemNo`
                );
            ";
    mysqli_query($con,$sql);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderin</title>
    <link rel="stylesheet" href="../workerpgs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
            <a href="../../index.php"><img src="../../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="orderinsearch.php" class="search-btn">
                <input type="text" name="textsearch" placeholder="Search Here!" name="q">
                <select name="from">
                    <!--<option value="5">Any</option>-->
                    <option value="1">Order ID</option>
                </select>  
                <button type="submit"><img src="../../icon/searchIcon.png"></button>
            </form> 
            
        </div>
        
        <div>
            <form class="h2text">
                <select class="h2text" name="Type" onchange="location = this.value;">
                    <option value="../orderform.php">Order</option>
                    <option value="orderinform.php" selected>Order Item</option>
                </select>
            </form>
        </div>

    <br>
    <table border="0" align='center'>
        <tr>
            <td width="100">Order ID</td>
            <td width="100">Item No</td>
            <td width="100">Product ID</td>
        </tr>
        <tr>
            <form name="OrderinInsert" action="orderinInsert.php" method="post">
            <td><input type="int" name="order_id" size="8"></td>
            <td><!--<input type="int" name="ItemNo" size="8">--></td>
            <td><input type="text" name="product_id"></td>
            <td><input name="add" type="submit" ></td>
            </form>
        </tr>
        <?php
            $r=1;
            $query = "SELECT * FROM orderin";       
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                echo "<td>" .$row["order_id"]. "</td>";
                echo "<td>" .$row["ItemNo"]. "</td>";
                echo "<td>" .$row["product_id"]. "</td>";
                echo "<form name='orderinEdit' action='orderinEdit.php' method='post'>";
                echo "<input type='hidden' name='varname' value=".$row["order_id"].">";
                echo "<input type='hidden' name='varno' value=".$row["ItemNo"].">";
                echo "<input type='hidden' name='type' value='1'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                echo "</form>";
                echo "</tr>";
                }
        ?>
    </table>
</body>
</html>