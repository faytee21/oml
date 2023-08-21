<?php

    session_start();
    // include_once "Admin.php";
    include_once "includes/check_use.php";
    include_once "Product.php";
    include_once "Brand.php";
    include_once "Category.php";

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
            <h2 class="title">Add Product</h2>
            <p></p>

            <form action="add_product.php" method="POST" class="d-flex flex-column" enctype="multipart/form-data">
                <label for="">Choose Category</label>
                <select name="category_id" id="">
                    <?php
                    $category = new Category();
                    $result = $category->getCategories();
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='".$row['category_id']."'>".$row['name']."</option>";
                        }
                    }
                    ?>
                    <!-- <option value="">Select Category</option> -->
                </select>
                <label for="">Choose Brand</label>
                <select name="brand_id" id="">
                    <?php
                    $brand = new Brand();
                    $result = $brand->getBrands();
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='".$row['brand_id']."'>".$row['name']."</option>";
                        }
                    }

                    ?>
                    <!-- <option value="">Select Brand</option> -->
                </select>
                <label for="">Name of Product:</label>
                <input type="text" name="name" placeholder="Product name">
                <label for="">Price of the Product:</label>
                <input type="number" name="price"  placeholder="product Price" min="0">
                <label for="">Quantity of the Product in stock:</label>
                <input type="number" name="quantity" placeholder="product Quantity" min="0">
                <label for="">Choose an image for the product:</label>
                <input type="file" name="image" placeholder="product Image" accept="image/png, image/jpeg">
                <label for="">Product Description:</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Product Description"></textarea>
                <button type="submit" name="add_product">Add Product</button>

                <?php
                    if(isset($_POST['add_product'])){
                        $category_id = $_POST['category_id'];
                        $brand_id = $_POST['brand_id'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $quantity = $_POST['quantity'];
                        $description = $_POST['description'];
                        $image = $_FILES['image'];

                        $product = new Product();
                        $result = $product->addProduct($category_id, $brand_id, $name, $price, $quantity, $description, $image);

                        if($result){
                            echo "<script>alert('Product added successfully')</script>";
                        }else{
                            echo "<script>alert('Failed to add product')</script>";
                        }
                    }
                ?>
            </form>

            <div class="products container">
                <!-- <img src="./illustrations/empty.svg" alt="" class="img-fluid"> -->
                <div class="row">
                    <?php
                    $product = new Product();
                    $category = new Category();
                    $brand = new Brand();
                    $results = $product->getProducts();

                    if($results){
                        while($row = mysqli_fetch_assoc($results)){
                            $id = $row['product_id'];
                            $name = $row['name'];
                            $image_url = $row['image_url'];
                            $description = $row['description'];
                            echo "<div class='col-md-4'>
                                    <img src='$image_url' alt='' class='img-fluid'>
                                    <h3>$name</h3>
                                    <p>$description</p>
                                </div>";
                        }
                    }

                    ?>
                    <div class="col-md-4">
                        <img src="admin" alt="">
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