<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once 'database.php';
include_once 'useri.php';
include_once 'validoCookie01.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new useri($connection);

    $email = $_POST['userName'];
    $password = $_POST['password'];

    if ($user->logIn($email, $password)) {
        if ($_SESSION['role'] == 'admin') {
            header("Location: Dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } 
    else {
        echo "<script>
    alert('INVALID LOGIN CREDENTIALS');
</script>";
        
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body{background-color: #19283D;}
        .btn{background-color: #0C192C;}
    </style>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../CSS/log in.css">
</head>
<body>
    <div class="wrapper">
        <form action="log in.php" method="POST" onsubmit="return validForm();"> 
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" required name="userName" id="username"
                value="<?php if(isset($_COOKIE['userName']))echo $_COOKIE['userName']; ?>">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required name="password" id="password"
                value="<?php if(isset($_COOKIE['password']))echo $_COOKIE['password']; ?>">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember" <?php if(isset($_COOKIE['userName'])) echo "checked";?>>Remember Me</label> 
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
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
