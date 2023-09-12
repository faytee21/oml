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
            <h2>Payment:</h2>
            <div>
                <p class="d-inline-flex gap-1">
                    <button class="btn btn-mine" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <img src="./image/MPESA_LOGOpng" class="mpesa img-fluid w-10" alt="">
                        Pay With M-Pesa
                    </button>
                    <a href="PDF.php?room_id=<?php echo $room_id ?>"><button class="btn btn-mine">Print Receipt</button></a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="main_content">
                            <form action="">
                                <label for="">Please input mpesa number to pay</label>
                                <input type="number" placeholder="07xxxxxxxx" min="0">
                                <button class="btn btn-main">Pay</button>
                                <h3>Optionally</h3>
                                <p>You can pay using paybill</p>
                                <ol>
                                    <li>Go to mpesa</li>
                                    <li>Paybill</li>
                                    <li>Business Number: 3344334</li>
                                    <li>Account number: 112233#<?php echo $room_id?></li>
                                    <li>Enter Pin(This is your secret)</li>
                                    <li>Check Email</li>
                                </ol>
                            </form>
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