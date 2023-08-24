<?php

require_once("./config.php");
class Reservation {
    // private $reservationId;
    private $userId;
    private $roomId;
    private $startDate;
    private $endDate;
    // Add other reservation details       
    public $conn;


    public function __construct($userId, $roomId, $startDate, $endDate) {
        $this->userId = $userId;
        $this->roomId = $roomId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;

        $this->conn = $GLOBALS['conn'];

        // Initialize other reservation details here
    }

    // add reservation to database
    public function makeReservation() {
        $sql = "INSERT INTO reservations (user_id, room_id, start_date, end_date) VALUES (?, ?, ?, ?)";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssss", $this->userId, $this->roomId, $this->startDate, $this->endDate);
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            return false;
        }
    }

    // check if there are any reservations using  as tatic method
    public static function checkReservation($roomId, $startDate, $endDate) {
        $conn = $GLOBALS['conn'];
        $sql = "SELECT * FROM reservations WHERE room_id = $roomId AND start_date = '$startDate' AND end_date = '$endDate'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            return true;
        } else {
            return false;
        }
    }


    //  check if there are any reservations using  a static method from a specific user using user_id
    public static function checkUserReservation($userId, $roomId, $startDate, $endDate) {
        $conn = $GLOBALS['conn'];
        $sql = "SELECT * FROM reservations WHERE user_id = $userId AND room_id = $roomId AND start_date = '$startDate' AND end_date = '$endDate'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

     
}


?>