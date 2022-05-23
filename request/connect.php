<?php
date_default_timezone_set("Asia/Kolkata"); 
include_once('conn.php');

$mobile = $_POST['mobile'];
$dateVisited = date("Y-m-d H:i:s");
$brand = $_POST['brand'];
$path = $_POST['path'];

$insert = $conn->prepare("INSERT INTO `connect` ( `mobile`, `dateVisited`, `brand`, `path`) VALUES (?, ?, ?, ?)");
$insert->bind_param("ssss", $mobile, $dateVisited, $brand, $path);
$insert->execute();
$insert->close();

$conn->close();
?>