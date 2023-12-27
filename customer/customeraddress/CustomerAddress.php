<?php
    $con=mysqli_connect("localhost","root","","studio8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "CREATE TABLE IF NOT EXISTS `customeraddress` (
                `CustomerID` int(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                `AddressNo` int(20) NOT NULL,
                `CustomerAddress` text NOT NULL
                );
            ";
    mysqli_query($con,$sql);
    $sql = "ALTER TABLE `customeraddress` 
                DROP PRIMARY KEY,
                ADD PRIMARY KEY (
                `CustomerID`, 
                `AddressNo`
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
    <title>Customer Address</title>
    <link rel="stylesheet" href="../Customerpgs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
            <a href="../../index.php" target="_blank"><img src="../../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="CustomerAddresssearch.php" class="search-btn">
                <input type="text" name="textsearch" placeholder="Search Here!" name="q">
                <select name="from">
                    <!--<option value="5">Any</option>-->
                    <option value="1">CustomerID</option>
                    <option value="2">AddressNo</option>
                    <option value="3">CustomerAddress</option>
                    <!--<option value="4">Status</option>-->
                </select>  
                <button type="submit"><img src="../../icon/searchIcon.png"></button>
            </form> 
            
        </div>
        
        <div>
            <form class="h2select">
                <select class="h2select" name="Type" onchange="location = this.value;">
                    <option value="../Customer.php">Customer</option>
                    <option value="CustomerAddress.php" selected>Customer Address</option>
                </select>
            </form>
        </div>

    <br>
    <table border="0" align='center'>
        <tr>
            <td width="100">CustomerID</td>
            <td width="100">AddressNo</td>
            <td width="300">CustomerAddress</td>
        </tr>
        <tr>
            <form name="CustomerAddressInsert" action="CustomerAddressInsert.php" method="post">
            <td><input type="int" name="CustomerID" size="8"></td>
            <td><!--<input type="int" name="AddressNo" size="8">--></td>
            <td><input type="text" name="CustomerAddress" size="35"></td>
            <td><input name="add" type="submit" ></td>
            </form>
        </tr>
        <?php
            $r=1;
            $query = "SELECT * FROM customeraddress";       
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                echo "<td>" .$row["CustomerID"]. "</td>";
                echo "<td>" .$row["AddressNo"]. "</td>";
                echo "<td>" .$row["CustomerAddress"]. "</td>";
                echo "<form name='CustomerAddressEdit' action='CustomerAddressEdit.php' method='post'>";
                echo "<input type='hidden' name='varname' value=".$row["CustomerID"].">";
                echo "<input type='hidden' name='varaddress' value=".$row["AddressNo"].">";
                echo "<input type='hidden' name='type' value='1'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                echo "</form>";
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                //echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
                echo "</tr>";
                }
        ?>
    </table>
</body>
</html>