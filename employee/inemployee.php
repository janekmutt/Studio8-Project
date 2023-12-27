<link rel="stylesheet" href="workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">

<h1 class="h1main">Studio8</h1>

<!--<form class="h2text">
    <select class="h2text" name="Type">
        <option value="Employee">Employee</option>
    </select>
</form>-->

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//check empty
if(empty($_POST['role_id'])){
	echo "Please Input role ID" ;
}elseif(empty($_POST['name'])){
	echo "Please Input Name" ;
}elseif(empty($_POST['lastname'])){
	echo "Please Input Lastname" ;
}elseif(empty($_POST['email'])){
	echo "Please Input Email" ;
}elseif(empty($_POST['tel'])){
	echo "Please Input Telephone number" ;
}

else{
    //esc//ape variables for security
    $employee_id = mysqli_escape_string($con, $_POST['employee_id']);
    $role_id = mysqli_escape_string($con, $_POST['role_id']);
    if($role_id == 100){
        $role = 'Owner';
    /*}elseif($role_id == 101){
        $role = 'Admin';*/
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
    
    $sql = "INSERT INTO employee (employee_ID,role_ID,role,name,lastname,email,tel,status)
    VALUES ('$employee_id', '$role_id','$role', '$name', '$lastname', '$email', '$tel', '$status')
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
        <form name="back" method="post" action="employeeform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>