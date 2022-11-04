<?php
session_start();
require_once('../db_connect/db_connect.php');
$service_title = htmlspecialchars(trim($_POST["service_title"])); 
$service_icon = htmlspecialchars(trim($_POST["service_icon"])); 
$service_status= htmlspecialchars(trim($_POST["service_status"])); 
$service_description = htmlspecialchars(trim($_POST["service_description"]));


// echo $service_description."------", $service_icon ."------", $service_status ."------", $service_title ."------";
$flag = false;
if(!$service_title || !$service_icon || !$service_status || !$service_description){
    $flag =true;
    $_SESSION["service_error"] = "Input Field Is Required!";
}else{
    $db_query = "INSERT INTO `services` (service_title, service_icon, service_status, service_description) VALUES ('$service_title', '$service_icon', '$service_status' , '$service_description')";
	mysqli_query($db_connect, $db_query);
    $_SESSION["success_message"] = "Successfuly added service";
    header('location: ../add-service.php');
}


if($flag){
    header('location: ../add-service.php');
}


?>