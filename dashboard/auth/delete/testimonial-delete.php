<?php
require_once("../../db_connect/db_connect.php");
$testimonial_id = $_GET["id"];
// delete image 
$load_image_query = "SELECT `Image` FROM testimonials WHERE ID=$testimonial_id";
$db_image = mysqli_query($db_connect, $load_image_query);
$db_image_result = mysqli_fetch_assoc($db_image);
unlink("../../img/testimonial-img/".$db_image_result['Image']);
// delete table data 
$delete_query = "DELETE FROM `testimonials` WHERE ID=$testimonial_id";
$db_image_delete = mysqli_query($db_connect, $delete_query);
header("location: ../../testimonial-list.php");

?>