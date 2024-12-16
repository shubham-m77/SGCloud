<?php
require '../db.php';
session_start();
$user_email=$_SESSION['user'];
$file=$_FILES['data'];
$filename=strtolower($file['name']);
$location=$file['tmp_name'];
$filesize=round($file['size']/1024/1024,2);
$get_details="SELECT * FROM users WHERE email='$user_email'";
$res=$db->query($get_details);
$user_data=$res->fetch_assoc();
$total_storage=$user_data['storage'];
$used_storage=$user_data['used_storage'];
$user_id="user_".$user_data['u_no.'];
$active_space=$total_storage-$used_storage;
if($filesize<=$active_space)
{if(file_exists("../../data/".$user_id."/".$filename))
{echo json_encode(array("msg" => "File Already Exists !!"));}
else{
    $upload=move_uploaded_file($location,"../../data/".$user_id."/".$filename);
    if($upload){
       $store_file="INSERT INTO $user_id(file_name,file_size)
       VALUES('$filename','$filesize')";
       if($db->query($store_file))
       {
        $fs_sql="SELECT sum(file_size) AS usd_strg FROM $user_id";
        $res=$db->query($fs_sql);
        $a_array=$res->fetch_assoc();
        $total_used_storage=round($a_array['usd_strg'],2);
        $update_storage="UPDATE users SET used_storage='$total_used_storage' WHERE email='$user_email'";
        if($db->query($update_storage))
        {
        echo json_encode(array("msg"=> "File Uploaded","used_storage"=>$total_used_storage));
        }
        else{echo json_encode(array("msg"=> "File Not Updated"));}

       }
       else{echo json_encode(array("msg"=> "File Not Stored in Database"));}
       
    }
    else{echo json_encode(array("msg"=> "Upload Failed !!"));}

}
}
else{echo json_encode(array("msg"=> "File is too large, Please Purchase More Space "));}

?>

