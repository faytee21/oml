<?php 
    include_once('config.php');

    class User {
        private $userId;
        private $name;
        private $email;
        // Add other user details
    
        public function __construct($userId, $name, $email) {
            $this->userId = $userId;
            $this->name = $name;
            $this->email = $email;
            // Initialize other user details here
        }
    
        // Add getters and setters for properties
    }
    
?>