<?php
    include_once "./config.php";

    class Category {
        public $conn;

        public function __construct(){
            $this->conn = $GLOBALS['conn'];
        }

        public function addCategory($name, $description){
            $sql = "INSERT INTO Categories (name, description) VALUES ('$name', '$description')";
            $result = mysqli_query($this->conn, $sql);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function getCategories(){
            $sql = "SELECT * FROM Categories";
            $result = mysqli_query($this->conn, $sql);

            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getCategoryById($id){
            $sql = "SELECT * FROM Categories WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function updateCategory($id, $name, $description){
            $sql = "UPDATE Categories SET name = '$name', description = '$description' WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function deleteCategory($id){
            $sql = "DELETE FROM Categories WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function getName($id) {
            $sql = "SELECT name FROM Categories WHERE category_id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return false;
            }
        }
    }

?>