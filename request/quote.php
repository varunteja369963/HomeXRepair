<?php
date_default_timezone_set("Asia/Kolkata"); 
include_once('conn.php');

$appliance = $_REQUEST['appliance'];
$problem = $_REQUEST['problem'];
$mobile = $_REQUEST['mobile'];
$dateVisited = date("Y-m-d H:i:s");
$brand = $_REQUEST['brand'];
$path = $_REQUEST['path'];

$insert = $conn->prepare("INSERT INTO `contact` (`appliance`, `problem`, `mobile`, `dateVisited`, `brand`, `path`) VALUES (?, ?, ?, ?, ?, ?)");
$insert->bind_param("ssssss", $appliance, $problem, $mobile, $dateVisited, $brand, $path);
$insert->execute();
$insert->close();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSendmail();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sabiduria.in@gmail.com';                 // SMTP username
    $mail->Password = 'Nancy3690#';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('homexrepair@gmail.com', 'homexrepair');
    $mail->addAddress('varunteja369963@gmail.com', 'New Quote');     // Add a recipient            
    $mail->addReplyTo('homexrepair@gmail.com', 'reply');
    $mail->addCC('varunteja369963@gmail.com');
    $mail->addCC('anwar111.md@gmail.com');
    $mail->addCC('asmamujeeb111@gmail.com');
    $mail->addCC('mdazeemkhan360@gmail.com');
    $mail->addCC('homexrepair@gmail.com');
  
  //Headers
  $mail->addCustomHeader('MIME-Version: 1.0');
$mail->addCustomHeader('Content-Type: text/html; charset=ISO-8859-1'); 

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'New Quote From '.$mobile;
    $mail->Body    = "
<html>
<head>
<title>New quote from customer</title>
<style>
body {
    background-color: #f3f2ef;
}
.center-box {
    width: auto;
    padding: 40px;
    color: #fff;
}
.call-a {
    background-color: #334575;
    color:#fff;
}
</style>
</head>
<boby>
<center>
<div class = 'call-button'>
<a class = 'call-a' href = 'tel:'.$mobile>CALL ".$mobile."</a>
</div>
</center>
</body>
</html>
";

    $mail->send();
} catch (Exception $e) {
   // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

$conn->close();
?>