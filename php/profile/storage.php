<?php
require '../db.php';
session_start();
$user_email=$_SESSION['user'];
$buy_plan=$_POST['buy_plan'];
$plan_strg=$_POST['plan_strg'];
$respo=$db->query( "UPDATE users SET plans='$buy_plan', storage='$plan_strg' WHERE email='$user_email'");
if($respo==true){
    echo json_encode(array("msg"=> "Plan Changed","storage"=>$plan_strg));

}
else{
    echo json_encode(array("msg"=> "Plan Changing Failed !!"));
}
?>