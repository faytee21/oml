<?php

include_once('../config.php');

class Room {
    private $roomId;
    private $roomType;
    private $capacity;
    private $amenities;
    // Add other properties like images, description, etc.

    public function __construct($roomId, $roomType, $capacity, $amenities) {
        $this->roomId = $roomId;
        $this->roomType = $roomType;
        $this->capacity = $capacity;
        $this->amenities = $amenities;
        // Initialize other properties here
    }

    // Add getters and setters for properties
}


?>