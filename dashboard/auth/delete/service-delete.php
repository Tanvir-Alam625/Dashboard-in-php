<?php
require_once("../../db_connect/db_connect.php");
$id = $_GET["id"];
$service_delete_query = "DELETE FROM `services` WHERE ID=$id";
mysqli_query($db_connect, $service_delete_query);
header("location: ../../service-list.php");
?>