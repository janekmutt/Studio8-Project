<link rel="stylesheet" href="../workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="orderinform.php"><img src="../../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2text">
    <select class="h2text" name="Type">
    <option value="OrderIn">Order In</option>
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
            <td width='100'>Order ID</td>
            <td width='100'>ItemNo</td>
            <td width='100'>Product ID</td>
            </tr>";
}

$textsearch = $_GET['textsearch'];
$searchfrom = mysqli_escape_string($con, $_GET['from']);
//check empty
if(empty($_GET['textsearch'])){
	echo "<h1 align='center' class='h1text'>To search for something, Please input item to search for.</h1>" ;
}elseif($searchfrom == "1"){
    $sql = "SELECT * FROM orderin WHERE order_id='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>" .$row["order_id"]. "</td>";
                echo "<td>" .$row["ItemNo"]. "</td>";
                echo "<td>" .$row["product_id"]. "</td>";
                echo "<form name='orderedit' action='orderinEdit.php' method='post'>";
                echo "<input type='hidden' name='varname' value=".$row["order_id"].">";
                echo "<input type='hidden' name='type' value='1'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                echo "</form>";
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
        <form name="back" method="post" action="orderinform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>