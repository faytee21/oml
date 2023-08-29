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
            <h2>Booked Rooms</h2>
            <hr>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Price</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <?php
                        $rooms = Reservation::getReservationByUserId($_SESSION['id']);
                        // foreach($rooms as $room){
                          echo $rooms['room_id'];
                        //   // echo "<td>$room['room_id']</td>";
                        // }

                        // print_r($rooms);
                        $Room = new Room();
                          $one_room = $Room->getRoomById($rooms['room_id']);
                          echo "<td>".$one_room['room_name']."</td>";
                          echo "<td>".$one_room['price']."</td>";
                          echo "
                            <button class='btn btn-mine'>Check in</button>
                          "
                      ?>
                    </tr>
                </tbody>
            </table>


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