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
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User Type</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="MAINtransaction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="mainbg">
        <div class="navbar">
            <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <?php
                $customer_id = 0;
                if(!empty($_REQUEST['customer_id'])){
                    $customer_id = $_REQUEST['customer_id'];
                }
                if($customer_id == 0){
                    echo "  
                        <form action='MAINtransaction.php' class='customer-btn'>
                            <input type='text 'name='customer_id' placeholder='Input Customer ID'>
                            <button type='submit'><img src='../icon/SignIcon.png'></button>
                        </form>
                    ";
                }else{
                    $r=1;
                    $sql = "SELECT * FROM customer WHERE CustomerID='$customer_id';";
                    $result = mysqli_query($con, $sql);
                    echo "<div class='displaycustomer'>";
                    echo "<table border='0' align='center'>";
                    echo "<tr>";
                    echo "<td><h2 class='h2text'><pre>Welcome, </pre></h2></td>";
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<td width='20'><h2 class='h2text'><pre> ".$row["Name"]. "</pre></h2></td>";
                    }
                    echo "<td width='20'><h2 class='h2text'><pre>($customer_id)</pre></h2></td>";
                    echo "</tr>";
                    echo "</table>
                        <form action='MAINtransaction.php'>
                            <input type='hidden' name='customer_id' value='0'>
                            <button><img src='../icon/SignIcon.png'></button>
                        </form>
                    ";
                    echo "</div>";
                }
            ?>
        </div>
        <div class='home-container1'>
        <?php
            $query = "SELECT * FROM product GROUP BY product_id";       
            $result = mysqli_query($con, $query);
            foreach ($result as $row) {
            echo "<div class='table-row'>";
            
            echo "<table>";
            echo "<tr>";
            echo "<td size='30'>" .$row["product_id"]. "</td>";
            echo "<td size='80'>" .$row["category"]. "</td>";
            echo "<td size='80'>" .$row["category_id"]. "</td>";
            echo "<td size='80'>" .$row["product_name"]. "</td>";
            echo "<td size='80'>" .$row["product_color"]. "</td>";
            echo "<td size='80'>" .$row["memory_capacity"]. "</td>";
            echo "<td size='80'>" .$row["in_stock"]. "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
            }
        ?>
        </div>

        <div class="home-container2">
            <div class="home-container3">
            <?php
                if($customer_id == 0){
                    echo "";
                }else{
                    $r=1;
                    $query = "SELECT * FROM customer WHERE CustomerID='$customer_id';";      
                    $result = mysqli_query($con, $query);
                    foreach( $result as $row ) {
                        $r++;
                        echo "<tr>";
                        echo "<td>" .$row["CustomerID"]. "</td>";
                        echo "<td>" .$row["Name"]. "</td>";
                        echo "<td>" .$row["Lastname"]. "</td>";
                        echo "<td>" .$row["Email"]. "</td>";
                        echo "<td>" .$row["Tel"]. "</td>";
                        echo "</tr>";
                        echo "</table>
                    ";
                    }
                }
            ?>
            </div>
            <div class="home-container4">
                <table>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>