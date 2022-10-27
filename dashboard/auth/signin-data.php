<?php
require_once('../db_connect/db_connect.php');
    $email = htmlspecialchars($_POST['email']);
    $password  = sha1(htmlspecialchars($_POST['password']));
    $flag = false;
    if(!$email){
            $flag = true;
            $_SESSION["email_error"]= "Email Field Required!";
    }
    if(!$password){
        $flag = true;
        $_SESSION["password_error"]= "Password Field Required!";
    }
    if($flag){
        header('location: ./signin.php');
    }else{
        $signin_query = "SELECT COUNT(*) as 'result' FROM users WHERE Email='$email' AND Password='$password';";
        $signin_query_check = mysqli_query($db_connect, $signin_query);
        $signin_query_result = mysqli_fetch_assoc($signin_query_check);
        echo $signin_query_result['result'];
    }

?>