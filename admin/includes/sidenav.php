<?php

// require_once './User.php';
//     if(!isset($_SESSION['id'])){
//         header("Location: ../index.php");
//     }
?>
        <div class="side_nav">
            <ul>
                <li><a href="dashboard.php"><i class="bi bi-house"></i> Home</a></li>
                <li><a href="add_rooms.php"><i class="bi bi-card-image"></i> Add Rooms</a></li>
                <li><a href="add_product.php"><i class="bi bi-card-image"></i> Add Product</a></li>
                <li><a href="add_reservations.php"><i class="bi bi-droplet"></i> All Reservations</a></li>
                <?php //if (User::isAdmin($_SESSION['id'])){ ?>
                    <li><a href="add_gallery_images.php"><i class="bi bi-person-add"></i> Add Gallery Images</a></li>
                    <?php 
                //} 
                ?>
                <li><a href="./logout.php"> <i class="bi bi-door-open"></i> Logout</a></li>
                
            </ul>
        </div>