<title>Edit Delivery</title>
<link rel="stylesheet" href="deliverypgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="deliveryform.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2select">
    <select class="h2select" name="Type">
        <option value="Delivery">Delivery</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function start_table(){
    echo "<h2 class='h2select'>Edit Entrie:</h2>
        <table border='0' align='center'>
            <tr class='tablefont'>
                <td></td>
                <td width='75'>Order ID</td>
                <td width='125'>Package Weight</td>
                <td width='102'>Delivery Status</td>
                <td width='180'>Tracking Number</td>
                <td width='120'>Delivery Date</td>
                <td width='120'>Receive Date</td>
                <td width='180'>Responisble Employee ID</td>
            </tr>";
}

$var_value = $_REQUEST['varname'];
$type_value = $_REQUEST['type'];

if($type_value == 1){
    $sql = "SELECT * FROM delivery WHERE order_ID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "</tr>";
            $rowstatus = $row["d_status"];
            $rowduedate = $row["due_date"];
            $rowgotdate = $row["got_date"];
        }
        editinput($rowstatus,$rowduedate,$rowgotdate);
        editbar($var_value);
    }else{
        echo "Error. No match order id.";
    }
    
}elseif($type_value == 2){  
    //$order_id = mysqli_escape_string($con, $_POST['order_id']);
    $weight = mysqli_escape_string($con, $_POST['weight']);
    $d_status = mysqli_escape_string($con, isset($_POST['d_status']));
    $track_no = mysqli_escape_string($con, $_POST['track_no']);
    $due_date = mysqli_escape_string($con, $_POST['due_date']);
    $got_date = mysqli_escape_string($con, $_POST['got_date']);
    $employee_ID = mysqli_escape_string($con, $_POST['employee_ID']);

    $query = "UPDATE delivery SET d_status = '$d_status',due_date = '$due_date',got_date = '$got_date' WHERE order_ID='$var_value'";
    mysqli_query($con, $query);

    if(!empty($weight)){
        $query = "UPDATE delivery SET weight = '$weight' WHERE order_ID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($track_no)){
        $query = "UPDATE delivery SET track_no = '$track_no' WHERE order_ID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($employee_ID)){
        $query = "UPDATE delivery SET employee_ID = '$employee_ID' WHERE order_ID='$var_value'";
        mysqli_query($con, $query);
    }

    $sql = "SELECT * FROM delivery WHERE order_ID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td style='font-family: sans-serif;'>After Edit</td>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "</tr>";
            $rowstatus = $row["d_status"];
            $rowduedate = $row["due_date"];
            $rowgotdate = $row["got_date"];
        }
        editinput($rowstatus,$rowduedate,$rowgotdate);
    }
    editbar($var_value);
}elseif($type_value == 3){
    $sql = "SELECT * FROM delivery WHERE order_ID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "</tr>";
        }
    }
    echo "<h1 class='h1text' align='center'>Are you sure you want to delete this entire?</h1>
        <div class='commitbar' align='center'>
            <div class='commitedit-btn' style='width: 210px;'>
                <form name='deldeliver' action='deldelivery.php' method='post'>
                    <input type='hidden' name='deldeli' value=".$var_value.">
                    <input type='hidden' name='delif' value='1'>
                    <input name='delete' type='submit' value='Confirm Delete' style='background: rgb(153, 0, 2);color: #ffffff;'>
                </form>
                <form name='back' method='post' action='editdelivery.php'>
                    <input type='hidden' name='varname' value=".$var_value.">
                    <input type='hidden' name='type' value='1'>
                    <input name='reset' type='submit' id='Cancel' value='Cancel'>
                </form>
                
            </div>
        </div>
    ";
}

function editinput($rowstatus,$rowduedate,$rowgotdate){
    echo "<tr>
            <form name='editdeliver' action='editdelivery.php' method='post'>
                <td></td>
                <td><!--<input type='int' name='order_id' size='5'>--></td>
                <td><input type='float' name='weight' size='12' placeholder='no change'></td>
                <td align='center'>
                ";
                if($rowstatus == 1){
                    echo"<input type='checkbox' name='d_status' checked>";
                }else{
                    echo"<input type='checkbox' name='d_status'>";
                }
                echo "</td><td><input type='text' name='track_no' placeholder='no change'></td>
                <td><input type='date' name='due_date' value='$rowduedate'></td>
                <td><input type='date' name='got_date' value='$rowgotdate'></td>
                <td><input type='number' name='employee_ID' placeholder='no change'></td>
          </tr>
        </table>";
}

function editbar($var_value){
    echo "<div class='commitbar' align='center'>
            <div class='commitedit-btn'>
                    <input type='hidden' name='varname' value=".$var_value.">
                    <input type='hidden' name='type' value='2'>
                    <input name='edit' type='submit' value='Confirm Edit' style='background: rgb(9, 148, 65);color: #ffffff;'>
                </form>
                <form name='deldeliver' action='editdelivery.php' method='post'>
                    <input type='hidden' name='varname' value=".$var_value.">
                    <input type='hidden' name='type' value='3'>
                    <input name='delete' type='submit' value='Delete' style='margin-top: 20px;background: rgb(153, 0, 2);color: #ffffff;'>
                </form>
                <form name='back' method='post' action='deliveryform.php'>
                    <input name='reset' type='submit' id='Back' value='Back' style='margin-top: 20px;'>
                </form>
                
            </div>
        </div>
    ";
}
?>