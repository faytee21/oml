<?php
    include_once './config.php';

    class Reservation {           
        public $conn;                   

        public function __construct() {
            $this->conn = $GLOBALS['conn'];
        }

        public function addReservation(){
            
        }

    }

?>