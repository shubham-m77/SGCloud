<?php
require '../db.php';
session_start();
$user_email=$_SESSION['user'];
$user_sql= "SELECT * FROM users WHERE email='$user_email'";
$res=$db->query($user_sql);
$user_array=$res->fetch_assoc();
$plan=$user_array['plans'];
$storage=$user_array['storage'];

$starter_btn='<button class="btn fs-3 buy-btn my-2 buy" plan="starter" amount="129" storage="52224">&#8377; 129/M</button>';
$gold_btn='<button class="btn fs-3 buy-btn-2 my-2 buy" storage="568320" plan="gold" amount="329">&#8377; 329/M</button>';
$premium_btn='<button class="btn fs-3 buy-btn my-2 buy"  plan="premium" amount="599" storage="100000">&#8377; 599/M</button>';

if($plan == 'free'){$starter_btn='<button class="btn fs-3 buy-btn my-2 buy" plan="starter" amount="129" storage="52224">&#8377; 129/M</button>';$gold_btn='<button class="btn fs-3 buy-btn-2 my-2 buy" storage="568320" plan="gold" amount="329">&#8377; 329/M</button>';
    $premium_btn='<button class="btn fs-3 buy-btn my-2 buy"  plan="premium" amount="599" storage="100000">&#8377; 599/M</button>';
$db->query("UPDATE users SET storage='10' WHERE email='$user_email' ");}
else if($plan == 'starter'){$starter_btn='<button class="btn fs-3 buy-btn my-2 buy" plan="starter" amount="129" storage="52224" disabled>Current Plan</button>';
    $gold_btn='<button class="btn fs-3 buy-btn-2 my-2 buy"  storage="568320" plan="gold" amount="329">&#8377; 329/M</button>';
$premium_btn='<button class="btn fs-3 buy-btn my-2 buy"  storage="100000" plan="premium" amount="599">&#8377; 599/M</button>';
    $db->query("UPDATE users SET storage='52224' WHERE email='$user_email'");}
else if($plan== 'gold'){$starter_btn='<button class="btn fs-3 buy-btn my-2 buy" plan="starter" amount="129" storage="52224" disabled>&#8377; 129/M</button>';
    $gold_btn='<button class="btn fs-3 buy-btn-2 my-2 buy"  plan="gold" amount="329" storage="568320" disabled>Current Plan</button>';
    $premium_btn='<button class="btn fs-3 buy-btn my-2 buy"  plan="premium" storage="100000" amount="599">&#8377; 599/M</button>';
    $db->query("UPDATE users SET storage='568320' WHERE email='$user_email'");}
else if($plan=='premium'){$starter_btn='<button class="btn fs-3 buy-btn my-2 buy" storage="52224" plan="starter" amount="129" disabled>&#8377; 129/M</button>';
    $gold_btn='<button class="btn fs-3 buy-btn-2 my-2 buy"  plan="gold" amount="329" storage="568320" disabled>&#8377; 329/M</button>';
    $premium_btn='<button class="btn fs-3 buy-btn my-2 buy"  plan="premium" storage="100000" amount="599">Current Plan</button>';
    $db->query("UPDATE users SET storage='100000' WHERE email='$user_email'");}

?>
<h1 class="text-center text-dark my-1 pb-1 border-bottom rounded-pill border-dark">Storage Plans</h1>
<div class="row">
    <div class="col-md-4 rounded my-4">
        <div class="card text-center shadow-lg" style="background-color:#77c8ff;"><div class="card-body">
        <label class="fs-2">STARTER</label><br>
        <label class="fs-5 pb-2" >51GB Storage</label><br>
        <?php echo $starter_btn; ?>
        <hr>
        <label class="label-text">Reliable & Secure Cloud Space at Your Fingertips</label><hr>
        <label class="label-text">Effortless File Backup & Sharing in the Cloud</label><hr>
        <label class="label-text">Effortless File Management at Your Fingertips</label><hr>
        <label class="label-text">Cancel/Upgrade Plans Anytime</label><hr>
        <label class="label-text">Never Run Out of Storage Again – 51GB Included</label>
        </div>
    <div class="card-footer bg-light"><a class="btn btn-primary">Learn More</a></div></div>
    </div>
    <div class="col-md-4 rounded my-4">
        <div class="card text-center shadow card-2"><div class="card-body">
        <label class="fs-2">GOLD</label><br>
        <label class="fs-5 pb-2" >555GB Storage</label><br>
        <?php echo $gold_btn; ?>
        <hr>
        <label class="label-text">Reliable & More Secure Cloud Space at Your Fingertips</label><hr>
        <label class="label-text">Effortless File Backup & Sharing in the Cloud</label><hr>
        <label class="label-text">Golden File Management at Your Fingertips</label><hr>
        <label class="label-text">Cancel/Upgrade Plans Anytime</label><hr>
        <label class="label-text">Never Run Out of Storage Again – 555GB Included</label>
        </div>
    <div class="card-footer bg-light"><a class="btn btn-primary">Learn More</a></div></div>
    </div>
    <div class="col-md-4 rounded my-4">
        <div class="card text-center shadow card-3"><div class="card-body">
        <label class="fs-2">PREMIUM</label><br>
        <label class="fs-5 pb-2" >Unlimited Storage</label><br>
        <?php echo $premium_btn; ?>
        <hr>
        <label class="label-text">Secured Cloud Space at Your Fingertips</label><hr>
        <label class="label-text">Effortless File Backup & Sharing in the Cloud</label><hr>
        <label class="label-text">Premium File Management at Your Fingertips</label><hr>
        <label class="label-text">Cancel/Upgrade Plans Anytime</label><hr>
        <label class="label-text">Never Run Out of Storage Again – Unlimited Cloud Space</label>
        </div>
    <div class="card-footer bg-light"><a class="btn btn-primary">Learn More</a></div></div>
    </div>
</div>
<script>
$(document).ready(function(){
$(".buy").each(function(){
$(this).click(function(){
var plan=$(this).attr("plan");
var plan_strg=$(this).attr("storage");
$.ajax({
type:"POST",
url:"profile/storage.php",
data:{
  buy_plan:plan,
  plan_strg:plan_strg
},
success:function(res){
    obj=JSON.parse(res);
if(obj.msg=="Plan Changed")
{alert(obj.msg);
location.reload();
    $(".total-storage").html(obj.storage);
    $(".strg-progress-bar").css("width",per+"%");
  $(".used_strg").html(parseFloat(obj.used_storage).toFixed(2));

}
}
});
});});
});
</script>


