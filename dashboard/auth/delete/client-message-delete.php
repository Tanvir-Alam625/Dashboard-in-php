<?php
require_once("../../db_connect/db_connect.php");
$id = $_GET["id"];
$message_delete_query = "DELETE FROM `messages` WHERE ID=$id";
mysqli_query($db_connect, $message_delete_query);
header("location: ../../client-message.php");
?>