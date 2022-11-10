<?php
require_once("../../db_connect/db_connect.php");
$work_id = $_GET["id"];
// delete image 
$load_image_query = "SELECT `work_image` FROM works WHERE ID=$work_id";
$db_image = mysqli_query($db_connect, $load_image_query);
$db_image_result = mysqli_fetch_assoc($db_image);
unlink("../../img/work-imges/".$db_image_result['work_image']);
// delete table data 
$delete_query = "DELETE FROM `works` WHERE ID=$work_id";
$db_image_delete = mysqli_query($db_connect, $delete_query);
header("location: ../../work-list.php");

?>