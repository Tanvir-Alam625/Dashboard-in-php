<?php
session_start();
require_once('../db_connect/db_connect.php');
$change_password = $_POST["change-password"];
$current_password = htmlspecialchars($_POST['current_password']);
$new_password = htmlspecialchars($_POST['new_password']);
$confirm_password = htmlspecialchars($_POST['confirm_password']);
$id = $_SESSION["auth_id"];
$flag = false;
if($change_password){
    // password  validation 
    if($current_password){
        $current_password_query = "SELECT Password FROM users WHERE ID=$id";
        $current_password_db= mysqli_query($db_connect, $current_password_query);
        $current_password_result = mysqli_fetch_assoc($current_password_db);
        if($current_password_result["Password"] === sha1($current_password)){
            if($new_password){
                $pattern = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
                if(preg_match($pattern, $new_password)) {
                    if($current_password_result["Password"] != sha1($new_password)){
                        if($confirm_password){
                            if($confirm_password === $new_password){
                                $password_hashed =sha1($new_password);
                                $password_update_query = "UPDATE users SET Password='$password_hashed' WHERE ID=$id";
                                $password_update_db= mysqli_query($db_connect, $password_update_query);
                                $_SESSION["success_message"]= "Your Password Successfully Upated";
                                header("location: ../profile.php");

                            }else{
                                $flag= true;
                                $_SESSION['confirm_password_error'] = "Don't match your confirm & New Password!";
                            }
                        }else{
                            $flag= true;
                            $_SESSION['confirm_password_error'] = 'Confirm password required!';
                        }
                    }else{
                        $flag = true;
                        $_SESSION["new_password_error"]= "old passoword new password same!";
                    }
                }else{
                    $flag = true;
                    $_SESSION["new_password_error"]= "Please Enter the Stong Password!";
                }
            }else{
                $flag= true;
                $_SESSION['new_password_error'] = 'New Password required!';
            }
        }else{
            $flag = true;
            $_SESSION["current_password_error"]= "incorrect password";
        }
    }else{
        $flag = true;
        $_SESSION["current_password_error"]= "input field required!";
    }
}


if($flag){
    $_SESSION["validation-error"]= true;
    header("location:../profile.php");

}
?>