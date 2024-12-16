<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail=new PHPMailer(true);
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->Username='shubham.m9022@gmail.com'; //gmail
$mail->Password='muniaiexrlbgtsrm'; //app password
$mail->SMTPSecure='tls';
$mail->Port=587;
?>
