<?php
    include_once './config.php';

    class ConferenceRoom {
        public $conn;

        public function __construct() {
            $this->conn = $GLOBALS['conn'];
        }

        public function addConferenceRoom($name, $capacity, $price, $description){
            if ($stmt=$this->conn->prepare('INSERT INTO conference_rooms(conference_room_name, capacity, price, description) VALUES (?, ?, ?, ?)')) {
                $stmt->bind_param('ssss', $name, $capacity, $price, $description);
                $stmt->execute();
                $stmt->close();
                return true;
            } else {
                return false;
            }
        }

        public function getConferenceRooms(){
            $sql = "SELECT * FROM conference_rooms";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function getConferenceRoom($id){
            $sql = "SELECT * FROM conference_rooms WHERE conference_room_id = $id";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function deleteConferenceRoom($id){
            $sql = "DELETE FROM conference_rooms WHERE conference_room_id = $id";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function updateConferenceRoom($id, $name, $capacity, $price, $description){
            $sql = "UPDATE conference_rooms SET conference_room_name = ?, capacity = ?, price = ?, description = ? WHERE conference_room_id = ?";
            if ($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("sssss", $name, $capacity, $price, $description, $id);
                $stmt->execute();
                $stmt->close();

                return "Conference Room updated successfully";
            } else {
                return "Conference Room not updated";
            }
        }
    }

?>