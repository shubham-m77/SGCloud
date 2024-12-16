<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGCloud - Home</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
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
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand ms-2 mb-2" href="#">
      <img src="images/logo.png" alt="" width="120px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item px-3">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item ps-3 pe-5">
          <a class="nav-link">Cloud</a>
        </li>
        <li class="nav-item px-3 rounded me-4 login_nav">
          <a class="nav-link"  id="login">Login / Register</a>
        </li>
      </ul>
    
    </div>
  </div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-6">
</div>
<div class="col-md-6">

  <!-- SignUp Form -->

<form class="signup_form rounded p-4 d-none" width="400px" autocomplete="off">
  <h1 class="text-center mb-4">Register as a new user</h1>
  <div class="mb-3 email-con">  
<label for="email" class="form-label">Email</label>
<input type="email" class="form-control" placeholder="Enter your email id" id="email" autocomplete="off">
<span class="email_checker"></span>
<i class="fa-solid fa-spinner-scale fa-spin email-load d-none"></i>
<label for="username" class="form-label">Username</label>
<input type="name" class="form-control"placeholder="Create new username" id="username" autocomplete="off" m>
  </div>
  <div class="mb-3 pass-con">  
<label for="password" class="form-label">Password</label>
<input type="password" class="form-control" placeholder="create new password" id="password" autocomplete="off">
<i class="fa-solid fa-eye show-icon d-none"></i><i class="fa-solid fa-eye-slash hide-icon"></i>
  </div>
  
  <div class="mb-3 d-flex">
<div class="form-text rnd-pass">Click to generate random passowrd.</div>
<button class="btn btn-sm btn-danger mx-2 mb-3 gen-pass">Generate</button>
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary w-50 signup_btn" disabled>Sign-up</button>
  </div>
  <h3 class="text-center form-text my-4 login-text">Already have an account? <a class="rounded-pill p-1 login_a">Log-in Now</a></h3>

</form>

<!-- Activation Form -->

<form class="act_form rounded p-4 d-none" width="400px" autocomplete="off" >
<h1 class="text-center mb-4">Verify User</h1>
<div class="mb-3 ver-con">  
<label for="act_code" class="form-label">Verification Code</label>
<input type="number" class="form-control" placeholder="Enter Activation Code" id="act_code"></div>
<div class="text-center">
<button type="submit" class="btn btn-primary w-25 act_btn">Verify</button></div>
</form>

<!-- Login Form -->

<form class="login_form rounded p-4 d-none" width="400px" autocomplete="off">
<h1 class="text-center mb-4">Sign-In</h1>
<div class="mb-3 login_email_con">  
<label for="login_email" class="form-label">Email Id</label>
<input type="email" class="form-control" placeholder="Enter email id / username" id="login_email">
<span class="login_email_checker"></span>
<i class="fa-solid fa-spinner-scale fa-spin login_email-load d-none"></i>
</div>
 
<div class="mb-3 login_pass_con"> 
<label for="login_pass" class="form-label">Password</label>
<input type="password" class="form-control" placeholder="Enter your password" id="login_pass">
<i class="fa-solid fa-eye login_show-icon d-none"></i><i class="fa-solid fa-eye-slash login_hide-icon"></i>
</div>
<div class="text-center">

<button type="submit" class="btn btn-primary w-25 login_btn" disabled>Login</button></div>
<h3 class="text-center form-text my-4 login-text">Don't have an account?<a class="rounded-pill p-1 signup_a">Back</a></h3>

</form>
</div>
</div>
</div>
<!-- jQuery Coding -->

<script>
  //Pass Generator //
