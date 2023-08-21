<?php
    session_start();
    // include_once "Admin.php";
    include_once "includes/check_use.php";
    include_once "Category.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category Page || Spotfit Collections</title>
    <link rel="icon" type="image/png" href="http://localhost:3000/images/logos/rtg-favicon.png">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="dash-container">
        <?php include_once "./includes/sidenav.php"; ?>
        <div class="main_content">
            <h2 class="title">Add Category</h2>
            <form action="add_category.php" method="POST" class="d-flex flex-column">
                <label for="">Category Name:</label>
                <input type="text" name="name" placeholder="Category name">
                <label for="">Category Description</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="This is info"></textarea>
                <button type="submit" name="add_category">Add Category</button>
                <?php
                    if(isset($_POST['add_category'])){
                        $name = $_POST['name'];
                        $description = $_POST['description'];
                        $category = new Category();
                        $result = $category->addCategory($name, $description);
                        if($result){
                            echo "<script>alert('Category added successfully')</script>";
                        }else{
                            echo "<script>alert('Category not added')</script>";
                        }
                    }
                ?>
            </form>

        <div class="container">
            <table class="table table-striped">
                <tr>
                    <thead>
                        <th>#</th>
                        <th>name</th>
                        <th>description</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <tbody>
                    <?php
                    $category = new Category();
                    $cats = $category->getCategories();

                    if($cats){
                        while($row = mysqli_fetch_assoc($cats)){
                            $id = $row['category_id'];
                            $name = $row['name'];
                            $description = $row['description'];
                            echo "<tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$description</td>
                                    <td><button class='btn btn-dark'> <i class='bi bi-pencil-square'></i> Edit</button> <button class='btn btn-danger'> <i class='bi bi-trash3'></i> Delete</button> </td>
                                </tr>";
                        }
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