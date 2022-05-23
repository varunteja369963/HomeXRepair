<?php
date_default_timezone_set("Asia/Kolkata"); 
include_once('conn.php');

$dateVisited = date("Y-m-d H:i:s");
$brand = $_POST['brand'];
$path = $_POST['path'];
$node = $_POST['node'];

$insert = $conn->prepare("INSERT INTO `traffic` (`dateVisited`, `brand`, `path`, `node`) VALUES (?, ?, ?, ?)");
$insert->bind_param("ssss", $dateVisited, $brand, $path, $node);
$insert->execute();
$insert->close();

$conn->close();
?>