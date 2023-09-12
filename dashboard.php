<?php
    session_start();
    require_once('User.php');
    include_once("Reservation.php");
    require_once('Room.php');

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
              <?php
                    if (User::checkIfUserIdentityIsFilled($_SESSION['id'])){
                      echo "Welcome To 489Hotels & Suits";
                    } else {
                      echo "<a href='profile.php'>
                      <button class='btn btn-mine'>Complete Profile</button>
                    </a>";
                    }
                  ?>
              
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

          <div>
            <hr>
            <h2 class="text-center">Ready to book?</h2>
            <form action="dashboard.php" method="POST">
              <div class="book">
                <div>
                  <label for="">Check In:</label>
                  <input type="date" name="check_in_date">
                </div>
                <div>
                  <label for="">Check Out:</label>
                  <input type="date" name="check_out_date">
                </div>
                <div>
                  <label for="">ROom Type:</label>
                  <select name="room_type" id="">
                    <option value="" selected>Select Room Type</option>
                    <option value="standard_room">Standard Room</option>
                    <option value="deluxe_room">Deluxe Room</option>
                    <option value="suite_room">Suite Room</option>
                  </select>
                </div>
                <div>
                  <button name="book" class="">Book Now</button>
                </div>  
              </div>
            </form>
            <?php
              if (isset($_POST['book'])){
                $check_in_date = $_POST['check_in_date'];
                $check_out_date = $_POST['check_out_date'];
                $room_type = $_POST['room_type'];

                $room = new Room();
                $rooms = $room->checkListOfRooms($check_in_date, $check_out_date, $room_type);
                // print_r($rooms);


              ?>

              <div class="row">
                <!-- <div class="col-md-4"> -->
                  <?php
                    foreach($rooms as $room){
                      echo "<div class='col-md-4 room'>";
                      echo "<h3>".$room['room_type']."</h3>";
                      echo "<p>Price: Ksh. ".$room['price']."</p>";
                      echo "<p>Capacity: ".$room['capacity']."</p>";
                      echo "<p>Bed: ".$room['amenities']."</p>";
                      echo "<p>Room ID: ".$room['room_id']."</p>";
                      echo "<a href='confirm_booking_details.php?room_id=".$room['room_id']."'><button class='btn btn-mine w-100'>Book</button></a>";
                      echo "</div>";
                    }
                  ?>
                <!-- </div> -->
              </div>

              <?php
                // print_r($rooms);
              } else {
                echo "Please fill in the form to book a room";
              }

            ?>
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