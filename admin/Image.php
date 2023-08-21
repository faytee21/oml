<?php

include_once './config.php';

class Image {
    public $conn;

    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function uploadImage($file, $admin_id){
        $image_name = $file['name'];
        $image_tmp_name = $file['tmp_name'];
        $image_size = $file['size'];
        $image_type = $file['type'];
        $image_error = $file['error'];
        // $image_type = $file['type'];

        $image_ext = explode('.', $image_name);
        $image_actual_ext = strtolower(end($image_ext));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($image_actual_ext, $allowed)){
            if($image_error === 0){
                if($image_size < 1000000){
                    $image_name_new = uniqid('', true).".".$image_actual_ext;
                    $image_destination = 'uploads/'.$image_name_new;
                                        
                    if (move_uploaded_file($image_tmp_name, $image_destination)){
                        if ($stmt=$this->conn->prepare('INSERT INTO admin_images(admin_id, image_name, image_type, image_size, image_url) VALUES (?, ?, ?, ?, ?)')) {
                            $stmt->bind_param('sssss', $admin_id, $image_name_new, $image_type, $image_size, $image_destination);
                            $stmt->execute();
                            $stmt->close();
                            return true;
                        } else {
                            return false;
                        }
                    }
                    

                    // return $image_destination;
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