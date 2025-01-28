<?php
include_once 'database.php';
include_once 'useri.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new useri($connection);
    

    $email = $_POST['userName']; 
    $password = $_POST['password'];
    $role = $_POST['role'] ?? 'user';
    
    if ($user->register($email, $password)) {
        header("Location: log in.php");
        exit;
    } else {
        echo "ERROR REGISTERING USER!";
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
    <title>Register Form</title>
    <link rel="stylesheet" href="register.css">
</head> 
<body>
    <div class="wrapper">
        <h1>Register</h1>
        <form action="register.php" method="POST" onsubmit="return validForm();">   
            <div class="input-box">
                <input type="email" placeholder="Email" name="userName" required id="username">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required id="password">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="register-link">
                <p>Already have an account? <a href="log in.php">Login</a></p>
            </div>
        </form>
    </div>

    <script>
        function validateEmail() {
            const uname = document.getElementById("username").value;
            const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return regex.test(uname);
        }

        function validatePassword() {
            const password = document.getElementById("password").value;
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
            return regex.test(password);
        }

        function validForm() {
            if (validateEmail() && validatePassword()) {
                return true;
            } else {
                alert("Email or Password is incorrect!");
                if (!validatePassword()) {
                    alert("Password must contain at least one uppercase letter, one lowercase letter, one digit, and be at least 8 characters long.");
                }
                return false;
            }
        }
    </script>
</body>
</html>
