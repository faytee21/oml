<?php
    session_start();
    require_once('User.php');
    include_once("Reservation.php");
    require_once('Room.php');

    $room_id = $_GET['room_id'];
    $user_personal = User::getUserIdentity($_SESSION['id']);
    $user = User::getUser($_SESSION['id']);

    // echo $room_id;

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

        <?php 
            $room = new Room();
            $room_info = $room->getRoomById($room_id);
            // print_r($room_info);
        ?>
            <h2>Room Chosen:</h2>
            <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Room Type: <?php echo $room_info['room_type']?></h5>
                <p class="card-text">Amenities: <?php echo $room_info['amenities']?></p>
                <p class="card-text">Capacity: <?php echo $room_info['capacity']?></p>
                <p class="card-text">Price: <?php echo $room_info['price']?></p>
            </div>
        </div>
        <h2>Personal Info</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Full Name: <?php echo $user_personal['first_name']." ".$user_personal['last_name']; ?></h5>
                <p class="card-text">ID Number: <?php echo $user_personal['id_number'] ?></p>
                <p class="card-text">Email: <?php echo $user['email']; ?></p>
            </div>
        </div>

        <div class="m-3 p-2">
            <p>* I confirm that these are my personal details and of the room I picked to book</p>
            <a href="payment.php?room_id=<?php echo $room_id ?>"><button class="btn btn-mine">PROCEED TO PAYMENT</button></a>
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