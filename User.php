<?php

require_once("./config.php");


class User {
    private $userId;
    private $username;
    private $password;
    private $email;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function signUp() {
        global $conn;

        if (empty($this->username) || empty($this->password) || empty($this->email)) {
            return "complete registration form";
        }

        if(!isset($this->username, $this->email, $this->password)){
            // no data subbmitted
            exit('no data submitted');
        }

        if (strlen($this->password) > 20 || strlen($this->password) < 5) {
            exit('Password must be between 5 and 20 characters long!');
        }

        if (preg_match('/^[a-zA-Z0-9]+$/', $this->username) == 0) {
            exit('Username is not valid!');
        }
        
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            exit('Email is not valid!');
        }

        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        if ($stmt = $conn -> prepare('SELECT user_id, password FROM users WHERE email = ?')){
            //bind parameters
            $stmt -> bind_param('s', $this->email);
            $stmt -> execute();
            $stmt -> store_result();
        
            // store the result so we can check if the account exists
            if($stmt -> num_rows > 0){
                // username already exists
                return "E-mail already exists, please choose another";
            }else{
                if ($stmt = $conn->prepare($sql)){
                $password = password_hash($this->password,PASSWORD_DEFAULT);
                $stmt->bind_param("sss", $this->username, $password, $this->email);
                $stmt->execute();
                $stmt->close();

                    header("Location: login.php");
                    exit;
                } else {
                    return "Error: $sql $conn->error";
                }
            }
        } else {
            return "Error: $sql $conn->error";
        }
    }

    public static function login($email, $password){
        // checking if data was subbmitted
        if(!isset($email, $password)){
            // could not get data subbmitted
            exit('Please fill both the username and password fields!');
        }
        
        // prepare our sql, preparing the sql statement will prevent sql injection
        global $conn;
        if($stmt = $conn -> prepare('SELECT user_id, password FROM users WHERE email = ?')){
            // bind parameters
            $stmt -> bind_param('s', $email);
            $stmt -> execute();
            // store_result so we can check if the account exists
            $stmt -> store_result();
        
            if($stmt -> num_rows > 0){
                $stmt -> bind_result($id, $dbpassword);
                $stmt -> fetch();
        
                // account exists, now we verify the password
                if(password_verify($password, $dbpassword)){
                    //verification successful!
                    //create sessions so we know the user is logged in
                    session_regenerate_id();
        
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $email;
                    $_SESSION['id'] = $id;
        
                    // global $BASE_URL;
                    header("Location: dashboard.php");
                    exit;
                
                }else{
                    // insorrect password
                    return "incorrect password";
                }
        
            }else{
                return "Incorrect username or password";
            }
        
            $stmt -> close();
        }
    }

    public static function logout(){
        session_start();
        session_destroy();
        header("Location: login.php");
        exit;
    }


    public static function sessionInfo(){
        //list all session variables
        print_r($_SESSION);

        if(!isset($_SESSION['loggedin'])){
            return "You are not logged in";
        }else{
            return "You are logged in";
        }
    }


    public static function getUser($id){
        global $conn;
        $sql = "SELECT * FROM users WHERE user_id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function updateUser(){
        global $conn;
        $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE user_id = ?";
        if ($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ssss", $this->username, $this->password, $this->email, $this->userId);
            $stmt->execute();
            $stmt->close();

            return "User updated successfully";
        } else {
            return "Error: $sql $conn->error";
        }
    }

    public static function getNamebyId ($id){
        global $conn;
        $sql = "SELECT username FROM users WHERE user_id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['username'];
    }

}


?>