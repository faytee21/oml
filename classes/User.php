<?php 
    include_once('../config.php');

    class User {
        private $userId;
        private $name;
        private $email;
        private $password;
        private $phone;
        // Add other user details
    
        public function __construct($name, $email, $password, $phone, $address) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->phone = $phone;
            // Initialize other user details here
        }

        // Add getters and setters for properties
        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function saveToDatabase(){
            global $conn;
            $sql = "INSERT INTO users (name, email, password, phone) VALUES ('$this->name', '$this->email', '$this->password', '$this->phone')";
            $result = mysqli_query($conn, $sql);
            if($result){
                return true;
            } else {
                return false;
            }

        }

    }
    
?>