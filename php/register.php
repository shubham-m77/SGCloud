<?php
require 'email_sender.php';
require "db.php";
if ($db->connect_error) {
	die("connection not established");}
else{
$patterns="0123456789";
$lenth=strlen($patterns);
$ver_code=[];
for ($i=0; $i<6 ; $i++) { 
	$random=rand(0,$lenth);
	$ver_code[]=$patterns[$random];
}
$v_code= implode($ver_code);
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$query="SELECT email FROM users WHERE email='$email'";
$res=$db->query($query);
if ($res->num_rows!= 0) {
	echo "<i class='fa-sharp-duotone fa-solid fa-circle-xmark x-mark'></i>";
}
else{
  $mail->setFrom('shubham.m9022@gmail.com','SGCloud');
  $mail->addReplyTo('shubham.m9022@gmail.com','SGCloud');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject='Activation Code';
$mail->Body='Thank you for registering with us. Your Activation Code is -'.$v_code;
if($mail->send())
 {
  $store="INSERT INTO users(username,email,password,activation_code)
  VALUES('$username','$email','$password','$v_code')";
  if($db->query($store))
   {echo "Data Stored";}
  else{
echo "Data not Stored !!";
}
}
else{echo "Verification Code not sent, try again !!";}
}
}
?>