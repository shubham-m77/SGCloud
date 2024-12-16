
<?php
require '../db.php';
session_start();
$user_email=$_SESSION['user'];
$user_sql= "SELECT * FROM users WHERE email='$user_email'";
$res=$db->query($user_sql);
$user_array=$res->fetch_assoc();
$id="user_".$user_array['u_no.'];
$storage=$user_array['storage'];
$search=$_POST['search_text'];
?>
<h2 class="text-center text-dark my-1 border-bottom rounded-pill border-dark">Searched Files</h2>
<div class="row">
      <?php
      $file_data="SELECT * FROM $id WHERE file_name LIKE '%$search%'";
      $file_res=$db->query($file_data);
      while($file_array = $file_res->fetch_assoc())
      {$fd_array=pathinfo($file_array['file_name']);
      $basename=$fd_array['basename'];
      $filename=$fd_array['filename'];
      $file_id=$file_array['id'];
      $extension=$fd_array['extension'];
      echo '<div class="col-md-4 px-4 my-2">
      <div class="d-flex align-items-center p-2 mb-2 border rounded shadow ">
      <div class="me-3">';
      if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp" || $extension == "gif" || $extension=="svg") {
        echo "<img src='../data/" .$id."/".$basename."' class='jpg-icon'>";
    } elseif ($extension == "mp4") {
        echo "<i class='fa-solid fa-file-mp4 icon'></i>";
    } elseif ($extension == "docx" || $extension == "doc" || $extension == "pdf") {
        echo "<i class='fa-solid fa-file-doc icon'></i>";
    } elseif ($extension == "xlsx" || $extension == "xls") {
        echo "<i class='fa-solid fa-file-spreadsheet icon'></i>";
    } elseif ($extension == "ppt" || $extension == "pptx") {
        echo "<i class='fa-solid fa-file-ppt icon'></i>";
    }

      echo '</div>
      <div class="w-100">
      <p>'.$filename.'</p>
      <hr>
      <div class="d-flex justify-content-around w-100">
<a href="../data/'.$id.'/'.$basename.'" target="blank"><i class="fa-duotone fa-solid fa-eye view-icon"></i></a>';
  if($file_array['fav_file'] =='yes')
      {echo '<a href="" class="fav-a"><i class="fa-solid fa-heart fav-icon" status="no" id="'.$file_id.'" folder="'.$id.'"></i></a>';}
      else{echo '<a href=""><i class="fa-duotone fa-regular fa-heart fav-icon" id="'.$file_id.'" status="yes" folder="'.$id.'" style="--fa-secondary-color: #99aac7; --fa-secondary-opacity: 0.8;"></i></a>';}
echo'<a href="../data/'.$id.'/'.$basename.'" download><i class="fa-duotone fa-solid fa-download download-icon"></i></a>
<a href=""><i class="fa-duotone fa-solid fa-trash del-icon" f_id="'.$file_id.'" folder="'.$id.'" file="'.$basename.'"></i></a>
      </div>
      </div>
      </div>
      </div>';
    
      }
      ?>
<!-- Jquery  Deletion file-->
<script>
$(document).ready(function(){
$(".del-icon").each(function(){
$(this).click(function(a){
    a.preventDefault();
var f_id=$(this).attr("f_id");
var folder=$(this).attr("folder");
var file=$(this).attr("file");
$.ajax({
    type:"POST",
    url:"profile/delete_file.php",
    data:{
        f_id:f_id,
        folder:folder,
        file:file
    },
    success:function(response){
        obj=JSON.parse(response);
        if(obj.msg =="File Deleted")
    {var per=(obj.used_storage*100)/<?php echo $storage;?>;
  $(".strg-progress-bar").css("width",per+"%");
  $(".used_strg").html(parseFloat(obj.used_storage).toFixed(2));
  my_files();}
  else{alert("File not Deleted");}
    }
});
});
});
function my_files(){
    $(".my-files").click();}

    // Favourite File Coding//
  $(".fav-icon").each(function(){
    $(this).click(function(a){
        a.preventDefault();
        fav_id=$(this).attr('id');
        fav_status=$(this).attr('status');
        folder_id=$(this).attr('folder');
    $.ajax({
        type:"POST",
        url:"profile/fav_file.php",
        data:{fav_id:fav_id,
            fav_status:fav_status,
            folder_id:folder_id
        },
        success:function(response){
            if(response.trim()=="Success"){
                my_files();
                
            }
            else{
                alert(response);
            }
            
        }
    });});
    
    
    
    });
}); 

</script>
