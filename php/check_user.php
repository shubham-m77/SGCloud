<?php
require "db.php";
if ($db->connect_error) {
	echo "connection not established";
}
else{
$email=$_POST['email'];
$query="SELECT email FROM users WHERE email='$email'";
$res=$db->query($query);
if ($res->num_rows!=0) {
	echo "<i class='fa-sharp-duotone fa-solid fa-circle-xmark x-mark'></i>";

}
else{
echo "<i class='fa-sharp-duotone fa-solid fa-circle-check check-mark'></i>";

}
}
?>