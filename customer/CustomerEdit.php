<link rel="stylesheet" href="Customerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="Customer.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2select">
    <select class="h2select" name="Type">
        <option value="Customer">Customer</option>
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
                <td width='85'>CustomerID</td>
                <td width='100'>Name</td>
                <td width='100'>Lastname</td>
                <td width='100'>Email</td>
                <td width='100'>Tel</td>
            </tr>";
}

$var_value = $_REQUEST['varname'];
$type_value = $_REQUEST['type'];

if($type_value == 1){
    $sql = "SELECT * FROM customer WHERE CustomerID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" .$row["CustomerID"]. "</td>";
            echo "<td>" .$row["Name"]. "</td>";
            echo "<td>" .$row["Lastname"]. "</td>";
            echo "<td>" .$row["Email"]. "</td>";
            echo "<td>" .$row["Tel"]. "</td>";
            /*echo "<td align='center'>" .$row["employee_ID"]. "</td>";*/
            echo "</tr>";
        }
    }
}
elseif($type_value == 2)
{  
    //$CustomerID = mysqli_escape_string($con, $_POST['CustomerID']);
    $Name = mysqli_escape_string($con, $_POST['Name']);
    $Lastname = mysqli_escape_string($con,$_POST['Lastname']);
    $Email = mysqli_escape_string($con, $_POST['Email']);
    $Tel = mysqli_escape_string($con, $_POST['Tel']);

    if(!empty($Name)){
        $query = "UPDATE customer SET Name = '$Name' WHERE CustomerID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($Lastname)){
        $query = "UPDATE customer SET Lastname= '$Lastname' WHERE CustomerID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($Email)){
        $query = "UPDATE customer SET Email = '$Email' WHERE CustomerID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($Tel)){
        $query = "UPDATE customer SET Tel = '$Tel' WHERE CustomerID='$var_value'";
        mysqli_query($con, $query);
    }

    $sql = "SELECT * FROM customer WHERE CustomerID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td style='font-family: sans-serif;'>After Edit</td>";
            echo "<td>" .$row["CustomerID"]. "</td>";
            echo "<td>" .$row["Name"]. "</td>";
            echo "<td>" .$row["Lastname"]. "</td>";
            echo "<td>" .$row["Email"]. "</td>";
            echo "<td>" .$row["Tel"]. "</td>";
            echo "</tr>";
        }
    }
}


?>
        <tr>
            <form name="CustomerEdit" action="CustomerEdit.php" method="post">
                <td></td>
                <td><!--<input type="int" name="order_id" size="5">--></td>
                <td><input type="text" name="Name" size="12"></td>
                <td><input type="text" name="Lastname"></td>
                <td><input type="text" name="Email"></td>
                <td><input type="text" name="Tel"></td>
                <!--<td><input type="number" name="employee_ID"></td>-->
            
        </tr>
    </table>

<div class="commitbar" align="center">
    <div class="commitedit-btn">
            <?php
                echo "<input type='hidden' name='varname' value=".$var_value.">";
            ?>
            <input type='hidden' name='type' value='2'>
            <input name="edit" type="submit" value="Confirm Edit" style="background: rgb(9, 148, 65);color: #ffffff;">
        </form>
        <form name="Customer" action="CustomerDelete.php" method="post">
            <?php
                echo "<input type='hidden' name='delcust' value=".$var_value.">";
            ?>
            <input type='hidden' name='delif' value="1">
            <input name="delete" type="submit" value="Delete" style="margin-top: 20px;background: rgb(153, 0, 2);color: #ffffff;">
        </form>
        <form name="back" method="post" action="Customer.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>