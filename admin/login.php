<?php
  session_start();
  include_once "Admin.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="main_content">
        <h1 class="title text-center">Welcome Back to 489Hotels & Suites</h1>
        <h2 class="title text-center">Login</h2>
        <form action="login.php" method="POST" class="container">
            <label for="">Enter Email:</label>
            <input type="email" class="email" name="email">
            <label for="">Enter Password:</label>
            <input type="password" name="password" class="password">
            <button type="submit" name="login" class="">Login</button>
            
            <?php
                if(isset($_POST['login'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $result = Admin::login($email, $password);
                    if($result == "incorrect password"){
                    echo "<p class='text-danger'>Wrong Password</p>";
                    }else if($result == "E-mail already exists, please choose another"){
                    echo "<p class='text-danger'>Incorrect username or password</p>";
                    }else{
                    echo "<p class='text-success'>Registration successful</p>";
                    }
                }
            ?>

        </form>
    </div>

    




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script
		src="https://code.jquery.com/jquery-3.7.0.min.js"
		integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
		crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="slick/slick.min.js"></script>    
    
    <script src="./js/script.js"></script>
    
</body>
</html>