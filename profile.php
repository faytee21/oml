<?php
    session_start();
    require_once('User.php');
    include_once("Reservation.php");

    // User::sessionInfo();

    //check is session is valid
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/dash.css">

</head>
<body>

  <?php
    include_once "includes/dash_nav.php"; 
  ?>

  <main class="container-fluid">
      <div class="row">
        <?php
          include_once "includes/sidenav.php";
        ?>
        <div class="col-md-10">
            <?php 
                // User::sessionInfo();
                $user = User::getUser($_SESSION['id']);
                // print_r($user);
            ?>
            <h2>Profile</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                  <img src="./image/profile_image.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                 <p><b>Your username:</b> <?php echo $user["username"];?></p>
                 <p><b>Your email: </b><?php echo $user["email"]; ?></p>
                </div>
            </div>

            <div class="main_content">
              <h2 class="text-center">Complete Profile here</h2>
              <form action="">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
                <input type="number" class="" placeholder="ID NUMBER">
                <input type="text" placeholder="Phone Number">
              </form>
            </div>


        </div>
      </div>
  </main>

  <div class="floating-button-container">
    <button class="floating-button"><i class="bi bi-headset"></i>Get Support here</button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    
</body>
</html>