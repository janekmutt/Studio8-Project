<link rel="stylesheet" href="stockpage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">

<h1 class="h1main">Studio8</h1>

<form class="h2text">
    <select name="category_id" id="category_id" class="h2text" name="Type">
			        <option value=" " selected>All Category</option>
			        <option value="220111">Phone</option>
			        <option value="220112">Notebook/Tablet</option>
			        <option value="220113">Headphone/Watch</option>
			        <option value="220114">Gadget/Accessories</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function start_table(){
    echo "<h2 align='center' class='h2text'>The results</h2>
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

// $textsearch = $_GET['textsearch'];
isset( $_GET['textsearch'] ) ? $textsearch = $_GET['textsearch'] : $textsearch = "";
// $searchfrom = mysqli_escape_string($con, $_GET['from']);
isset( $_GET['from'] ) ? $searchfrom = mysqli_escape_string($con, $_GET['from']) : $searchfrom = "";
//check empty
if(empty($_GET['textsearch'])){
	echo "<h1 align='center' style='color:black'>To search for something,</h1>" ;
    echo "<h1 align='center' style='color:black'>Please input item to search for.</h1>" ;
}elseif($searchfrom == "1"){
    $sql = "SELECT * FROM product WHERE product_id='$textsearch' ";
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
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "2"){
    $sql = "SELECT * FROM product WHERE category='$textsearch' ";
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
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "3"){
    $sql = "SELECT * FROM product WHERE category_id='$textsearch' ";
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
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "4"){
    $sql = "SELECT * FROM product WHERE name='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
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
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "5"){
    $sql = "SELECT * FROM product WHERE color='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
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
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "6"){
    $sql = "SELECT * FROM product WHERE Space='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
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
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "7"){
    $sql = "SELECT * FROM product WHERE instock='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
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
    }else{
        echo "<h2>No results found.</h2>";
    }
}
?>
</table><br>
<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="Form_Stock.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>