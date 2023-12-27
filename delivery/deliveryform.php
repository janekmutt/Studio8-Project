<?php
    $con=mysqli_connect("localhost","root","","studio8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "CREATE TABLE IF NOT EXISTS `delivery` (
                `order_ID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                `weight` double NOT NULL,
                `d_status` tinyint(1) NOT NULL,
                `track_no` text DEFAULT NULL,
                `due_date` date NOT NULL,
                `got_date` date NOT NULL,
                `employee_ID` int(11) NOT NULL
                );";
    mysqli_query($con,$sql)
    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link rel="stylesheet" href="deliverypgs.css">
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
                    <!--<option value="4">Any</option>-->
                    <option value="1">Order ID</option>
                    <option value="2">Tracking Number</option>
                    <option value="3">Responisble Employee ID</option>
                </select>  
                <button type="submit"><img src="../icon/searchIcon.png"></button>
            </form> 
            
        </div>
        
        <div>
            <form class="h2select">
                <select class="h2select" name="Type">
                    <option value="Delivery">Delivery</option>
                </select>
            </form>
        </div>

    <br>
    <table border="0" align='center'>
        <tr class='tablefont'>
            <td width='75'>Order ID</td>
            <td width='125'>Package Weight</td>
            <td width='102'>Delivery Status</td>
            <td width='180'>Tracking Number</td>
            <td width='120'>Delivery Date</td>
            <td width='120'>Receive Date</td>
            <td width='180'>Responisble Employee ID</td>
            <td>Commit</td>
        </tr>
        <tr>
            <form name="indeliver" action="indelivery.php" method="post">
            <td><input type="int" name="order_id" size="5"></td>
            <td><input type="float" name="weight" size="12"></td>
            <td align='center'><input type="checkbox" name="d_status"></td>
            <td><input type="text" name="track_no"></td>
            <td><input type="date" name="due_date"></td>
            <td><input type="date" name="got_date"></td>
            <td><input type="number" name="employee_ID"></td>
            <td><input name="add" type="submit" value="Insert"></td>
            </form>
        </tr>
        <?php
            $r=1;
            $query = "SELECT * FROM delivery";
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                echo "<td>" .$row["order_ID"]. "</td>";
                echo "<td>" .$row["weight"]. "</td>";
                echo "<td align='center'>" .$row["d_status"]. "</td>";
                echo "<td>" .$row["track_no"]. "</td>";
                echo "<td>" .$row["due_date"]. "</td>";
                echo "<td>" .$row["got_date"]. "</td>";
                echo "<td align='center'>" .$row["employee_ID"]. "</td>";
                echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                echo "<input type='hidden' name='varname' value=".$row["order_ID"].">";
                echo "<input type='hidden' name='type' value='1'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                echo "</form>";
                echo "</tr>";
                }
        ?>
    </table>
</body>
</html>