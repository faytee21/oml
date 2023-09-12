<?php
session_start();
require_once('config.php');
require_once('User.php');
require_once('Room.php');
require_once('PDF.php');
require_once('Mail.php');

$pdf = new PDF();
$mail = new Mail();


$room_id = $_GET['room_id'];
if ($pdf->receipt($room_id)){
    $mail->send($_SESSION['id']);
    // header("Location: payment.php");
    // exit;
    exit(header("Location: payment.php"));
} else {
    echo "Something went wrong";
}
?>