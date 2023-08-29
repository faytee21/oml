<?php
    include_once './config.php';

    class ConferenceRoom {
        public $conn;

        public function __construct() {
            $this->conn = $GLOBALS['conn'];
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
    }
?>