<?php
    session_start();
    // include_once "Admin.php";
    include_once "includes/check_use.php";
    include_once "Room.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rooms Page || Spotfit Collections</title>
    <link rel="icon" type="image/png" href="http://localhost:3000/images/logos/rtg-favicon.png">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="dash-container">
        <?php include_once "./includes/sidenav.php"; ?>
        <div class="main_content">
            <h2 class="title">Add Room  </h2>
            <form action="add_rooms.php" method="POST" class="d-flex flex-column">
                <label for="">Room Name:</label>
                <input type="text" name="room_name" placeholder="Room name">
                <label for="">Room Type:</label>
                <select name="room_type" id="">
                    <option value="standard_room">Standard Room</option>
                    <option value="deluxe _room" >Deluxe Rooms</option>
                    <option value="suite_room">Suite Rooms</option>
                </select>
                <label for="">Capacity of the room</label>
                <input type="number" name="capacity" placeholder="Capacity of the room" min="0" max="4">
                <label for="">Room Price:</label>
                <input type="number" name="price" placeholder="Room price" min="0">
                <label for="">Room Emenities</label>
                <textarea name="amenities" id="" cols="30" rows="10"></textarea>
                <button type="submit" name="add_room">Add room</button>
                <?php
                    if(isset($_POST['add_room'])){
                        $name = $_POST['room_name'];
                        $type = $_POST['room_type'];
                        $capacity = $_POST['capacity'];
                        $price = $_POST['price'];
                        $amenities = $_POST['amenities'];
                        $room = new Room();
                        $result = $room->addRoom($name, $type, $capacity, $price, $amenities);
                        if($result){
                            echo "<script>alert('Room added successfully')</script>";
                        }else{
                            echo "<script>alert('Room not added')</script>";
                        }
                    }
                ?>
            </form>

        <div class="container">
            <table class="table table-striped">
                <tr>
                    <thead>
                        <th>#</th>
                        <th>Room name</th>
                        <th>Room Type</th>
                        <th>Room Capacity</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <tbody>
                    <?php
                    $category = new Room();
                    $rooms = $category->getRooms();

                    if($rooms){
                        while($row = mysqli_fetch_assoc($rooms)){
                            $id = $row['room_id'];
                            $name = $row['room_name'];
                            $type = $row['room_type'];
                            $capacity = $row['capacity'];
                            echo "<tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$type</td>
                                    <td>$capacity</td>
                                    <td><button class='btn btn-dark'> <i class='bi bi-pencil-square'></i> Edit</button> <button class='btn btn-danger'> <i class='bi bi-trash3'></i> Delete</button> </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='5'>No rooms added yet</td>
                            </tr>";
                    }

                    ?>

                </tbody>
            </table>
        </div>
            
        </div>        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script
		src="https://code.jquery.com/jquery-3.7.0.min.js"
		integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
		crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="slick/slick.min.js"></script>    
    
    <script src="./js/script.js"></script>
</body>
</html>