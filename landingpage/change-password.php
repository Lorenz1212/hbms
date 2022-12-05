<?php include_once('header.php') ?>
<?php

if (strlen($_SESSION['hbmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['hbmsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT ID FROM tbluser WHERE ID=:uid and Password=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where ID=:uid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':uid', $uid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo '<script>alert("Your password successully changed")</script>';
} else {
echo '<script>alert("Your current password is wrong")</script>';

}

}

}

  
  ?>



 <div class="roberto-contact-form-area section-padding-100" style="background-image: url(../images/tanginamo.jpg)">
<div class="container">
<div class="row ">
<div class="col-12">

<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
<h2 class="text-white" style="color:white">Change Password</h2>
</div>
</div>
</div>
<div class="row" >
<div class="col-12">

<div class="roberto-contact-form" style="padding-left: 250px;padding-right: 250px;">
<form action="#" method="post" >
<?php
$uid=$_SESSION['hbmsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
		<input type="password" name="currentpassword" class="form-control mb-30" placeholder="Your Current Passoword"  required="true">
	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
		<input type="password" name="newpassword" class="form-control mb-30" placeholder="Your New Password"  required="true">
	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp " data-wow-delay="100ms">
	<input type="password" name="confirmpassword" class="form-control mb-30 "  placeholder="Your Password" required="true">
	</div>
</div>
<?php $cnt=$cnt+1;}} ?>
<div class="row">
<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
 <input type="submit" value="Change" name="submit" class="btn roberto-btn mt-15">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>


 <?php include_once('footer.php') ?>