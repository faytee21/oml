<?php 
    include_once('config.php');

    class User {
        private $userId;
        private $name;
        private $email;
        private $password;
        private $phone;
        private $address;
        // Add other user details
    
        public function __construct($name, $email, $password, $phone, $address) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->phone = $phone;
            $this->address = $address;
            // Initialize other user details here
        }

        // Add getters and setters for properties
        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
        }
    }
    
?>