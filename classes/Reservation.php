<?php

class Reservation {
    private $reservationId;
    private $userId;
    private $roomId;
    private $startDate;
    private $endDate;
    // Add other reservation details

    public function __construct($reservationId, $userId, $roomId, $startDate, $endDate) {
        $this->reservationId = $reservationId;
        $this->userId = $userId;
        $this->roomId = $roomId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        // Initialize other reservation details here
    }

    // Add getters and setters for properties
}


?>