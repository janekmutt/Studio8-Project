<link rel="stylesheet" href="stockpage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="Form_Stock.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<!--<form class="h2text">
    <select class="h2text" name="Type">
        <option value="Delivery">Delivery</option>
    </select>
</form>-->

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function start_table(){
    echo "<h2 align='center' class='h2text'>EDIT</h2>
        <table border='0' align='center'>
            <tr>
            <td width='100'>Product ID</td>
            <td width='100'>Category</td>
            <td width='100'>Category ID</td>
            <td width='100'>Name</td>
            <td width='100'>Color</td>
            <td width='100'>Space</td>
            <td width='100'>In Stock</td>
            </tr>";
}

$var_value = $_REQUEST['varname'];
$type_value = $_REQUEST['type'];
$delem_value = $_REQUEST['delem'];
//echo "$delem_value";

if($type_value == 1){
    $sql = "SELECT * FROM product WHERE product_id='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["product_id"]. "</td>";
            echo "<td>" .$row["category"]. "</td>";
            echo "<td>" .$row["category_id"]. "</td>";
            echo "<td>" .$row["product_name"]. "</td>";
            echo "<td>" .$row["product_color"]. "</td>";
            echo "<td>" .$row["memory_capacity"]. "</td>";
            echo "<td>" .$row["in_stock"]. "</td>";
            echo "</tr>";
            $category = $row["category"];
        }
    }
}elseif($type_value == 2){  
    $category = $_REQUEST['category'];
    $category_id = mysqli_escape_string($con, $_POST['category_id']);
    if($category_id == 220111){
        $category = 'Phone';
    }elseif($category_id  == 220112){
        $category = 'Notebook/Tablet';
    }elseif($category_id  == 220113){
        $category = 'Headphone/Watch';
    }elseif($category_id  == 220114){
        $category = 'Gadget/Accessories';
    }
    $query = "UPDATE product SET category = '$category' WHERE product_id='$var_value'";
    mysqli_query($con, $query);
    $name = mysqli_escape_string($con, $_POST['name']);
    $color = mysqli_escape_string($con, $_POST['color']);
    $space = mysqli_escape_string($con, $_POST['space']);
    $instock = mysqli_escape_string($con, $_POST['instock']);

    if(!empty($category_id)){
        $query = "UPDATE product SET category_id = '$category_id' WHERE product_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($name)){
        $query = "UPDATE product SET name = '$name' WHERE product_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($color)){
        $query = "UPDATE product SET color = '$color' WHERE product_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($space)){
        $query = "UPDATE product SET space = '$space' WHERE product_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($instock)){
        $query = "UPDATE product SET instock = '$instock' WHERE product_id='$var_value'";
        mysqli_query($con, $query);
    }

    $sql = "SELECT * FROM product WHERE product_id='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["product_id"]. "</td>";
            echo "<td>" .$row["category"]. "</td>";
            echo "<td>" .$row["category_id"]. "</td>";
            echo "<td>" .$row["product_name"]. "</td>";
            echo "<td>" .$row["product_color"]. "</td>";
            echo "<td>" .$row["memory_capacity"]. "</td>";
            echo "<td>" .$row["in_stock"]. "</td>";
            echo "</tr>";
        }
    }

}
?>
        <tr>
            <form name="editStock" action="Edit_Stock.php" method="post">
                <td></td>
                <td><?php
                    echo "<input type='hidden' name='category' value=".$category.">";
                ?></td>
                <td><input type="int" name="category_id" size="8" value="" id="last"></td>
                <td><input type="text" name="name"></td>
                <td><input type="text" name="color"></td>
                <td><input type="text" name="space"></td>
                <td><input type="text" name="instock"></td>
            
        </tr>
    </table>
<div class="commitbar" align="center">
    <div class="commitedit-btn">
            <?php
                echo "<input type='hidden' name='varname' value=".$var_value.">";
                echo"<input type='hidden' name='delem' value=".$delem_value.">";

            ?>
            <input type='hidden' name='type' value='2'>
            <input name="edit" type="submit" value="Confirm Edit" style="background: rgb(9, 148, 65);color: #ffffff;">
        </form>
        <form name="deleteStock" action="Delete_Stock.php" method="post">
        <?php
                echo"<input type='hidden' name='delem' value=".$delem_value.">";
                echo"<input type='hidden' name='delif' value='1'>";
            ?>
            <input name="delete" type="submit" value="Delete" style="margin-top: 20px;background: rgb(153, 0, 2);color: #ffffff;">
        </form>
        <form name="back" method="post" action="Form_Stock.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>