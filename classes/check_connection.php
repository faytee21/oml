<?php

include_once("../config.php");

if ($conn){
    echo "Connected";
} else {
    echo "Not connected";
}

    if ($stmt = $conn -> prepare('SELECT user_id, password FROM users WHERE email = ?')){
        //bind parameters
        $stmt -> bind_param('s', $email);
        $stmt -> execute();
        $stmt -> store_result();
        // store the result so we can check if the account exists
        if($stmt -> num_rows > 0){
            // username already exists
            return "E-mail already exists, please choose another";
        }else{
            echo "No user found";
        }
    }else{
        echo "Could not prepare statement";
    }



?>