<?php

    include_once './config.php';

    class Room {
        public $conn;

        public function __construct() {
            $this->conn = $GLOBALS['conn'];
        }

        public function getRoom($id){
            $sql = "SELECT * FROM rooms WHERE room_id = $id";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
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

        //get room by id
        public function getRoomById($id){
            $sql = "SELECT * FROM rooms WHERE room_id = $id";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function getRoomAmenities($amenities){
            $sql = "SELECT * FROM rooms WHERE amenities = '$amenities'";
            $result = $this->conn->query($sql);
            return $result;
        }

        // get rooms of a specific type
        public function getRooms($type){
            $sql = "SELECT * FROM rooms WHERE room_type = '$type'";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function getRoomTypeCount($type){
            $sql = "SELECT COUNT(*) FROM rooms WHERE room_type = '$type'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row['COUNT(*)'];
        }

        // get average to 2 decimal places and return as string
        public function getRoomAveragePrice($type){
            $sql = "SELECT AVG(price) FROM rooms WHERE room_type = '$type'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return number_format((float)$row['AVG(price)'], 2, '.', '');
        }

    }
    
?>