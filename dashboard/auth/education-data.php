<?php
session_start();
require_once('../db_connect/db_connect.php');
// input value store into variable 
$education_name = htmlspecialchars(trim($_POST["education_name"])); 
$education_credit = htmlspecialchars(trim($_POST["education_credit"])); 
$education_year = htmlspecialchars(trim($_POST["education_year"])); 
$education_status= htmlspecialchars(trim($_POST["education_status"])); 


$flag = false;
$update_flag = false;
// insert into education query 
if(isset($_POST["add_education"])){
    if(!$education_name || !$education_credit || !$education_year || !$education_status){
        $flag =true;
        $_SESSION["education_error"] = "Input Field Is Required!";
    }else{
        $db_query = "INSERT INTO `educations` (`Name`, `Credit`, `Year`, `Status`) VALUES ('$education_name', '$education_credit', '$education_year' , '$education_status')";
        mysqli_query($db_connect, $db_query);
        $_SESSION["success_message"] = "Successfuly added service";
        header('location: ../add-education.php');
    }
    
}

// update education query 

if(isset($_POST["update_education"])){
    $education_id = htmlspecialchars($_POST["education_id"]);
    if(!$education_name || !$education_credit || !$education_year || !$education_status || !$education_id){
        $update_flag =true;
        $_SESSION["education_error"] = "Input Field Is Required!";
    }else{
        //education update query with 
        $education_update_query = "UPDATE educations SET Name='$education_name', Credit='$education_credit', `Year`='$education_year', Status='$education_status' WHERE ID ='$education_id'";
        mysqli_query($db_connect, $education_update_query);
        $_SESSION["success_message"] = "Successfuly udated education";
        header("location: ../update-education.php?id=$education_id");
    }
}

// redirect the  add education 
if($flag){
    header('location: ../add-education.php');
}

// redirect the update education 
if($update_flag){
    $education_id = htmlspecialchars($_POST["education_id"]);
    header("location: ../update-education.php?id=<?=$education_id?>");
}


?>