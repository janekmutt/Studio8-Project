<?php
    $con=mysqli_connect("localhost","root","","studio8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "CREATE TABLE IF NOT EXISTS `product` (
                `product_id` int(11) PRIMARY KEY NOT NULL,
                `category_id` int(11) NOT NULL,
                `category` varchar(255) NOT NULL,
                `product_name` varchar(64) NOT NULL,
                `product_color` varchar(64) NOT NULL,
                `memory_capacity` int(11) NOT NULL,
                `in_stock` int(11) NOT NULL
                );";
    mysqli_query($con,$sql);
    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Product</title>
    <link rel="stylesheet" href="stockpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
            <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="Find_Stock.php" class="search-btn" method = "get">
                <input type="text" name="textsearch" placeholder="Search Here!" name="q">
                <select name="from">
                    <!--<option value="5">Any</option>-->
                    <option value="1">Product ID</option>
                    <option value="2">Category</option>
                    <option value="3">Category ID</option>
                    <option value="4">Name</option>
                    <option value="5">Color</option>
                    <option value="6">Space</option>
                    <option value="7">In Stock</option> 
                </select>  
                <button type="submit"><img src="../icon/searchIcon.png"></button>
            </form> 
            
        </div>
        
        <div>
            <form class="h2text">
                <select name="category_id" id="category_id" class="h2text" name="Type">
			        <option value=" " selected>All Category</option>
			        <option value="220111">Phone</option>
			        <option value="220112">Notebook/Tablet</option>
			        <option value="220113">Headphone/Watch</option>
			        <option value="220114">Gadget/Accessories</option>
                </select>
            </form>
        </div>

    <br>
    <table border="0" align='center'>
        <tr>
            <td width="100">Product ID</td>
            <td width="100">Category</td>
            <td width="100">Category ID</td>
            <td width="100">Product Name</td>
            <td width="100">Color</td>
            <td width="100">Space</td>
            <td width="100">In Stock</td>
        </tr>
        <tr>
            <form name="insertStock" action="Insert_Stock.php" method="post">
            <td><input type="int" name="product_id" size="8"></td>
            <td>
                <!-- <input type="int" name="category" size="8"> -->
                <select name="category_id" id="category_id">
			        <option value="220111" selected>Phone</option>
			        <option value="220112">Notebook/Tablet</option>
			        <option value="220113">Headphone/Watch</option>
			        <option value="220114">Gadget/Accessories</option>
                </select>
            </td>
            <td></td>
            <td><input type="text" name="name"></td>
            <td><input type="text" name="color"></td>
            <td><input type="text" name="space"></td>
            <td><input type="text" name="instock"></td>
            <td><input name="add" type="submit" ></td>
            </form>
        </tr>
        <?php
            $r=1;
            $query = "SELECT * FROM product
                    GROUP BY product_id";       
            $result = mysqli_query($con, $query);
            // echo "<tr>";
            //         echo "<td>". "product_id". "</td>";
            //         echo "<td>". "category". "</td>";
            //         echo "<td>". "category_id". "</td>";
            //         echo "<td>". "product_name". "</td>";
            //         echo "<td>". "product_color". "</td>";
            //         echo "<td>". "memory_capacity". "</td>";
            //         echo "<td>". "in_stock". "</td>";
            // echo "</tr>";
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                    echo "<td>" .$row["product_id"]. "</td>";
                    echo "<td>" .$row["category"]. "</td>";
                    echo "<td>" .$row["category_id"]. "</td>";
                    echo "<td>" .$row["product_name"]. "</td>";
                    echo "<td>" .$row["product_color"]. "</td>";
                    echo "<td>" .$row["memory_capacity"]. "</td>";
                    echo "<td>" .$row["in_stock"]. "</td>";
                    echo "<form name='editStock' action='Edit_Stock.php' method='post'>";
                    echo "<input type='hidden' name='varname' value=".$row["product_id"].">";
                    echo "<input type='hidden' name='delem' value=".$row["product_id"].">";
                    echo "<input type='hidden' name='type' value='1'>";
                    echo "<td align='center'><input name='edit' type='submit' value='Edit'></td>";//echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                //echo "<td><input name='edit' type='submit' value='Edit'></td>";
                    echo "</form>";
                echo "</tr>";
                }
        ?>
    </table>
</body>
</html>