<?php 
include_once("../config.php");

    class User {
        private $userId;
        private $username;
        private $email;
        private $password;
        private $phone;
        private $regTime;
        // Add other user details
    
        // public function __construct($username, $email, $password, $phone, $address) {
        //     $this->username = $username;
        //     $this->email = $email;
        //     $this->password = $password;
        //     $this->phone = $phone;
        //     // Initialize other user details here
        // }

        // Add getters and setters for properties
        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
        }

        public function getName() {
            return $this->username;
        }

        public function setName($username) {
            $this->username = $username;
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

        public static function saveToDatabase($username, $email, $password){
                global $conn;
        
                if (empty($username) || empty($password) || empty($email)) {
                    return "complete registration form";
                }
        
                if(!isset($username, $email, $password)){
                    // no data subbmitted
                    exit('no data submitted');
                }
                
                  // making sure the registration submitted are not Empty
                //   if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
                //     // one or more values are empty
                //     exit('Please complete the registration form');
                //   }
                
                if (strlen($password) > 20 || strlen($password) < 5) {
                    exit('Password must be between 5 and 20 characters long!');
                }
                
                if (preg_match('/^[a-zA-Z0-9]+$/', $username) == 0) {
                    exit('Username is not valid!');
                }
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    exit('Email is not valid!');
                }
                
                // global $conn;
                   //we need to check if the account with that username exists
                //    if ($conn -> connect_error) {
                //     echo "hello";
                //     die("Connection failed: " . $conn->connect_error);
                //    }
                // if ($stmt = $conn -> prepare('SELECT user_id, password FROM users WHERE email = ?')){
                //     //bind parameters
                //     $stmt -> bind_param('s', $email);
                //     $stmt -> execute();
                //     $stmt -> store_result();
        
                //     // store the result so we can check if the account exists
                //     if($stmt -> num_rows > 0){
                //         // username already exists
                //         return "E-mail already exists, please choose another";
                //     }else{
                    
                    // if (!self::doesEmailExist($email)) {
        
                    //     if($stmt = $conn -> prepare('INSERT INTO users (name, password, email) VALUES (?,?,?,?)')){
                    //         // PASSWORD ENCRIPTION
                    //         $password = password_hash($password,PASSWORD_DEFAULT);
                    //         $stmt -> bind_param('ssss', $username, $password, $email);
                    //         $stmt -> execute();
                    //         // return "Registration successful, please login";
                    //         header("Location: login.php");
                    //         exit;
        
                    //     }else{
                    //         // something is wrong with your sql statement
                    //         return "Could not prepare statement";
                    //     }
                    // } else {
                    //     return "Email already exists";
                    // }

                    // if ($stmt = $conn -> prepare('SELECT user_id, password FROM users WHERE email = ?')){
                    //     //bind parameters
                    //     $stmt -> bind_param('s', $email);
                    //     $stmt -> execute();
                    //     $stmt -> store_result();
                    //     // store the result so we can check if the account exists
                    //     if($stmt -> num_rows > 0){
                    //         // username already exists
                    //         return "E-mail already exists, please choose another";
                    //     }else{
                    //         return "No user found";
                    //     }
                    // }else{
                    //     return "Could not prepare statement";
                    // }

                    return "Registration successful, please login";
            }
        public static function doesEmailExist($email){
            global $conn;
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                return true;
            }else{
                return false;
            }
        }

    }
    
?>