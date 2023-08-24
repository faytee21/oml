<?php
    include_once './config.php';

    class Room {
        public $conn;

        public function __construct() {
            $this->conn = $GLOBALS['conn'];
        }

        public function addRoom($name, $type, $capacity, $price, $amenities){
            if ($stmt=$this->conn->prepare('INSERT INTO rooms(room_name, room_type, capacity, price, amenities) VALUES (?, ?, ?, ?, ?)')) {
                $stmt->bind_param('sssss', $name, $type, $capacity, $price, $amenities);
                $stmt->execute();
                $stmt->close();
                return true;
            } else {
                return false;
            }
        }

        public function getRooms(){
            $sql = "SELECT * FROM rooms";
            $result = $this->conn->query($sql);
            return $result;
        }
    }
    
?>