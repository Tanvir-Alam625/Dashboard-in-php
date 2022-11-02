<?php
session_start();
require_once('../db_connect/db_connect.php');
$info_update = $_POST["update-info"];
$name = htmlspecialchars(trim($_POST["name"]));
$phone = htmlspecialchars($_POST["phone"]);
$id = $_SESSION["auth_id"];
$flag = false;

// image upload condition 

if($info_update){
    if($_FILES["profile_pic"]["name"] != ""){
        $image_name = $_FILES["profile_pic"]["name"];
        $convert_image_name =explode(".",$image_name);
        $image_name_extension = end($convert_image_name);
        $new_image_name = $id .".".$image_name_extension;
        $tem_name = $_FILES["profile_pic"]["tmp_name"];
        $file_path = "../img/profile-img/".$new_image_name;
        move_uploaded_file($tem_name, $file_path);
        $img_update_query = "UPDATE users SET Image='$new_image_name' WHERE ID =$id";
        $img_update_db = mysqli_query($db_connect, $img_update_query);
        $_SESSION["success_message"]= "Your info Successfully Upated";
        $_SESSION["profile_image"]= $new_image_name;
        header("location: ../profile.php");
    }
}
// name validation 
    if($name){
        $whitespace_slice = str_replace(" ", "", $name);
        if(ctype_alpha($whitespace_slice)){
            if(str_word_count($name) > 3){
                $flag = true;
                $_SESSION['name_error'] = 'Please enter the short name!';
            }else{
                $_SESSION["name_value"] = $name;
            }
        }else{
            $flag= true;
            $_SESSION['name_error'] = 'Name muste be String!';		
        }
    }else{
        $flag= true;
        $_SESSION['name_error'] = 'Name field required!';
    }

// phone validation 
if($phone){
    if(!preg_match("/^[0-9]*$/", $phone)) {
        $flag =true;
        $_SESSION["phone_error"]= "Invalid Phone Number!";
        }else{
            $_SESSION["phone_value"] = $phone;
        }
}else{
    $flag = true;
    $_SESSION["phone_error"]= "phone Number Required!";
}



if($flag){
    header("location: ../profile.php");
}


if(!$flag){
    $info_update_query = "UPDATE users SET Name='$name', Phone='$phone' WHERE ID =$id";
    $info_update_db = mysqli_query($db_connect, $info_update_query);
    $_SESSION["success_message"]= "Your info Successfully Upated";
    header("location: ../profile.php");
}

?>