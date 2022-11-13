<?php
session_start();
require_once('../db_connect/db_connect.php');
// store the input value in variable 
$testimonial_name = htmlspecialchars(trim($_POST["testimonial_name"])); 
$testimonial_position = htmlspecialchars(trim($_POST["testimonial_position"])); 
$testimonial_status= htmlspecialchars($_POST["testimonial_status"]); 
$testimonial_message = htmlspecialchars(trim($_POST["testimonial_message"]));
$testimonial_image = $_FILES["testimonial_image"]["name"];
$user_id = $_SESSION["auth_id"];
$add_flag = false;
$update_flag = false;
//  input field validation 
if(isset($_POST["add_testimonial"])){
    if( !$testimonial_name  || !$testimonial_position || !$testimonial_status || !$testimonial_message || !$testimonial_image){
        $add_flag =true;
        $_SESSION["work_error"] = "Input Field Is Required!";
    }else{
        $explod_file = explode(".", $testimonial_image); 
        $extension = end($explod_file);
        if($extension ==="png" || $extension ==="jpg" || $extension ==="jpeg"){
            if($_FILES["testimonial_image"]["size"] > 2000000){
                $add_flag =true;
                $_SESSION["testimonial_image_error"] = "File less then 2 mb!";
            }else {
                $new_image_name = $user_id."_".time().".".$extension;
                $file_tmp = $_FILES["testimonial_image"]["tmp_name"];
                $new_file_path = "../img/testimonial-img/".$new_image_name;
                move_uploaded_file($file_tmp,$new_file_path);
                $db_query = "INSERT INTO `testimonials` (Name, Image, Status, Message, Position) VALUES ('$testimonial_name', '$testimonial_image', '$testimonial_status' , '$new_image_name', '$testimonial_position')";
                mysqli_query($db_connect, $db_query);
                $_SESSION["success_message"] = "Successfuly added testimonial";
                header('location: ../add-testimonial.php');
            }
        }else{
            $add_flag = true;
            $_SESSION["testimonial_image_error"] = "Choose valid image!";
        }

    }
}

if($add_flag){
    header("location: ../add-testimonial.php");
}





?>