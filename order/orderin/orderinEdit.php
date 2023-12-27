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
    echo "<h2 align='center' class='h2text'>The results:</h2>
        <table border='0' align='center'>
            <tr>
                <td></td>
                <td width='75'>order_id</td>
                <td>ItemNo</td>
                <td>product_id</td>             
            </tr>";
}

$var_value = $_REQUEST['varname'];
$var_no = $_REQUEST['varno'];
$type_value = $_REQUEST['type'];
if($type_value == 1){
    $sql = "SELECT * FROM orderin WHERE order_id='$var_value' && ItemNo='$var_no'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["ItemNo"]. "</td>";
            echo "<td>" .$row["product_id"]. "</td>";
            echo "</tr>";
            $var_no = $row["ItemNo"];
        }
    }
}
elseif($type_value == 2)
{  
    //$order_id = mysqli_escape_string($con, $_POST['order_id']);
    $ItemNo = mysqli_escape_string($con, $_REQUEST['varno']);
    $product_id = mysqli_escape_string($con,$_POST['orderin']);
    if(!empty($product_id)){
        $query = "UPDATE orderin SET product_id = '$product_id' WHERE order_id='$var_value'  && ItemNo='$var_no'";
        mysqli_query($con, $query);
    }

    $sql = "SELECT * FROM orderin WHERE order_id='$var_value' && ItemNo='$var_no'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td style='font-family: sans-serif;'>After Edit</td>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["ItemNo"]. "</td>";
            echo "<td align='center'>" .$row["product_id"]. "</td>";
            echo "</tr>";
            $var_no = $row["ItemNo"];
        }
    }
}


?>
        <tr>
            <form name="orderinEdit" action="orderinEdit.php" method="post">
                <td></td>
                <td><!--<input type="int" name="order_id" size="5">--></td>
                <td><!--<input type="text" name="ItemNo" size="12">--></td>
                <td><input type="text" name="orderin"></td>            
        </tr>
    </table>

<div class="commitbar" align="center">
    <div class="commitedit-btn">
            <?php
                echo "<input type='hidden' name='varname' value=".$var_value.">";
                echo "<input type='hidden' name='varno' value=".$var_no.">";
            ?>
            <input type='hidden' name='type' value='2'>
            <input name="edit" type="submit" value="Confirm Edit" style="background: rgb(9, 148, 65);color: #ffffff;">
        </form>
        <form name="orderin" action="orderindelete.php" method="post">
            <?php
                echo "<input type='hidden' name='delcustaddress' value=".$var_value.">";
                echo "<input type='hidden' name='delvaraddress' value=".$var_no.">";

            ?>
            <input type='hidden' name='delif' value="1">
            <input name="delete" type="submit" value="Delete" style="margin-top: 20px;background: rgb(153, 0, 2);color: #ffffff;">
        </form>
        <form name="back" method="post" action="orderinform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>