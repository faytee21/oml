<?php

require_once("./config.php");

class User {

    public $conn;
    

    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function addUser($username, $password, $email, $role){
        if ($stmt=$this->conn->prepare('INSERT INTO users(username, password, email, role) VALUES (?, ?, ?, ?)')) {
            $stmt->bind_param('ssss', $username, $password, $email, $role);
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            return false;
        }
    }

    public function getUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result;
    }


    public function getUser($id){
        $sql = "SELECT * FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }

    // update user
    public function updateUser($id, $username, $password, $email, $role){
        $sql = "UPDATE users SET username = ?, password = ?, email = ?, role = ? WHERE user_id = ?";
        if ($stmt = $this->conn->prepare($sql)){
            $stmt->bind_param("sssss", $username, $password, $email, $role, $id);
            $stmt->execute();
            $stmt->close();

            return "User updated successfully";
        } else {
            return "User not updated";
        }
    }

    // get username by id
    public function getUsername($id){
        $sql = "SELECT username FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['username'];
    }

    // get user  email by id
    public function getUserEmail($id){
        $sql = "SELECT email FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['email'];
    }


}


?>