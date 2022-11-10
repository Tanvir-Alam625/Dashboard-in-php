<?php
session_start();
require_once('../db_connect/db_connect.php');
$work_title = htmlspecialchars(trim($_POST["work_title"])); 
$work_rol = htmlspecialchars(trim($_POST["work_rol"])); 
$work_status= htmlspecialchars($_POST["work_status"]); 
$work_description = htmlspecialchars(trim($_POST["work_description"]));
$work_image = $_FILES["work_image"]["name"];
$user_id = $_SESSION["auth_id"];
$add_flag = false;
$update_flag = false;
// insert into work query 

if(isset($_POST["add_work"])){
    if( !$work_title  || !$work_rol || !$work_status || !$work_description || !$work_image){
        $add_flag =true;
        $_SESSION["work_error"] = "Input Field Is Required!";
    }else{
        $explod_file = explode(".", $work_image); 
        $extension = end($explod_file);
        if($extension ==="png" || $extension ==="jpg" || $extension ==="jpeg"){
            if($_FILES["work_image"]["size"] > 2000000){
                $add_flag =true;
                $_SESSION["work_image_error"] = "File less then 2 mb!";
            }else {
                $new_image_name = $user_id."_".time().".".$extension;
                $file_tmp = $_FILES["work_image"]["tmp_name"];
                $new_file_path = "../img/work-imges/".$new_image_name;
                move_uploaded_file($file_tmp,$new_file_path);
                $db_query = "INSERT INTO `works` (work_title, work_rol, work_description, work_image, work_status) VALUES ('$work_title', '$work_rol', '$work_description' , '$new_image_name', '$work_status')";
                mysqli_query($db_connect, $db_query);
                $_SESSION["success_message"] = "Successfuly updated service";
                header('location: ../add-work.php');
            }
            
            
        }else{
            $add_flag = true;
            $_SESSION["work_image_error"] = "choose valid image!";
        }
    }
}

// update work 
if(isset($_POST["update_work"])){
    $work_id = $_POST["work_id"];
    if(!isset($_POST["work_id"]) ||!$work_title  || !$work_rol || !$work_status || !$work_description || !$work_image){
        $update_flag =true;
        $_SESSION["work_error"] = "Input Field Is Required!";
    }else{
        $explod_file = explode(".", $work_image); 
        $extension = end($explod_file);
        if($extension ==="png" || $extension ==="jpg" || $extension ==="jpeg"){
            if($_FILES["work_image"]["size"] > 2000000){
                $update_flag =true;
                $_SESSION["work_image_error"] = "File less then 2 mb!";
            }else{
             // delete image 
            $load_image_query = "SELECT `work_image` FROM works WHERE ID=$work_id";
            $db_image = mysqli_query($db_connect, $load_image_query);
            $db_image_result = mysqli_fetch_assoc($db_image);
            unlink("../img/work-imges/".$db_image_result['work_image']);
            //update work data
            $new_image_name = $user_id."_".time().".".$extension;
            $file_tmp = $_FILES["work_image"]["tmp_name"];
            $new_file_path = "../img/work-imges/".$new_image_name;
            move_uploaded_file($file_tmp,$new_file_path);
            $db_query = "UPDATE works SET work_title='$work_title', work_rol='$work_rol', work_status='$work_status', work_description='$work_description', work_image='$new_image_name' WHERE ID=$work_id";
            mysqli_query($db_connect, $db_query);
            header('location: ../work-list.php');
            }
            
        }else{
            $update_flag = true;
            $_SESSION["work_image_error"] = "choose valid image!";
        }
    }

}


if($add_flag){
    header("location: ../add-work.php");
}
if($update_flag){
    $work_id = $_POST["work_id"];
    header("location: ../update-work.php?id=$work_id");
}

?>