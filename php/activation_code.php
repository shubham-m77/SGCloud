<?php
require "db.php";
if ($db->connect_error){
	die("connection not established");}
else{
$email=$_POST['email'];
$act_code=$_POST['act_code'];
$query="SELECT * FROM users WHERE email='$email' AND activation_code='$act_code'";
$response=$db->query($query);
if ($response->num_rows!= 0) {
	$update_status="UPDATE users SET status='active' WHERE email='$email'";
	if ($db->query($update_status)) {
$get_id="SELECT * FROM users WHERE email='$email'";
$id_res=$db->query($get_id);
$id_array=$id_res->fetch_assoc();
$user_t_name="user_".$id_array['u_no.'];
$user_table="CREATE TABLE $user_t_name(
id INT(11) NOT NULL AUTO_INCREMENT,
file_name VARCHAR(100),
file_size VARCHAR(100),
fav_file VARCHAR(100) DEFAULT 'no',
upload_time DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
)";
	if($db->query($user_table)){
		if(mkdir("../data/".$user_t_name))
		{echo "User Active";}
		else{echo "Folder not created";}
	}
	else{
		echo "table not created";
	}


}
else{
		echo "Not Verified !!";
}
}
else{
echo "Wrong Code Entered";
}
} 
?>