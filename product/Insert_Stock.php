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

//check empty
if(empty($_POST['product_id'])){
	echo "Please Input Product ID" ;
// }elseif(empty($_POST['category'])){
// 	echo "Please Input Category" ;
}elseif(empty($_POST['category_id'])){
 	echo "Please Input Category ID" ;
}elseif(empty($_POST['name'])){
	echo "Please Input Name of Product" ;
}elseif(empty($_POST['color'])){
	echo "Please Input Color of Product" ;
}elseif(empty($_POST['space'])){
	echo "Please Input Memory Capacity" ;
}elseif(empty($_POST['instock'])){
	echo "Please Input In Stock" ;
}

else{
    //esc//ape variables for security
    $product_id = mysqli_escape_string($con, $_POST['product_id']);
    // $category = mysqli_escape_string($con, $_POST['category']);
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
    $name = mysqli_escape_string($con, $_POST['name']);
    $color = mysqli_escape_string($con, $_POST['color']);
    $space = mysqli_escape_string($con, $_POST['space']);
    $instock = mysqli_escape_string($con, $_POST['instock']);
    
    $sql = "INSERT INTO product (product_id,category_id,product_name,product_color,memory_capacity,in_stock,category)
    VALUES ('$product_id', '$category_id', '$name', '$color', '$space', '$instock', '$category')
    ";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
        echo "<h1 style='color:Black'margin:20px align='center' >Insert Success</h1>" ;
        
}
mysqli_close($con)
?>

<div class="commitbar" align="center">
    <div class="commitedit-btn" align="center" style="width: 64px;">
        <form name="back" method="post" action="Form_Stock.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>