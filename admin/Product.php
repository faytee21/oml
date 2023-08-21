<?php 

    include_once "./config.php";

    class Product {
        public $conn;

        public function __construct(){
            $this->conn = $GLOBALS['conn'];
        }

        public function addProduct($category_id, $brand_id, $name, $price, $quantity, $description, $image){
            // $sql = "INSERT INTO Products (name, description, price, category_id) VALUES ('$name', '$description', '$price', '$category_id')";
            // $result = mysqli_query($this->conn, $sql);
            $image = $this->uploadImage($image);
            if ($stmt = $this->conn->prepare('INSERT INTO Products (name, description, price, category_id, brand_id, image_url, stock_quantity) VALUES (?, ?, ?, ?, ?, ?, ?)')) {
                $stmt->bind_param('sssssss', $name, $description, $price, $category_id, $brand_id, $image, $quantity);
                $stmt->execute();
                $stmt->close();
                return true;
            } else {
                return false;
            }
        }

        public function getProducts(){
            $sql = "SELECT * FROM Products";
            $result = mysqli_query($this->conn, $sql);

            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getProductById($id){
            $sql = "SELECT * FROM Products WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function updateProduct($id, $name, $description, $price, $category_id){
            $sql = "UPDATE Products SET name = '$name', description = '$description', price = '$price', category_id = '$category_id' WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function deleteProduct($id){
            $sql = "DELETE FROM Products WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        public static function uploadImage($file){
            $image_name = $file['name'];
            $image_tmp_name = $file['tmp_name'];
            $image_size = $file['size'];
            $image_error = $file['error'];
            // $image_type = $file['type'];
    
            $image_ext = explode('.', $image_name);
            $image_actual_ext = strtolower(end($image_ext));
    
            $allowed = array('jpg', 'jpeg', 'png');
    
            if(in_array($image_actual_ext, $allowed)){
                if($image_error === 0){
                    if($image_size < 1000000){
                        $image_name_new = uniqid('', true).".".$image_actual_ext;
                        $image_destination = 'uploads/products/'.$image_name_new;
                        move_uploaded_file($image_tmp_name, $image_destination);
                        
                        
    
                        return $image_destination;
                    }else{
                        die("Your file is too big");
                        return "Your file is too big";
                    }
                }else{
                    die("There was an error uploading your file");
                    return "There was an error uploading your file";
                }
            }else{
                die("You cannot upload files of this type");
                return "You cannot upload files of this type";
            }
        }

    }

?>