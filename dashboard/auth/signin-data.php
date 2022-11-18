<?php
require_once('../db_connect/db_connect.php');
session_start();
// input value store into variables 
    $email = htmlspecialchars(trim($_POST['email']));
    $password  = htmlspecialchars(trim($_POST['password']));
    $hashed_password = sha1($password);
    $flag = false;

    // query checking 
    $signin_query = "SELECT COUNT(*) as 'result' FROM users WHERE Email='$email' AND Password='$hashed_password';";
    $signin_query_check = mysqli_query($db_connect, $signin_query);
    $signin_query_result = mysqli_fetch_assoc($signin_query_check);
    if($signin_query_result['result'] == 1){
        $_SESSION["auth_email"]= $email;
        header('location: ../home.php');
    }else{
        $flag = true;
        $_SESSION["signin_error"]= "Wrong credentials!";
    }
    // form validation 
    if(!$email){
            $flag = true;
            $_SESSION["signin_email_error"]= "Email Field Required!";
    }
    if(!$password){
        $flag = true;
        $_SESSION["signin_password_error"]= "Password Field Required!";
    }
    // error location 
    if($flag){
        header('location: ./signin.php');
    }

?>