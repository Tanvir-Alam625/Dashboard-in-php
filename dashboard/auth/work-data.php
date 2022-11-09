<?php
session_start();
require_once('../db_connect/db_connect.php');
$work_title = htmlspecialchars(trim($_POST["work_title"])); 
$work_rol = htmlspecialchars(trim($_POST["work_rol"])); 
$work_status= htmlspecialchars(trim($_POST["work_status"])); 
$work_description = htmlspecialchars(trim($_POST["work_description"]));
$work_image = $_FILES["work_image"]["name"];
$user_id = $_SESSION["auth_id"];
$flag = false;
// insert into work query 


if(isset($_POST["add_work"])){
    if(!$work_title  || !$work_rol || !$work_status || !$work_description || !$work_image){
        $flag =true;
        $_SESSION["work_error"] = "Input Field Is Required!";
    }else{
        $explod_file = explode(".", $work_image); 
        $extension = end($explod_file);
        if($extension ==="png" || $extension ==="jpg" || $extension ==="jpeg"){
            if($_FILES["work_image"]["size"] > 2000000){
                $flag =true;
                $_SESSION["work_image_error"] = "File less then 2 mb!";
            }
            $new_image_name = $user_id."_".time().".".$extension;
            $file_tmp = $_FILES["work_image"]["tmp_name"];
            $new_file_path = "../img/work-imges/".$new_image_name;
            move_uploaded_file($file_tmp,$new_file_path);
            $db_query = "INSERT INTO `works` (work_title, work_rol, work_description, work_image, work_status) VALUES ('$work_title', '$work_rol', '$work_description' , '$new_image_name', '$work_status')";
            mysqli_query($db_connect, $db_query);
            $_SESSION["success_message"] = "Successfuly added service";
            header('location: ../add-work.php');
            
        }else{
            $flag = true;
            $_SESSION["work_image_error"] = "choose valid image!";
        }
    }
}

if($flag){
    header("location: ../add-work.php");
}

?>