<?php
require_once('../db_connect/db_connect.php');
session_start();

$portfolio_title = htmlspecialchars(trim($_POST["portfolio_title"])); 
$portfolio_icon = htmlspecialchars(trim($_POST["portfolio_icon"])); 
$portfolio_status= htmlspecialchars(trim($_POST["portfolio_status"])); 
$portfolio_count = htmlspecialchars(trim($_POST["portfolio_count"]));


$flag = false;
if(!$portfolio_title || !$portfolio_icon || !$portfolio_status || !$portfolio_count){
    $flag =true;
    $_SESSION["portfolio_error"] = "Input Field Is Required!";
}else{
    $db_query = "INSERT INTO `portfolios` (portfolio_title, portfolio_icon, portfolio_count, portfolio_status) VALUES ('$portfolio_title', '$portfolio_icon', '$portfolio_count', '$portfolio_status' )";
	mysqli_query($db_connect, $db_query);
    $_SESSION["success_message"] = "Successfuly added portfolio";
    header('location: ../add-portfolio.php');
}

if($flag){
    header('location: ../add-portfolio.php');
}


?>