<?php
session_start();
require "db.php";
if ($db->connect_error) {
	die("connection not established");}
else{
$email=$_POST['login_email'];
$password=$_POST['login_pass'];
$query="SELECT email FROM users WHERE email='$email'";
$res=$db->query($query);
if ($res->num_rows!= 0) {

$user_check="SELECT * FROM users WHERE email='$email' and password ='$password'";
$response=$db->query($user_check);
if ($response->num_rows != 0) {
	$status_check="SELECT * FROM users WHERE email='$email' and password='$password' and status='active'";
	$res_2=$db->query($status_check);
	if ($res_2->num_rows != 0) {
		echo "Login Success";
		$_SESSION['user']=$email;
	}
	else{
	echo "Verification Status Pending !!";
	}
}
else{
echo "wrong id or password";
}

}
else{
echo "user not found";
}
}
?>