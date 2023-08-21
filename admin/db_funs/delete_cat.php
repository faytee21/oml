<?php
    include_once "../Category.php";

    $id = $_GET['catId'];

    $category = new Category();
    if ($category) {
        $category->deleteCategory($id);
        echo "<script>alert('Category added successfully')</script>";
    }

?>