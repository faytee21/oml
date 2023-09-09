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
            // $sql = "SELECT * FROM rooms WHERE room_type = `$type`";
            // $result = $this->conn->query($sql);
            // return $result;

            if($stmt = $this->conn->prepare("SELECT * FROM rooms WHERE room_type = ?")){
                $stmt->bind_param("s", $type);
                $stmt->execute();
                $result = $stmt->get_result();
                return $result;
            }
        }

        // check if room using the room_id is available given the room checkin date and checkout date
        public function checkRoomAvailability($room_id, $check_in_date, $check_out_date){
            // Prepare the SQL query to check for overlapping reservations
            $count = 0;
            if ($stmt = $this->conn->prepare("SELECT COUNT(*) FROM reservations WHERE room_id = ? AND start_date <= ? AND end_date >= ?")) {
                $stmt->bind_param("iss", $room_id, $check_out_date, $check_in_date);
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();
            } else {
                echo "Error with SQL statement";
            }
            return $count == 0;
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