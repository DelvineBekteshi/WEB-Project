<?php
session_start();
include_once 'database.php';
include_once 'useri.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $db=new Database();
    $connection==$db->getConnection();
    $user=new Useri($connection);

    $email=$_POST['userName'];
    $password=$_POST['password'];

    if($user->logIn($email,$password)){
        header("Location:home page.php");
        exit;
    } else{
        echo "INVALID LOGIN CREDENTIALS";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="log in.css">
</head>
<body>
    <div class="wrapper">
        <form action="log in.php" method="POST" onsubmit="return validForm();"> 
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" required name="userName" id="username">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required name="password" id="password">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label> 
                <a href="#">Forgot Password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.html">Register</a></p>
            </div>
        </form> 
    </div>

    <script>
        function validateEmail() {
            let uname = document.getElementById("username").value;
            var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return regex.test(uname);
        }

        function validatePassword() {
            let password = document.getElementById("password").value;
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
            return regex.test(password);
        }

        function validForm() {
            if (validateEmail() && validatePassword()) {
                return true;
            } else {
                alert("Email or Password is incorrect!");
                if (!validatePassword()) {
                    alert("Password must contain at least one uppercase letter, one lowercase letter, one digit, and be longer than 8 characters.");
                }
                return false;
            }
        }
    </script>
</body>
</html>
