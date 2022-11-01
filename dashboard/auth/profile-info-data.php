<?php
session_start();
require_once('../db_connect/db_connect.php');
$info_update = $_POST["update-info"];
print_r($_POST);
if($info_update){
    echo "is info"; 

}

?>