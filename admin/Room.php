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

        public function getRoom($id){
            $sql = "SELECT * FROM rooms WHERE room_id = $id";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function deleteRoom($id){
            $sql = "DELETE FROM rooms WHERE room_id = $id";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function updateRoom($id, $name, $type, $capacity, $price, $amenities){
            $sql = "UPDATE rooms SET room_name = ?, room_type = ?, capacity = ?, price = ?, amenities = ? WHERE room_id = ?";
            if ($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("ssssss", $name, $type, $capacity, $price, $amenities, $id);
                $stmt->execute();
                $stmt->close();

                return "Room updated successfully";
            } else {
                return "Room not updated";
            }
        }

        public function getRoomType($type){
            $sql = "SELECT * FROM rooms WHERE room_type = '$type'";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function getRoomPrice($price){
            $sql = "SELECT * FROM rooms WHERE price = '$price'";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function getRoomAmenities($amenities){
            $sql = "SELECT * FROM rooms WHERE amenities = '$amenities'";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function getRoomTypeCount($type){
            $sql = "SELECT COUNT(*) FROM rooms WHERE room_type = '$type'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row['COUNT(*)'];
        }

    }
    
?>