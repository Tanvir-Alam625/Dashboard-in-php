<?php
session_start();
require_once('../db_connect/db_connect.php');

// input value store into variables 
$service_title = htmlspecialchars(trim($_POST["service_title"])); 
$service_icon = htmlspecialchars(trim($_POST["service_icon"])); 
$service_status= htmlspecialchars(trim($_POST["service_status"])); 
$service_description = htmlspecialchars(trim($_POST["service_description"]));


$flag = false;
// insert into service query 
if(isset($_POST["add_service"])){
    if(!$service_title || !$service_icon || !$service_status || !$service_description){
        $flag =true;
        $_SESSION["service_error"] = "Input Field Is Required!";
    }else{
        $db_query = "INSERT INTO `services` (service_title, service_icon, service_status, service_description) VALUES ('$service_title', '$service_icon', '$service_status' , '$service_description')";
        mysqli_query($db_connect, $db_query);
        $_SESSION["success_message"] = "Successfuly added service";
        header('location: ../add-service.php');
    }    
}

// update service query 
if(isset($_POST["update_service"])){
    $service_id = htmlspecialchars($_POST["service_id"]);
    if(!$service_title || !$service_icon || !$service_status || !$service_description || !$service_id){
        $flag =true;
        $_SESSION["service_error"] = "Input Field Is Required!";
    }else{

        //service update query with 
        $service_update_query = "UPDATE services SET service_title='$service_title', service_icon='$service_icon', service_status='$service_status', service_description='$service_description' WHERE ID ='$service_id'";
        mysqli_query($db_connect, $service_update_query);
        $_SESSION["success_message"] = "Successfuly udated service";
        header("location: ../update-service.php?id=$service_id");
    }
}

// error location 
if($flag){
    header('location: ../add-service.php');
}


?>