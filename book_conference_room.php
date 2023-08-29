<?php
    session_start();
    require_once('User.php');
    require_once('ConferenceRoom.php');
    include_once("Reservation.php");

    // User::sessionInfo();

    //check is session is valid
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit;
    }
    $conference_room = new ConferenceRoom();

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
            <h2>Available Conference Rooms</h2>

            <?php
                //display all conference rooms
                $rooms = $conference_room->getConferenceRooms();
                print_r($rooms);

                foreach($rooms as $room){
                    echo "<div class='card mb-3'>";
                    echo "<div class='row g-0'>";
                    echo "<div class='col-md-4'>";
                    echo "<img src='./image/room.jpg' class='img-fluid rounded-start' alt='...'>";
                    echo "</div>";
                    echo "<div class='col-md-8'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$room['name']}</h5>";
                    echo "<p class='card-text'>{$room['description']}</p>";
                    echo "<p class='card-text'><small class='text-muted'>{$room['capacity']} people</small></p>";
                    echo "<a href='book_conference_room.php?id={$room['id']}' class='btn btn-mine'>Book</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>

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