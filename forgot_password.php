<?php
    session_start();
    include_once "User.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="wrapper">
        <form action="forgot_password.php" method="POST">
            <h1>Please enter registered email</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" required name="email">  <i class="bi bi-person-fill"></i>
            </div>
            
            <button type="submit" class="btn">Forgot Password</button>
            
            <div class="register-link">
                <p>Don't have an account? <a href="register.html">Register</a></p>
            </div>
<!--icon links <i class="bi bi-envelope-fill"></i>

-->
        </form>
        <?php
            if(isset($_POST['email']) && isset($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (empty($email) || empty($password)) {
                    return "complete registration form";
                } else {
                    $email = trim($email);
                    $password = trim($password);

                    echo User::login($email, $password);
                }

            }
        ?>
    </div>
</body>
</html>