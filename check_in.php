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
          <div class="main_content">
            <div class="row">
              <div class="col-md-6">
                <h1>Check In</h1>
                <?php
                    if (User::checkIfUserIdentityIsFilled($_SESSION['id'])){
                      echo "Welcome";
                    } else {
                      echo "<script>alert('Complete your first')</script> <a href='profile.php'><button class='btn btn-mine'>Complete your profile</button></a>";
                      exit;
                    }
                  ?>
                <form action="">
                  <input type="text" name="reservation_id" id="" placeholder="Enter Reservation ID">
                  <?php
                    $rooms = Reservation::getReservationByUserId($_SESSION['id']);
                    // print_r($rooms);
                    $Room = new Room();
                    $one_room = $Room->getRoomById($rooms['room_id']);

                    echo $one_room['room_name'];
                    
                    // print_r($one_room);
                  ?>

                </form>
              </div>
                            
            </div>
            <!-- <input type="radio" name="check_in" id="" value="physical">Physical Check In
            <input type="radio" name="check_in" id="" value="online">Online Check In -->
          </div>
                  <div class="radio">
                    <div class="radio-group">
                      <label class="radio-button">
                        <input type="radio" name="option" value="option1"> Option 1
                      </label>
                      <label class="radio-button">
                        <input type="radio" name="option" value="option2"> Option 2
                      </label>
                      <label class="radio-button">
                        <input type="radio" name="option" value="option3"> Option 3
                      </label>
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