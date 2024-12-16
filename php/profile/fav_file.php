<?php
 require '../db.php';
 $fav_id=$_POST['fav_id'];
 $fav_status=$_POST['fav_status'];
 $folder_id=$_POST['folder_id'];
 $respo=$db->query("UPDATE $folder_id SET fav_file='$fav_status' WHERE id='$fav_id'");
 if($respo)
 {echo "Success";}
 else{echo "Failed";}
 ?>