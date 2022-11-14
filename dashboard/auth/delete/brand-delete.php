<?php
require_once("../../db_connect/db_connect.php");
$id = $_GET["id"];
$brand_delete_query = "DELETE FROM `brands` WHERE ID=$id";
mysqli_query($db_connect, $brand_delete_query);
header("location: ../../brand-list.php");
?>