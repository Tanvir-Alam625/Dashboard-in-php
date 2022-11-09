<?php
require_once('../db_connect/db_connect.php');
$name = htmlspecialchars(trim($_POST["name"]));
$email = htmlspecialchars(trim($_POST["email"]));
$message = htmlspecialchars(trim($_POST["message"]));

if($name && $email && $message){
    $message_query = "INSERT INTO `messages` (Name, Email, Message) VALUES ('$name', '$email', '$message')";
	mysqli_query($db_connect, $message_query);
    header("location: ../../index.php");
}

?>