<?php

    session_start();
    require_once('User.php');

    User::sessionInfo();

    //check is session is valid
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit;
    }

?>