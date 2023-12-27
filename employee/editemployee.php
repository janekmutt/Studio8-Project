<link rel="stylesheet" href="workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="Employeeform.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
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
            <td width='100'>Employee ID</td>
            <td width='100'>Role ID</td>
            <td width='100'>Role</td>
            <td width='100'>Name</td>
            <td width='100'>LastName</td>
            <td width='100'>Email</td>
            <td width='100'>Tel</td>
            <td width='20'>Status</td>
            </tr>";
}

$var_value = $_REQUEST['varname'];
$type_value = $_REQUEST['type'];
$delem_value = $_REQUEST['delem'];
//echo "$delem_value";

if($type_value == 1){
    $sql = "SELECT * FROM employee WHERE employee_ID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            //echo "<td></td>";
            echo "<td>" .$row["employee_ID"]. "</td>";
            echo "<td>" .$row["role_ID"]. "</td>";
            echo "<td>" .$row["role"]. "</td>";
            echo "<td>" .$row["name"]. "</td>";
            echo "<td>" .$row["lastname"]. "</td>";
            echo "<td>" .$row["email"]. "</td>";
            echo "<td>" .$row["tel"]. "</td>";
            echo "<td align='center'>" .$row["status"]. "</td>";
            echo "</tr>";
            $role = $row["role"];
            $rowstatus = $row["status"]; 
        }
    }
}elseif($type_value == 2){  
    $role = $_REQUEST['role'];
    $role_id = mysqli_escape_string($con, $_POST['role_id']);
    if($role_id == 100){
        $role = 'Owner';
    }elseif($role_id == 102){
        $role = 'Supply Manager';
    }elseif($role_id == 103){
        $role = 'Financial Manager';
    }elseif($role_id == 104){
        $role = 'Customer Service';
    }elseif($role_id == 105){
        $role = 'Employee Manager';
    }elseif($role_id == 106){
        $role = 'Employee';
    }elseif($role_id == 101){
        $role = 'Admin';
    }
    
    $name = mysqli_escape_string($con, $_POST['name']);
    $lastname = mysqli_escape_string($con, $_POST['lastname']);
    $email = mysqli_escape_string($con, $_POST['email']);
    $tel = mysqli_escape_string($con, $_POST['tel']);
    $status = mysqli_escape_string($con, isset($_POST['status']));

    $query = "UPDATE employee SET status = '$status' WHERE employee_ID='$var_value'";
    mysqli_query($con, $query);

    if(!empty($role_id)){
        $query = "UPDATE employee SET role_ID = '$role_id' WHERE employee_ID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($name)){
        $query = "UPDATE employee SET name = '$name' WHERE employee_ID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($lastname)){
        $query = "UPDATE employee SET lastname = '$lastname' WHERE employee_ID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($email)){
        $query = "UPDATE employee SET email = '$email' WHERE employee_ID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($tel)){
        $query = "UPDATE employee SET tel = '$tel' WHERE employee_ID='$var_value'";
        mysqli_query($con, $query);
    }

    $query = "UPDATE employee SET role = '$role' WHERE employee_ID='$var_value'";
    mysqli_query($con, $query);

    $sql = "SELECT * FROM employee WHERE employee_ID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            //echo "<td style='font-family: sans-serif;'>After Edit</td>";
            echo "<td>" .$row["employee_ID"]. "</td>";
            echo "<td>" .$row["role_ID"]. "</td>";
            echo "<td>" .$row["role"]. "</td>";
            echo "<td>" .$row["name"]. "</td>";
            echo "<td>" .$row["lastname"]. "</td>";
            echo "<td>" .$row["email"]. "</td>";
            echo "<td>" .$row["tel"]. "</td>";
            echo "<td align='center'>" .$row["status"]. "</td>";
            echo "</tr>";
            $rowstatus = $row["status"]; 
        }
    }

}
?>
        <tr>
            <form name="editemployee" action="editemployee.php" method="post">
                <td></td>
                <td><input type="int" name="role_id" size="8" value="" id="last"></td>
                <td><?php
                    echo "<input type='hidden' name='role' value=".$role.">";
                ?></td>
                <td><input type="text" name="name"></td>
                <td><input type="text" name="lastname"></td>
                <td><input type="text" name="email"></td>
                <td><input type="text" name="tel"></td>
                <td align='center'>
                <?php
                if($rowstatus == 1){
                    echo"<input type='checkbox' name='status' checked>";
                }else{
                    echo"<input type='checkbox' name='status'>";
                }
                ?>
                </td>
            
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
        <form name="delemployee" action="delemployee.php" method="post">
        <?php
                echo"<input type='hidden' name='delem' value=".$delem_value.">";
                echo"<input type='hidden' name='delif' value='1'>";
            ?>
            <input name="delete" type="submit" value="Delete" style="margin-top: 20px;background: rgb(153, 0, 2);color: #ffffff;">
        </form>
        <form name="back" method="post" action="Employeeform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>