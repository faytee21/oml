<?php
    include_once "./config.php";

    class Brand {
        public $conn;

        public function __construct(){
            $this->conn = $GLOBALS['conn'];
        }

        public function addBrand($name, $description, $brand_image){
            $brand_image = $this->uploadImage($brand_image);
            // $sql = "INSERT INTO Brands (name, description, image_url) VALUES ('$name', '$description', '$brand_image')";
            // $result = mysqli_query($this->conn, $sql);
            if ($stmt = $this->conn->prepare('INSERT INTO Brands (name, description, image_url) VALUES (?, ?, ?)')) {
                $stmt->bind_param('sss', $name, $description, $brand_image);
                $stmt->execute();
                $stmt->close();
                return true;
            } else {
                return false;
            }

        }

        public function getBrands(){
            $sql = "SELECT * FROM Brands";
            $result = mysqli_query($this->conn, $sql);

            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getBrandById($id){
            $sql = "SELECT * FROM Brands WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function updateBrand($id, $name, $description, $brand_image){
            $sql = "UPDATE Brands SET name = '$name', description = '$description', brand_image = '$brand_image' WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function deleteBrand($id, $image_name){
            $sql = "DELETE FROM Brands WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);
            if ($stmt=$this->conn->prepare('DELETE FROM Brands WHERE id = ?')) {
                $stmt->execute();
                $stmt->close();
                if (file_exists($image_name)) {
                    unlink($image_name);
                }
                return true;
            } else {
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
                        $image_destination = 'uploads/brands/'.$image_name_new;
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