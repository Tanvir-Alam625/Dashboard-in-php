<?php
session_start();
require_once('../db_connect/db_connect.php');
    $email = htmlspecialchars($_POST['email']);
    $password  = htmlspecialchars($_POST['password']);
    $hashed_password = sha1($password);
    $flag = false;

    // query checking 
    $signin_query = "SELECT COUNT(*) as 'result' FROM users WHERE Email='$email' AND Password='$hashed_password';";
    $signin_query_check = mysqli_query($db_connect, $signin_query);
    $signin_query_result = mysqli_fetch_assoc($signin_query_check);
    echo $signin_query_result['result'];
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
    if($flag){
        header('location: ./signin.php');
    }

?>