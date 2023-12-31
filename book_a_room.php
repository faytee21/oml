<?php
    session_start();
    require_once('User.php');
    // require_once('includes/check_user.php');
    include_once('Room.php');
    $room = new Room();

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
    <title>Book A Room </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
            <div>
                <h3 class="text-center">Standard Rooms</h3>
                <div class="container-fluid">
                    <div class="row room-info">
                        <div class="col-md-6">
                            <img src="./image/out1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
                            <p>Our standard rooms are equipped with a double bed. They contain a private bathroom and a spacious wardrobe</p>
                            <h4>Available amenities</h4>
                            <ul>
                                <li>Double bed</li>
                                <li>Free Wi-Fi</li>
                                <li>Air conditioning</li>
                                <li>Rain shower</li>
                                <li>Study table</li>
                                <li>Flat screen TV</li>
                                <li>Mosquito net</li>
                                <li>Spacious wardrobe</li>
                                <li>24/7 Room service</li>
                            </ul>
                            <p>Ksh. <?php echo $room->getRoomAveragePrice("standard_room"); ?></p>
                            <p>Available: <?php echo $room->getRoomTypeCount("standard_room"); ?></p>
                            <div class="d-flex justify-content-evenly">
                                <a href="standard_room.php">
                                    <button class="btn btn-warning">See  More</button>
                                </a>
                                <a href="make_reservation.php?type=standard_room">
                                  <button class="btn btn-mine">Book Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
            <div>
                <h3 class="text-center">Deluxe Rooms</h3>
                <div class="container-fluid">
                    <div class="row room-info">
                        <div class="col-md-6">
                            <img src="./image/out1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, nemo debitis. Repellat, dolorem vitae magni perspiciatis ea ipsum sunt asperiores itaque. Ea non saepe numquam molestias asperiores ullam ipsa exercitationem.</p>    
                            <p><?php echo $room->getRoomAveragePrice("deluxe _room"); ?></p>
                            <p>Available: <?php echo $room->getRoomTypeCount("deluxe _room"); ?></p>
                            <div class="d-flex justify-content-evenly">
                                <a href="standard_room.php">
                                    <button class="btn btn-warning">See  More</button>
                                </a>
                                <a href="make_reservation.php?type=deluxe _room">
                                  <button class="btn btn-mine">Book Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-center">Suits</h3>
                <div class="container-fluid">
                    <div class="row room-info">
                        <div class="col-md-6">
                            <img src="./image/out1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, nemo debitis. Repellat, dolorem vitae magni perspiciatis ea ipsum sunt asperiores itaque. Ea non saepe numquam molestias asperiores ullam ipsa exercitationem.</p>    
                            <p><?php echo $room->getRoomAveragePrice("suite_room"); ?></p>
                            <p>Available: <?php echo $room->getRoomTypeCount("suite_room"); ?></p>
                            <div class="d-flex justify-content-evenly">
                                <a href="standard_room.php">
                                    <button class="btn btn-warning">See  More</button>
                                </a>
                                <a href="make_reservation.php?type=suite_room">
                                  <button class="btn btn-mine">Book Now</button>
                                </a> 
                            </div>
                        </div>
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