<?php
    require_once('./User.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="wrapper">
        <form action="signup.php" method="POST">
            <h1>Sign Up</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" required name="username">  <i class="bi bi-person-fill"></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" required name="email">  <i class="bi bi-envelope-fill"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required name="password"><i class="bi bi-lock-fill"></i>
            </div>

            <div class="remember-forgot">
                <label for=""><input type="checkbox">Remember me</label>
                <!--<a href="#">Forgot password?</a>-->
            </div>
            
            <button type="submit" class="btn" name="submit">Sign Up</button>

            <?php
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $user = new User($username, $email, $password);

                    $user->signUp();

                    
                }
            
            ?>

            
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Log In</a></p>
            </div>
<!--icon links <i class="bi bi-envelope-fill"></i>

-->
        </form>
    </div>
</body>
</html>