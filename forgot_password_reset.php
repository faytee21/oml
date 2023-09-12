<?php
    session_start();
    include_once "User.php";
    include_once "Mail.php";

    if(isset($_GET['reset_token'])){
        $reset_token = $_GET['reset_token'];
    }
    if (isset($_GET['userid'])) {
        $user_id = $_GET['userid'];
    }
    // $reset_token = $_GET['reset_token'];
    // $user_id = $_GET['userid'];

    // echo $reset_token;
    // echo $user_id;

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
        <form action="forgot_password_reset.php?reset_token=<?php echo $reset_token ?>&userid=<?php echo $user_id ?>" method="POST">
            <h1>Please Enter New Password</h1>
            <div class="input-box">
                <input type="password" placeholder="Enter New Password" required name="password">  <i class="bi bi-eye-fill"></i>
            </div>
            
            <button type="submit" class="btn">Forgot Password</button>
            
            <div class="register-link">
                <p>Don't have an account? <a href="register.html">Register</a></p>
            </div>
            <?php
            if(isset($_POST['password'])){
                $password = $_POST['password'];

                if (empty($password)) {
                    return "Please enter new password";
                } else {
                    $password = trim($password);

                    $info = User::resetPassword($user_id, $password);

                    if($info == true){
                        $mail = new Mail(true);

                        $email = User::getUserEmail($user_id);

                        $mail->passwordChange($email);
                        header("Location: login.php?message=Password reset successful");
                        exit;

                    } else {
                        echo "Something went wrong";
                    }
                }

            }
        ?>
        </form>
    </div>
</body>
</html>