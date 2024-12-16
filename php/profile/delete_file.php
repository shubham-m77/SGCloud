<?php 
session_start();
$user_email=$_SESSION['user'];
require '../db.php';
$f_id=$_POST['f_id'];
$folder=$_POST['folder'];
$file=$_POST['file'];
$del=unlink("../../data/".$folder."/".$file);
if($del)
{$res=$db->query("DELETE FROM $folder WHERE id='$f_id'");
    if($res){$fs_sql="SELECT sum(file_size) AS usd_strg FROM $folder";
        $res=$db->query($fs_sql);
        $a_array=$res->fetch_assoc();
        $total_used_storage=$a_array['usd_strg'];
        $update_storage="UPDATE users SET used_storage='$total_used_storage' WHERE email='$user_email'";
        if($db->query($update_storage))
        {echo json_encode(array("msg"=> "File Deleted","used_storage"=>$total_used_storage));}
    else{echo json_encode(array("msg"=>"Error in Deletion"));}}
        else{echo json_encode(array("msg"=>"Deletion failed from Database"));}}
else{echo json_encode(array("msg"=>"Delete failed"));}
?>