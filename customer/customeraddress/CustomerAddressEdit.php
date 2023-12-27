<link rel="stylesheet" href="../Customerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="CustomerAddress.php" target="_blank"><img src="../../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2text">
    <select class="h2text" name="Type">
        <option value="CustomerAddress">CustomerAddress</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function start_table(){
    echo "<h2 class='h2text'>The results:</h2>
        <table border='0' align='center'>
            <tr>
                <td></td>
                <td width='75'>CustomerID</td>
                <td>AddressNo</td>
                <td>CustomerAddress</td>             
            </tr>";
}

$var_value = $_REQUEST['varname'];
$var_address = $_REQUEST['varaddress'];
$type_value = $_REQUEST['type'];
if($type_value == 1){
    $sql = "SELECT * FROM customeraddress WHERE CustomerID='$var_value' && AddressNo='$var_address'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" .$row["CustomerID"]. "</td>";
            echo "<td>" .$row["AddressNo"]. "</td>";
            echo "<td>" .$row["CustomerAddress"]. "</td>";
            echo "</tr>";
        }
    }
}
elseif($type_value == 2)
{  
    //$CustomerID = mysqli_escape_string($con, $_POST['CustomerID']);
    $AddressNo = mysqli_escape_string($con, $_POST['AddressNo']);
    $CustomerAddress = mysqli_escape_string($con,$_POST['CustomerAddress']);
    if(!empty($CustomerAddress)){
        $query = "UPDATE customeraddress SET CustomerAddress = '$CustomerAddress' WHERE CustomerID='$var_value' && AddressNo='$var_address'";
        mysqli_query($con, $query);
    }

    $sql = "SELECT * FROM customeraddress WHERE CustomerID='$var_value' && AddressNo='$var_address'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td style='font-family: sans-serif;'>After Edit</td>";
            echo "<td>" .$row["CustomerID"]. "</td>";
            echo "<td>" .$row["AddressNo"]. "</td>";
            echo "<td align='center'>" .$row["CustomerAddress"]. "</td>";
            echo "</tr>";
            $var_address = $row["AddressNo"];
        }
    }
}


?>
        <tr>
            <form name="CustomerAddressEdit" action="CustomerAddressEdit.php" method="post">
                <td></td>
                <td><!--<input type="int" name="order_id" size="5">--></td>
                <td><!--<input type="text" name="AddressNo" size="12">--></td>
                <td><input type="text" name="CustomerAddress"></td>            
        </tr>
    </table>

<div class="commitbar" align="center">
    <div class="commitedit-btn">
            <?php
                echo "<input type='hidden' name='varname' value=".$var_value.">";
                echo "<input type='hidden' name='varaddress' value=".$var_address.">";
            ?>
            <input type='hidden' name='type' value='2'>
            <input name="edit" type="submit" value="Confirm Edit" style="background: rgb(9, 148, 65);color: #ffffff;">
        </form>
        <form name="CustomerAddress" action="CustomerAddressdelete.php" method="post">
            <?php
                echo "<input type='hidden' name='delcustaddress' value=".$var_value.">";
                echo "<input type='hidden' name='delvaraddress' value=".$var_address.">";

            ?>
            <input type='hidden' name='delif' value="1">
            <input name="delete" type="submit" value="Delete" style="margin-top: 20px;background: rgb(153, 0, 2);color: #ffffff;">
        </form>
        <form name="back" method="post" action="CustomerAddress.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>