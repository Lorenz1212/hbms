<?php include_once('header.php') ?>
<?php
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $mobno = $_POST['mobno'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $ret = "select Email from tbluser where Email=:email";
  $query = $dbh->prepare($ret);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() == 0) {
    $sql = "Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      echo "<script>alert('You have successfully registered with us');</script>";
    } else {
      echo "<script>alert('Something went wrong.Please try again');</script>";
    }
  } else {
    echo "<script>alert('Email-id already exist. Please try again');</script>";
  }
}
?>
<style>
	.login {
  overflow: hidden;
  background-color: dimgray;
  padding: 40px 30px 30px 30px;
  border-radius: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
  -moz-transition: -moz-transform 300ms, box-shadow 300ms;
  transition: transform 300ms, box-shadow 300ms;
  box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
}


</style>



<div class="roberto-contact-form-area section-padding-100" style="background-image: url(../images/tanginamo.jpg)">
<div class="container">
<div class="row ">
<div class="col-12">

<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
<h2 class="text-white" style="color:white">Sign Up</h2>
</div>
</div>
</div>
<div class="row" >
<div class="col-12">

<div class="roberto-contact-form" style="padding-left: 250px;padding-right: 250px;">
<form action="#" method="post" >
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
		<input type="text" name="fname" class="form-control mb-30" placeholder="Your Name" required="true">
	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
		<input type="text" name="mobno" class="form-control mb-30"  placeholder="Your Mobile Number" required="true" maxlength="11" pattern="[0-9]+">
	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
		<input type="email" name="email" class="form-control mb-30" placeholder="Your Email" required="true">
	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-12 wow fadeInUp " data-wow-delay="100ms">
	<input type="password" name="password" class="form-control mb-30 " placeholder="Your Password" required="true">
	</div>
</div>
<div class="row">
<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
 <input type="submit" value="Sign Up" name="submit" class="btn roberto-btn mt-15">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>


<!-- <section class="roberto-cta-area">
<div class="container">
<div class="cta-content bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/1.jpg);">
<div class="row align-items-center">
<div class="col-12 col-md-7">
<div class="cta-text mb-50">
<h2>Contact us now!</h2>
<h6>Contact (+12) 345-678-9999 to book directly or for advice</h6>
</div>
</div>
<div class="col-12 col-md-5 text-right">
<a href="#" class="btn roberto-btn mb-50">Contact Now</a>
</div>
</div>
</div>
</div>
</section> -->



<?php include_once('footer.php') ?>