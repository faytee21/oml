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
    <title>Dashboard</title>

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
          <h2>Welcome <span class="name"><?php echo User::getNamebyId($_SESSION['id']) ?></span>!</h2>
          <div class="row">
            <h3>Your Profile</h3>
            <hr>
            <div class="col-md-6">
              <img src="./image/profile_image.png" class="img-fluid profile-image" alt="">
              <?php
              $info = User::getUser($_SESSION['id']);
              ?>
              <h4>Name: <?php             
              // print_r($info);
              echo $info["username"]; ?></h4>
              <p>Email: <?php echo $info["email"] ?></p>
              <a href="">
                <button class="btn btn-mine">Complete Profile</button>
              </a>
              
            </div>
            <div class="col-md-6">
              <h3>Reservation</h3>
              <hr>
              <div>
              <?php 
            if (!Reservation::checkUserReservation($_SESSION['id'])){    
            ?>
                <p>You haven't Booked a room yet?</p>
                <a href="book_a_room.php">
                  <button class="btn btn-mine">Book Here</button>
                s</a>
              <?php  
             }else{
              ?>
                <p>You have booked a room</p>
                <a href="view_reservation.php">
                  <button class="btn btn-mine">View Reservation</button>
                </a>
                <?php
                  $reservation_info = Reservation::getReservationByUserId($_SESSION['id']);

                
                ?>

                <p class="text-success">Start day:<?php echo $reservation_info['start_date']; ?> </p>
                <p class="text-danger">End day:<?php echo $reservation_info['end_date']; ?> </p>
              <?php
             }
              ?>

              </div>
              
            </div>
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