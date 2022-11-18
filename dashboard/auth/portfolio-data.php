<?php
require_once('../db_connect/db_connect.php');
session_start();
// input value store into variables 
$portfolio_title = htmlspecialchars(trim($_POST["portfolio_title"])); 
$portfolio_icon = htmlspecialchars(trim($_POST["portfolio_icon"])); 
$portfolio_status= htmlspecialchars(trim($_POST["portfolio_status"])); 
$portfolio_count = htmlspecialchars(trim($_POST["portfolio_count"]));
$flag = false;
// add portfolio 
if(isset($_POST["add_portfolio"])){
    if(!$portfolio_title || !$portfolio_icon || !$portfolio_status || !$portfolio_count){
        $flag =true;
        $_SESSION["portfolio_error"] = "Input Field Is Required!";
    }else{
        $db_query = "INSERT INTO `portfolios` (portfolio_title, portfolio_icon, portfolio_count, portfolio_status) VALUES ('$portfolio_title', '$portfolio_icon', '$portfolio_count', '$portfolio_status' )";
        mysqli_query($db_connect, $db_query);
        $_SESSION["success_message"] = "Successfuly added portfolio";
        header('location: ../add-portfolio.php');
    }
}


// update portfolio 
if(isset($_POST["update_portfolio"])){
    print_r($_POST);
    $portfolio_id = $_POST["portfolio_id"];
    if(!$portfolio_title || !$portfolio_icon || !$portfolio_status || !$portfolio_count || !$portfolio_id){
        $flag =true;
        $_SESSION["portfolio_error"] = "Input Field Is Required!";
    }else{
        $portfolio_update_query = "UPDATE portfolios SET portfolio_title='$portfolio_title', portfolio_icon='$portfolio_icon', portfolio_status='$portfolio_status', portfolio_count='$portfolio_count' WHERE ID ='$portfolio_id'";
        mysqli_query($db_connect, $portfolio_update_query);
        $_SESSION["success_message"] = "Successfuly update portfolio";
        header("location: ../update-portfolio.php?id=$portfolio_id");
    }
}

// redirect location 
if($flag){
    header('location: ../add-portfolio.php');
}


?>