<?php
    $con=mysqli_connect("localhost","root","","studio8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "CREATE TABLE IF NOT EXISTS `employee` (
                `employee_ID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                `role_ID` int(11) NOT NULL,
                `role` text NOT NULL,
                `name` text NOT NULL,
                `lastname` text NOT NULL,
                `email` text NOT NULL,
                `tel` text NOT NULL,
                `status` tinyint(1) DEFAULT NULL
                );";
    mysqli_query($con,$sql);
    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="workerpgs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="main-box">
    <div class="box">
        <div class="navbar">
            <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="searchemployee.php" class="search-btn">
                <input type="text" name="textsearch" placeholder="Search Here!" name="q">
                <select name="from">
                    <!--<option value="5">Any</option>-->
                    <option value="1">Employee ID</option>
                    <option value="2">Role</option>
                    <option value="3">Role ID</option>
                    <option value="4">Status</option>
                </select>  
                <button type="submit"><img src="../icon/searchIcon.png"></button>
            </form> 
            
        </div>
        
        <div>
            <form class="h2text">
                <select class="h2text" name="Type">
                    <option value="Employee">Employee</option>
                </select>
            </form>
        </div>

    <br>
    <table border="0" align='center'>
        <tr>
            <td width="100">Employee ID</td>
            <td width="100">Role ID</td>
            <td width="100">Role</td>
            <td width="100">Name</td>
            <td width="100">LastName</td>
            <td width="100">Email</td>
            <td width="100">Tel</td>
            <td align='center'>Status</td>
        </tr>
        <tr>
            <form name="inemployee" action="inemployee.php" method="post">
            <td><input type="int" name="employee_id" size="8"></td>
            <td><input type="int" name="role_id" size="8" value="" id="last"></td>
            <td></td>
            <td><input type="text" name="name"></td>
            <td><input type="text" name="lastname"></td>
            <td><input type="text" name="email"></td>
            <td><input type="text" name="tel"></td>
            <td align='center'><input type="checkbox" name="status"></td>
            <td><input name="add" type="submit" ></td>
            </form>
        </tr>
        <?php
            $r=1;
            $query = "SELECT * FROM employee
                    GROUP BY employee_ID";       
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
                echo "<tr>";
                echo "<td>" .$row["employee_ID"]. "</td>";
                echo "<td>" .$row["role_ID"]. "</td>";
                echo "<td>" .$row["role"]. "</td>";
                echo "<td>" .$row["name"]. "</td>";
                echo "<td>" .$row["lastname"]. "</td>";
                echo "<td>" .$row["email"]. "</td>";
                echo "<td>" .$row["tel"]. "</td>";
                echo "<td align='center'>" .$row["status"]. "</td>";
                echo "<form name='editemployee' action='editemployee.php' method='post'>";
                echo "<input type='hidden' name='varname' value=".$row["employee_ID"].">";
                echo "<input type='hidden' name='delem' value=".$row["employee_ID"].">";
                echo "<input type='hidden' name='type' value='1'>";
                echo "<td align='center'><input name='edit' type='submit' value='Edit'></td>";
                echo "</form>";
                echo "</tr>";
                }
        ?>
    </table>
</body>
</html>