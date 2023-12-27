<?php
    $con=mysqli_connect("localhost","root","","studio8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "CREATE TABLE IF NOT EXISTS `customer` (
                `CustomerID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                `Name` varchar(256) NOT NULL,
                `Lastname` varchar(256) NOT NULL,
                `Email` varchar(256) NOT NULL,
                `Tel` varchar(256) NOT NULL
                );";
    mysqli_query($con,$sql);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="Customerpgs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
            <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="Customersearch.php" class="search-btn"  style="width: 380px;">
                <input type="text" name="textsearch" placeholder="Search Here!" name="q">
                <select name="from">
                    <!--<option value="6">Any</option>-->
                    <option value="1">CustomerID</option>
                    <option value="2">Name</option>
                    <option value="3">Lastname</option>
                    <option value="4">Email</option>
                    <option value="5">Tel</option>
                </select>  
                <button type="submit"><img src="../icon/searchIcon.png"></button>
            </form> 
            
        </div>
        
        <div>
            <form class="h2select">
                <select class="h2select" name="Type" onchange="location = this.value;">
                    <option value="Customer.php" selected>Customer</option>
                    <option value="customeraddress/CustomerAddress.php">Customer Address</option>
                </select>
            </form>
        </div>

    <br>
    <table border="0" align='center'>
        <tr>
            <td width="100">CustomerID</td>
            <td width="100">Name</td>
            <td width="100">Lastname</td>
            <td width="100">Email</td>
            <td width="100">Tel</td>
        </tr>
        <tr>
            <form name="CustomerInsert" action="CustomerInsert.php" method="post">
            <td><input type="varchar" name="CustomerID" size="8"></td>
            <td><input type="varchar" name="Name" size="8"></td>
            <td><input type="varchar" name="Lastname"></td>
            <td><input type="varchar" name="Email"></td>
            <td><input type="varchar" name="Tel"></td>
            <td><input name="add" type="submit" ></td>
            </form>
        </tr>
        <?php
            $r=1;
            $query = "SELECT * FROM customer
                    GROUP BY CustomerID";       
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                echo "<td>" .$row["CustomerID"]. "</td>";
                echo "<td>" .$row["Name"]. "</td>";
                echo "<td>" .$row["Lastname"]. "</td>";
                echo "<td>" .$row["Email"]. "</td>";
                echo "<td>" .$row["Tel"]. "</td>";
                echo "<form name='CustomerEdit' action='CustomerEdit.php' method='post'>";
                echo "<input type='hidden' name='varname' value=".$row["CustomerID"].">";
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