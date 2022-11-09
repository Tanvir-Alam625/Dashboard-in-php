<?php
require_once("../../db_connect/db_connect.php");
$id = $_GET["id"];
$portfolio_delete_query = "DELETE FROM `portfolios` WHERE ID=$id";
mysqli_query($db_connect, $portfolio_delete_query);
header("location: ../../portfolio-list.php");
?>