<link rel="stylesheet" href="workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">

<h1 class="h1main">Studio8</h1>

<form class="h2text">
    <select class="h2text" name="Type">
        <option value="Employee">Employee</option>
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
            <td width='100'>Employee ID</td>
            <td width='100'>Role ID</td>
            <td width='100'>Role</td>
            <td width='100'>Name</td>
            <td width='100'>LastName</td>
            <td width='100'>Email</td>
            <td width='100'>Tel</td>
            <td width='100'>Status</td>
            </tr>";
}

$textsearch = $_GET['textsearch'];
$searchfrom = mysqli_escape_string($con, $_GET['from']);
//check empty
if(empty($_GET['textsearch'])){
	echo "<h1 align='center' style='color:black'>To search for something,</h1>" ;
    echo "<h1 align='center' style='color:black'>Please input item to search for.</h1>" ;
}elseif($searchfrom == "1"){
    $sql = "SELECT * FROM employee WHERE employee_ID='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>" .$row["employee_ID"]. "</td>";
                echo "<td>" .$row["role_ID"]. "</td>";
                echo "<td>" .$row["role"]. "</td>";
                echo "<td>" .$row["name"]. "</td>";
                echo "<td>" .$row["lastname"]. "</td>";
                echo "<td>" .$row["email"]. "</td>";
                echo "<td>" .$row["tel"]. "</td>";
                echo "<td>" .$row["status"]. "</td>";
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
                echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "2"){
    $sql = "SELECT * FROM employee WHERE role='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>" .$row["employee_ID"]. "</td>";
                echo "<td>" .$row["role_ID"]. "</td>";
                echo "<td>" .$row["role"]. "</td>";
                echo "<td>" .$row["name"]. "</td>";
                echo "<td>" .$row["lastname"]. "</td>";
                echo "<td>" .$row["email"]. "</td>";
                echo "<td>" .$row["tel"]. "</td>";
                echo "<td>" .$row["status"]. "</td>";
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
                echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "3"){
    $sql = "SELECT * FROM employee WHERE role_ID='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>" .$row["employee_ID"]. "</td>";
                echo "<td>" .$row["role_ID"]. "</td>";
                echo "<td>" .$row["role"]. "</td>";
                echo "<td>" .$row["name"]. "</td>";
                echo "<td>" .$row["lastname"]. "</td>";
                echo "<td>" .$row["email"]. "</td>";
                echo "<td>" .$row["tel"]. "</td>";
                echo "<td>" .$row["status"]. "</td>";
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
                echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "4"){
    $sql = "SELECT * FROM employee WHERE status='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>" .$row["employee_ID"]. "</td>";
                echo "<td>" .$row["role_ID"]. "</td>";
                echo "<td>" .$row["role"]. "</td>";
                echo "<td>" .$row["name"]. "</td>";
                echo "<td>" .$row["lastname"]. "</td>";
                echo "<td>" .$row["email"]. "</td>";
                echo "<td>" .$row["tel"]. "</td>";
                echo "<td>" .$row["status"]. "</td>";
                //echo "<form name='editdeliver' action='editdelivery.php' method='post'>";
                echo "<td><input name='edit' type='submit' value='Edit'></td>";
                //echo "</form>";
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
        <form name="back" method="post" action="employeeform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>