<?php
    session_start();
    // include_once "Admin.php";
    include_once "includes/check_use.php";
    include_once "Brand.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page || Spotfit Collections</title>
    <link rel="icon" type="image/png" href="http://localhost:3000/images/logos/rtg-favicon.png">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="dash-container">
        <?php include_once "./includes/sidenav.php"; ?>
        <div class="main_content">

            <h2 class="title">Add Gallery Images</h2>
            <form action="add_brand.php" method="POST" class="d-flex flex-column" enctype="multipart/form-data">
                <label for="">Add Image</label>
                <input type="text" name="name" placeholder="Brand name">
                <label for="">Choose Brand Image:</label>
                <input type="file" name="brand_image" id="" accept="image/png, image/jpeg">
                <label for="">Brand Description:</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="This is info"></textarea>
                <button type="submit" name="add_brand">Add Brand</button>

                <?php
                    if(isset($_POST['add_brand'])){
                        $name = $_POST['name'];
                        $description = $_POST['description'];
                        $brand_image = $_FILES['brand_image'];
                        echo $brand_image['name'];
                        // $file = $_FILES['brand_image'];
                        $brand = new Brand();
                        $result = $brand->addBrand($name, $description, $brand_image);
                        if($result){
                            echo "<script>alert('Brand added successfully')</script>";
                        }else{
                            echo "<script>alert('Brand not added')</script>";
                        }
                    }
                ?>

            </form>

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <img src="./uploads/brands/brand1.jpg" alt="" class="img-fluid">
                        <p>Brand Id: #</p>
                        <p>Name: Brand Name</p>
                        <p>Description: Brand Description</p>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <img src="./uploads/brands/brand1.jpg" alt="" class="img-fluid">
                        <p>Brand Id: #</p>
                        <p>Name: Brand Name</p>
                        <p>Description: Brand Description</p>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <img src="./uploads/brands/brand1.jpg" alt="" class="img-fluid">
                        <p>Brand Id: #</p>
                        <p>Name: Brand Name</p>
                        <p>Description: Brand Description</p>
                    </div>
                </div>
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