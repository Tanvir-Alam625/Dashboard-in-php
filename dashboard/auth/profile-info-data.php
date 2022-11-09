<?php
session_start();
require_once('../db_connect/db_connect.php');
$name = htmlspecialchars(trim($_POST["name"]));
$phone = htmlspecialchars($_POST["phone"]);
$address = htmlspecialchars(trim($_POST["address"]));
$bio = htmlspecialchars(trim($_POST["bio"]));
$facebook = htmlspecialchars(trim($_POST["facebook"]));
$twitter = htmlspecialchars(trim($_POST["twitter"]));
$instagram = htmlspecialchars(trim($_POST["instagram"]));
$linkedin = htmlspecialchars(trim($_POST["linkedin"]));
$email = htmlspecialchars(trim($_POST["email"]));
$email_explode = explode("@",$email);
$email_first_name = $email_explode[0];
$id = $_SESSION["auth_id"];
$flag = false;
// image upload condition 
if(isset($_POST["update-info"])){
    if($_FILES["profile_pic"]["name"] != ""){
        $image_name = $_FILES["profile_pic"]["name"];
        $convert_image_name =explode(".",$image_name);
        $image_name_extension = end($convert_image_name);
        $new_image_name = $id.$email_first_name.".".$image_name_extension;
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

// address validation 
if($address){
    echo $address."address";
}else{
    $flag = true;
    $_SESSION["address_error"]= "Address Field Required!";
}
// bio validation 
if($bio){
    echo $bio."bio";
}else{
    $flag = true;
    $_SESSION["bio_error"]= "bio Field Required!";
}

// facebook validation 
if($facebook){
    if(filter_var($facebook, FILTER_VALIDATE_URL) === false){
    $flag = true;
    $_SESSION["facebook_error"]= "Please enter the valid URL!";
    }
}else{
    $flag = true;
    $_SESSION["facebook_error"]= "facebook Field Required!";
}

// instagram validation 
if($instagram){
    if(filter_var($instagram, FILTER_VALIDATE_URL) === false){
        $flag = true;
        $_SESSION["instagram_error"]= "Please enter the valid URL!";
        }
}else{
    $flag = true;
    $_SESSION["instagram_error"]= "instagram Field Required!";
}

// twitter validation 
if($twitter){
    if(filter_var($twitter, FILTER_VALIDATE_URL) === false){
        $flag = true;
        $_SESSION["twitter_error"]= "Please enter the valid URL!";
        }
}else{
    $flag = true;
    $_SESSION["twitter_error"]= "twitter Field Required!";
}

// linkedin validation 
if($linkedin){
    if(filter_var($linkedin, FILTER_VALIDATE_URL) === false){
        $flag = true;
        $_SESSION["linkedin_error"]= "Please enter the valid URL!";
        }
}else{
    $flag = true;
    $_SESSION["linkedin_error"]= "linkedin Field Required!";
}





if($flag){
    header("location: ../profile.php");
}


if(!$flag){
    $info_update_query = "UPDATE users SET Name='$name', Phone='$phone',Address='$address', Bio='$bio', Facebook='$facebook', Instagram='$instagram', Twitter='$twitter', Linkedin='$linkedin' WHERE ID =$id";
    $info_update_db = mysqli_query($db_connect, $info_update_query);
    $_SESSION["success_message"]= "Your info Successfully Upated";
    header("location: ../profile.php");
}

?>