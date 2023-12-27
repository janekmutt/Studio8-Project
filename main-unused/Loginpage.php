<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<html>
<head>
        <title>Login Page</title>
        <link rel="stylesheet" href="logincss.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
<div class="navbar">
            <a href="../index.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
        </div>
<div class="main-box">
        <div class="box">
        <h1 class="headtext">Login</h1> 
<form method="post">
        <h2 class="h2text">Username</h2>
        <input class="userpassin" type="text" id="User" name="Username" placeholder ="Type your username">
        <br>
        <h2 class="h2text">Password</h2>
       <input class="userpassin" type="password" id="id_password" name="Password" placeholder ="Type your password">

       <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
        <a class="forget" href="#"><p class="forget" >Forgot Password?</p></a><br><br> 
</form>
<script>
     const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) 
  {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});   
</script>

        <div class="login-box">
        <a class="logbutton" href="#"><h1 class="loginWord">Login</h1></a> <!--แก้เป็น button submit!!! -->
        
        </div>



        </div>
</div>
</body>


</html>