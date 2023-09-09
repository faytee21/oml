<?php
    session_start();
    require_once('User.php');
    require_once('Room.php');

    // User::sessionInfo();

    //check is session is valid
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit;
    }

    $Room = new Room();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standard Room</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="./css/dash.css">

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark" aria-label="Ninth navbar example">
    <div class="container-xl">
      <a class="navbar-brand" href="#">489Hotels & Suits</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07XL">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Book a room</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>

        </ul>
        <!-- Example split danger button -->
        <div class="btn-group">
          <button type="button" class="btn btn-danger">
            <img src="./image/profile_image.png" class="profile-img" alt="">Profile
          </button>
          <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </div>

      </div>
    </div>
  </nav>

  <main class="container-fluid">
      <div class="row">
        <?php
          include_once "includes/sidenav.php";
        ?>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6">
              <img src="./image/out1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
              <h2>Standard Room</h2>
              <p>Standard Rooms available: <?php echo $Room->getRoomTypeCount("standard_room"); ?> </p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
              <p>Ksh 2000</p>
              <a href="">
                  <button class="btn btn-mine">Book Now</button>
              </a>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <!-- <div class="rooms"> -->
              <?php 
                $rooms = $Room->getRooms("standard_room");
                // print_r($rooms);
                foreach ($rooms as $room) {
                  ?>
                  <div class="rooms_present col-md-3 m-2">
                    <p><b>Room ID:</b> <p><?php echo $room['room_id'];?><i class="bi bi-clipboard" id=""></i></p></p><span class="tt"></span>
                    <p><b>Room Name:</b> <?php echo $room['room_name'];?></p>
                    <p><b>Room Type:</b> <?php echo $room['room_type'];?> </p>
                    <p><b>Room Amenities:</b> <?php echo $room['amenities'];?> </p>
                  </div>
                <?php 
                }
              ?>
              <!-- </div> -->
            </div>
          </div>
          <div class="main_content">
            <form action="standard_room.php" method="POST">
              <h2 class="text-center">Check Availability</h2>
              <label for="">Paste Room Id Here</label>
              <input type="number" name="room_id" min="0" placeholder="Paste Room ID here">


              <label for="">Check In Date</label>
              <input type="date" id="datePicker" name="check_in_date" id="">
              <label for="">Check Out Date</label>
              <input type="date" id="datePicker2" name="check_out_date" id="">
              <input type="submit" class="btn btn-mine" value="Check Availability">
                <?php
                  if(isset($_POST['room_id']) && isset($_POST['check_in_date']) && isset($_POST['check_out_date'])){
                    $room_id = $_POST['room_id'];
                    $check_in_date = $_POST['check_in_date'];
                    $check_out_date = $_POST['check_out_date'];

                    $room = new Room();
                    $room->checkRoomAvailability($room_id, $check_in_date, $check_out_date);

                    if ($room->checkRoomAvailability($room_id, $check_in_date, $check_out_date) == true){
                      echo "<script>alert('Room is available')</script>";
                    } else {
                      echo "<script>alert('Room is not available')</script>";
                    }

                  }
                ?>
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

    <!-- jquery for slick -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="./js/date.js"></script>

  <script>
    //copy room id to clipboard
    $(document).ready(function(){
      $('.bi-clipboard').click(function(){
        var room_id = $(this).parent().text();
        console.log(room_id);
        // alert(room_id);
        navigator.clipboard.writeText(room_id);
        $(this).css('color', 'green');
        // $(this).next().text('Copied to clipboard');
        // $(this).next().fadeIn(1000).text('Copied to clipboard').fadeOut(2000);
        $(".tt").html("<p class='tip'> <i class='bi bi-check-circle-fill'></i> Copied to clipboard</p>").fadeIn(1000).fadeOut(2000);
      });
    });
  </script>
    
</body>
</html>