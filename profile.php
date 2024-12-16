<?php 
session_start();
 if (empty($_SESSION['user'])) {
 	header("Location:index.php");
 } 
 require 'php/db.php';
 $user_email=$_SESSION['user'];
 $user_sql= "SELECT * FROM users WHERE email='$user_email'";
 $res=$db->query($user_sql);
 $user_array=$res->fetch_assoc();
$username=$user_array['username'];
$id="user_".$user_array['u_no.'];
$storage=$user_array['storage'];
$used_storage=round($user_array['used_storage'],2);
$used_storage_percent=round(($used_storage*100)/$storage,2);
$active_storage=($storage-$used_storage);
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link
      rel="stylesheet"
      data-purpose="Layout StyleSheet"
      title="Web Awesome"
      href="/css/app-wa-4605c815f1874757bc9ac33aa114fb0f.css?vsn=d">
<link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-thin.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-solid.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-light.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-thin.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-solid.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-light.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-thin.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-light.css"
      >
      <link href="images/logo.png">
<style>
  body{margin:0;padding:0;overflow-x: hidden;}
  *{box-sizing:border-box;}
.left-box{width:20%;height:100vh;background-color: #002b38;overflow-y: auto;}
.right-box{width:80%;background-color: #d9f3ff;margin-left:20%;height:100vh;}
.search{border:none;}
*{font-family:poppins;}
.profile-pic{width:120px;height: 120px;border: solid 2px #8cff9c; border-radius:50%;overflow: hidden;}
.user-icon{color:white;font-size:100px;cursor: pointer;}
.line{width:100%;border-color:#8cff9c;background: inherit;}
.logout-btn{margin-top:80px;}
.logout-btn i{font-size: 20px;padding-top:2px;padding-left: 4px;}
.strg-progress{width:80%;}
.upld-progress{width:60%;margin-top:12px;}
.strg-text{font-size:24px;margin-top: -10px;}
.strg-progress-bar{background: rgb(0,255,145);
  background: linear-gradient(90deg, rgba(0,255,145,0.8883928571428571) 0%, rgba(5,233,255,1) 100%, rgba(220,255,5,1) 100%);}
.upld-progress-bar{background: rgb(0,255,76);
  background: linear-gradient(90deg, rgba(0,255,76,0.8883928571428571) 0%, rgba(5,255,223,1) 100%, rgba(220,255,5,1) 100%);}
  .icon{font-size:60px;}
  .jpg-icon{width:60px;}
  .logo{width: 70%;}
  .left-menu{color: white;list-style: none;margin-top: 14px;padding:0;width:100%;}
  .left-menu li{font-size: 18px;font-family:montserrat;}
  .menu:hover{color:#33616d;background-color: #d9f3ff;cursor: pointer;transition: linear 0.2s;}
  .msg{display: flex;align-items: center;justify-content: center;}
  .loader-icon{font-size: 30px;}
  .buy-btn{background: rgb(0,94,198);border:none;color:#f2efef;
    background: linear-gradient(90deg, rgba(0,94,198,1) 0%, rgba(1,182,230,1) 100%);}
    .label-text{font-size:13px;}
    .card{border:none;}
    .card-2{background: rgb(255,246,52);border:none;
      background: linear-gradient(90deg, rgba(255,246,52,1) 0%, rgba(255,190,7,1) 100%);}
      .card-3{background: rgb(22,255,108);border:none;
        background: linear-gradient(90deg, rgba(22,255,108,1) 0%, rgba(105,255,170,1) 100%);}
.buy-btn-2{background: rgb(255,76,22);border:none;color:#f2efef;
  background: linear-gradient(90deg, rgba(255,76,22,1) 0%, rgba(255,0,0,1) 100%);}
  .heading{border-bottom:solid 2px #003887;border-radius: 14px;width:33%;padding-bottom:5px;}
  .buy-btn:hover{background: rgb(0,62,130);color:white;
background: linear-gradient(266deg, rgba(0,62,130,1) 0%, rgba(6,108,135,1) 100%);transition: linear 0.2s;}
  .buy-btn-2:hover{background: rgb(167,0,0);color:white;
    background: linear-gradient(266deg, rgba(167,0,0,1) 0%, rgba(179,41,0,1) 100%);transition: linear 0.2s;}
    a{text-decoration:none;color:none;cursor:pointer;}
    .fav-icon{cursor:pointer;}
    .fav-a{color:red;}
    /*Mobile Responsive*/
@media (max-width:992px)
{
  .mobile-left-box{width:0;height:100vh;background-color: #002b38;top:0;left:0;overflow: hidden;position:fixed;}
  .right-box{width:100%;margin-left:0;}
  .logout-btn{margin-top:8px;--bs-btn-padding-x: 8px;margin-left:8px;}
  .logout-btn i{padding:0px;}
  .logo{width:125%;}
  .nav_menu{flex-wrap:nowrap;}
  .navbar-brand{margin-right:none;margin-left:5%}
  .container-fluid{width: 200%;}
  .close_bar{float:right;margin-right:8px}
  .row{--bs-gutter-x:none;}
  .search{width:100%;padding-right:30px;}
  .search-icon{position:absolute;border:none;background-color:none;padding: none;
    top: 50%;
    right: 0px;
    transform: translateY(-50%);}
  .search-container{
    position: relative;
    display: inline-block;
    width: 100%;}
}

</style>
<link href="images/logo.png">
</head>
<body>
<div class="row main-container">
<div class="left-box fixed-top d-none d-lg-block">
	<div class="text-center d-flex pt-3 align-items-center justify-content-center flex-column">
<div class="profile-pic" title="Upload Profile Pic"><i class="fa-duotone fa-solid fa-user user-icon mt-4"></i></div>
<span class="profile-name text-light mt-2 fs-5"><?php echo '@'.$username; ?></span>
<hr class="line">
<button class="btn btn-light rounded-pill upload-btn">Upload Files  <i class="fa-duotone fa-regular fa-arrow-up"></i></button>
<div class="progress rounded upld-progress bg-light d-none">
  <div class="progress-bar upld-progress-bar"></div>
</div>
<hr class="line">
<span class="text-white strg-text py-1">Storage <i class="fa-duotone fa-solid fa-database" style="--fa-secondary-color: #7aabff; --fa-secondary-opacity: 0.8;"></i></span>
<div class="progress rounded-pill strg-progress">
  <div class="progress-bar strg-progress-bar" style="width:<?php echo $used_storage_percent;?>%"></div>
</div>
<span class="text-light my-1"><span class="used_strg"><?php echo $used_storage; ?></span>MB / <?php echo $storage; ?>MB</span>
<ul class="left-menu">
  <li class="menu mb-1 my-files" p_link="my_files">MY FILES <i class="fa-duotone fa-solid fa-folders"></i></li>
  <li class="menu mb-1 fav-files" p_link="fav_page">FAV FILES <i class="fa fa-solid fa-heart"></i></li>
  <li class="menu" p_link="buy_storage">STORAGE PLANS <i class="fa-brands fa-google-drive"></i></li>
</ul>
<a class="btn btn-light rounded logout-btn" href="profile/logout.php" >Logout<i class="fa-duotone fa-solid fa-left-from-bracket "></i></a>
</div>
</div>
<!-- Mobile Menu-->
<div class="mobile-left-box d-block d-lg-none">
<a class="btn btn-light rounded logout-btn" href="profile/logout.php" title="Logout"><i class="fa-duotone fa-solid fa-left-from-bracket "></i></a>
<i class="fa-solid fa-xmark fs-2 text-light close_bar py-2"></i>
	<div class="text-center d-flex align-items-center justify-content-center flex-column">
<div class="profile-pic" title="Upload Profile Pic"><i class="fa-duotone fa-solid fa-user user-icon mt-4"></i></div>
<span class="profile-name text-light mt-2 fs-5"><?php echo '@'.$username; ?></span>
<hr class="line">
<button class="btn btn-light rounded-pill upload-btn">Upload Files  <i class="fa-duotone fa-regular fa-arrow-up"></i></button>
<div class="progress rounded upld-progress bg-light d-none">
  <div class="progress-bar upld-progress-bar"></div>
</div>
<hr class="line">
<span class="text-white strg-text py-1">Storage <i class="fa-duotone fa-solid fa-database" style="--fa-secondary-color: #7aabff; --fa-secondary-opacity: 0.8;"></i></span>
<div class="progress rounded-pill strg-progress">
  <div class="progress-bar strg-progress-bar" style="width:<?php echo $used_storage_percent;?>%"></div>
</div>
<span class="text-light my-2"><span class="used_strg"><?php echo $used_storage; ?></span>MB / <span class="total-storage"><?php echo $storage; ?></span>MB</span>
<ul class="left-menu">
  <li class="menu mb-2 my-files mobile-menu" p_link="my_files">MY FILES <i class="fa-duotone fa-solid fa-folders"></i></li>
  <li class="menu mb-2 fav-files mobile-menu" p_link="fav_page">FAV FILES <i class="fa fa-solid fa-heart"></i></li>
  <li class="menu mb-1 mobile-menu" p_link="buy_storage">STORAGE PLANS <i class="fa-brands fa-google-drive"></i></li>
</ul>
</div>
</div>
 <!--Mobile Menu end-->
<div class="right-box"><nav class="navbar navbar-expand-lg bg-body-tertiary p-2 shadow sticky-top nav_menu">
<i class="fa-solid fa-bars fs-2 py-2 d-block d-lg-none open_bar"></i>
  <a class="navbar-brand" href="#">
      <img src="images/logo.png" alt="" class="logo"></a>
  <div class="container-fluid"> 
      <form class="d-flex ms-auto search-form" role="search">
      <input class="form-control me-2 search d-none d-lg-block" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary d-none d-lg-block" type="submit">Search</button>
        <!-- Mobile Search -->
        <div class="search-container d-block d-lg-none">
        <input class="form-control me-2 search d-block d-lg-none" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary d-block d-lg-none search-icon" type="submit"><i class="fa-duotone fa-solid fa-magnifying-glass"></i></button>
        </div>
      </form>
    </div></nav>
    <p class="px-3 paragraph py-3">
      
    </p>
    <div class="msg d-none"></div>
    </div>
  
  </div>
</div>
</div>

<script>
  // Upload //
  $(document).ready(function(){
$(".upload-btn").click(function(){
  var input=document.createElement("INPUT");
  input.setAttribute("type","file");
  input.click();
  input.onchange=function(){
    var file= new FormData();
    file.append('data',input.files[0]);
    var file_size=Math.floor(input.files[0].size/1024/1024);
    var active_storage=<?php echo $active_storage?>;
    if(file_size < active_storage)
  {function handleError(response) {
    const defaultErrors = {
        400: "Bad Request - The server could not understand the request.",
        401: "Unauthorized - You are not authorized to perform this action.",
        403: "Forbidden - Access to the requested resource is denied.",
        404: "Not Found - The requested resource could not be found.",
        500: "Internal Server Error - Something went wrong on the server.",
        0: "Network Error - Please check your internet connection."
    };
    return defaultErrors[response.status] || response.statusText || "Unknown Error.";
}

    $.ajax({
type:"POST",
url:"php/profile/upload.php",
data:file,
cache:false,
processData:false,
contentType:false,
xhr:function(){
var request=new XMLHttpRequest();
request.upload.onprogress=function(a){
  var loaded=(a.loaded/1024/1024).toFixed(2);
  var total=(a.total/1024/1024).toFixed(2);
  var upld_percent=((loaded*100)/total).toFixed(0);
$(".upld-progress").removeClass("d-none");
$(".upld-progress-bar").css("width",upld_percent+"%");
$(".upld-progress-bar").html(upld_percent+"%");
}
return request;
},
success:function(response){
  $(".upld-progress").addClass("d-none");
  var obj=JSON.parse(response);
 if(obj.msg != "Upload Failed !!")
 {var per=(obj.used_storage*100)/<?php echo $storage;?>;
  $(".strg-progress-bar").css("width",per+"%");
  $(".used_strg").html(parseFloat(obj.used_storage).toFixed(2));
  my_files();
}
 else{
  alert(obj.msg);
 }
},
error: function (xhr) {
  alert(handleError(xhr));}
    })}
    else{
      alert("File is too large, Please Purchase More Space");
    }
    ;}
});

// Menu Function
$(".menu").each(function(){
  $(this).click(function(){
    var page_link=$(this).attr("p_link");
    $.ajax({
      type:"POST",
      url:"php/profile/"+page_link+".php",
      beforeSend:function(){
        $(".msg").removeClass("d-none");
        $(".msg").html("<i class='fa-duotone fa-solid fa-loader fa-spin loader-icon'></i>")
      },
      success:function(res){
        $(".msg").addClass("d-none");
        $(".paragraph").html(res);
      }
    });
  });
});
function my_files(){
$(".my-files").click();}
my_files();

//Menu Toggle
$(".open_bar").click(function(){
  $(".mobile-left-box").css({"width":"75%","z-index":"10","transition": "0.2s ease-in"});
  $(".right-box").css("z-index","-1");
});

$(".close_bar").click(function(){
$(".mobile-left-box").css({"width":"0","z-index":"0","transition": "0.2s ease-in-out"});
$(".right-box").css("z-index","0");
});

$(".mobile-menu").each(function(){
  $(this).click(function(){
    $(".mobile-left-box").css({"width":"0","z-index":"0","transition": "0.2s ease-in-out"});
    $(".right-box").css("z-index","0");
  });});

  //Search function
  $(".search-form").submit(function(e){
    e.preventDefault();
    var search_text= $(".search").val();
    $.ajax({
      type:"POST",
      url:"php/profile/search.php",
      beforeSend:function(){
        $(".msg").removeClass("d-none");
        $(".msg").html("<i class='fa-duotone fa-solid fa-loader fa-spin loader-icon'></i>")
      },
      data:{
        search_text:search_text
      },
      success:function(res){
        $(".msg").addClass("d-none");
        $(".paragraph").html(res);
      }
    });
  });
  });


</script>
</body>
</html>