$(document).ready(function(){
$(".gen-pass").click(function(a){
a.preventDefault();
$.ajax({
type:"POST",
beforeSend:function(){
$(".show-icon").removeClass("fa-solid fa-eye");
$(".show-icon").removeClass("fa-solid fa-eye-slash");
$(".show-icon").addClass("fa-solid fa-spinner fa-spin");
},
url:"php/pass_generator.php",
success:function(res){
  $(".show-icon").removeClass("fa-solid fa-spinner fa-spin");
  $(".show-icon").addClass("fa-solid fa-eye");
$(".show-icon").addClass("fa-solid fa-eye-slash");
$("#password").val(res);
$(".rnd-pass").html("Generate new");

}
});
});

$(".hide-icon").click(function(){
$("#password").attr("type","text");
$(this).addClass("d-none");
$(".show-icon").removeClass("d-none");
});

  $(".show-icon").click(function(){
$(this).addClass("d-none");
$("#password").attr("type","password");
$(".hide-icon").removeClass("d-none");
});

//Email user Loader //

  $("#email").on('input',function(){
    $(".email-load").removeClass("d-none");
  });

//User Check//

$("#email").on('change',function(){
   $.ajax({
type:"POST",
url:"php/check_user.php",
data:{email:$(this).val()},
success:function(response) {
$(".email-load").addClass("d-none");
$(".email_checker").html(response);
if (response.trim()=="<i class='fa-sharp-duotone fa-solid fa-circle-check check-mark'></i>") {
  $(".signup_btn").removeAttr("disabled");
}
else{$(".signup_btn").attr("disabled");}
}
});
});

//Signup-btn//
$(".signup_form").submit(function(x){
x.preventDefault();  
$.ajax({
type:"POST",
url:"php/register.php",
data:{email:$("#email").val(),
username:$("#username").val(),
password:$("#password").val()},
beforeSend:function(){
  $(".signup_btn").html("Please wait...");
},
success:function(response){
if (response.trim() != "Verification Code not sent, try again !!") {
  $(".signup_btn").html(response.trim());
$(".signup_form").addClass("d-none");
$(".act_form").removeClass("d-none");
}

else{alert(response);}
}
});
});

// Activation Code Coding //
$("#act_code").on('input',function(){
$(".act_btn").html("");
});
$("#act_code").on('change',function(){
$(".act_btn").html("Submit");
});


$(".act_form").submit(function(e){
e.preventDefault();
$.ajax({
type:"POST",
url:"php/activation_code.php",
data:{
email:$("#email").val(),
act_code:$("#act_code").val()
},
success:function(res){
if(res.trim()!="Wrong Code Entered")
{
  alert(res.trim());
  $(".act_form").addClass("d-none");
  $(".login_form").removeClass("d-none");

}
else{alert("wrong code entered !!");}

}
});
});

// Login Form Open //
$(".login_a").click(function(){
  $(".signup_form").addClass("d-none");
$(".login_form").removeClass("d-none");
});

// Sign-Up Form Open //
$("#login").click(function login_show(){
  $(".signup_form").removeClass("d-none");
  if($(".signup_form").class != "d-none") {
$("#login").click(function(){
  $(".signup_form").addClass("d-none");
});
  }
  login_show();});



$(".signup_a").click(function(){
  $(".login_form").addClass("d-none");
$(".signup_form").removeClass("d-none");
});

// Login Submit //
 $("#login_email").on('input',function(){
    $(".login_email-load").removeClass("d-none");
  });
  $("#login_email").on('change',function(){
    $(".login_btn").removeAttr("disabled");
    $(".login_email-load").addClass("d-none");
  });
$(".login_form").submit(function(a){
  a.preventDefault();
   $.ajax({
type:"POST",
url:"php/login.php",
data:{login_email:$("#login_email").val(),
login_pass:$("#login_pass").val()
},
beforeSend:function(){$(".login_btn").html("Checking");
$(".login_btn").attr("disabled");
},
success:function(response){
if(response.trim() != "wrong id or password")
{if(response.trim()=="Verification Status Pending !!"){
    (".login_form").addClass("d-none");
    (".act_form").removeClass("d-none");
  } 
   else if(response.trim()=="Login Success"){$(".login_btn").html("Log-in Success");
    window.location="profile.php";

}
}
else{ $(".login_email_checker").html("<i class='fa-sharp-duotone fa-solid fa-circle-x x-mark'></i>");
  alert("Entered wrong id or password");
  $(".login_btn").attr("disabled");
  $(".login_btn").html("Login");

}
}
});
});


// Login password show/hide //
$(".login_hide-icon").click(function(){
$("#login_pass").attr("type","text");
$(this).addClass("d-none");
$(".login_show-icon").removeClass("d-none");
});

  $(".login_show-icon").click(function(){
$(this).addClass("d-none");
$("#login_pass").attr("type","password");
$(".login_hide-icon").removeClass("d-none");
});
});
</script>
    
</body>
</html>