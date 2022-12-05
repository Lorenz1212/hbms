<?php include_once('header.php') ?>
<?php

if (strlen($_SESSION['hbmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['hbmsuid'];
    $AName=$_POST['fname'];
  $mobno=$_POST['mobno'];
  $sql="update tbluser set FullName=:name,MobileNumber=:mobilenumber where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$AName,PDO::PARAM_STR);
     $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Profile has been updated")</script>';
    }
     

 }
 ?>



 <div class="roberto-contact-form-area section-padding-100" style="background-image: url(../images/tanginamo.jpg)">
<div class="container">
<div class="row ">
<div class="col-12">

<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
<h2 class="text-white" style="color:white">User Profile</h2>
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
		<input type="text" name="fname" value="<?php  echo $row->FullName;?>" class="form-control mb-30" placeholder="Your Name" required="true">
	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
		<input type="text" name="mobno" class="form-control mb-30" value="<?php  echo $row->MobileNumber;?>"  placeholder="Your Mobile Number" required="true" maxlength="11" pattern="[0-9]+">
	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
		<input type="email" name="email" class="form-control mb-30" placeholder="Your Email" value="<?php  echo $row->Email;?>" required="true">
	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp " data-wow-delay="100ms">
	<input type="password" name="password" class="form-control mb-30 " value="<?php  echo $row->RegDate;?>" placeholder="Your Password" required="true">
	</div>
</div>
<?php $cnt=$cnt+1;}} ?>
<div class="row">
<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
 <input type="submit" value="Update" name="submit" class="btn roberto-btn mt-15">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>


 <?php include_once('footer.php') ?>