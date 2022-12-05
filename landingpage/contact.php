<?php 
 if(isset($_POST['submit']))
  {


 $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $message=$_POST['message'];

$sql="insert into tblcontact(Name,MobileNumber,Email,Message)values(:name,:phone,:email,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>

<?php include_once('header.php') ?>

<div class="breadcrumb-area contact-breadcrumb bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/18.jpg);">
<div class="container">
<div class="row">
<div class="col-12">
<div class="breadcrumb-content text-center mt-100">
<h2 class="page-title">Contact Us</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb justify-content-center">
<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
</ol>
</nav>
</div>
</div>
</div>
</div>
</div>


<section class="google-maps-contact-info">
<div class="container-fluid">
<div class="google-maps-contact-content">
<div class="row">
            <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<div class="col-6 col-lg-3">
<div class="single-contact-info">
<i class="fa fa-phone" aria-hidden="true"></i>
<h4>Phone</h4>
<p><?php  echo htmlentities($row->MobileNumber);?></p>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="single-contact-info">
<i class="fa fa-map-marker" aria-hidden="true"></i>
<h4>Address</h4>
<p><?php  echo htmlentities($row->PageDescription);?></p>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="single-contact-info">
<i class="fa fa-clock-o" aria-hidden="true"></i>
<h4>Open time</h4>
<p>10:00 am to 23:00 pm</p>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="single-contact-info">
<i class="fa fa-envelope-o" aria-hidden="true"></i>
<h4>Email</h4>
<p><?php  echo htmlentities($row->Email);?></p>
</div>
</div>
</div>
  
  <?php $cnt=$cnt+1;}} ?>


<!-- <div class="google-maps">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d82774.69671830302!2d24.077286625210185!3d56.96328499537209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2sRiga%2C+Latvia!5e0!3m2!1sen!2sbd!4v1549536732147" allowfullscreen></iframe>
</div> -->
</div>
</div>
</section>


<div class="roberto-contact-form-area section-padding-100">
<div class="container">
<div class="row">
<div class="col-12">

<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
<h6>Contact Us</h6>
<h2>Leave Message</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-12">

<div class="roberto-contact-form">
<form action="#" method="post">
<div class="row">
<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
<input type="text" name="name" class="form-control mb-30" placeholder="Your Name">
</div>
<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
<input type="text" name="phone" class="form-control mb-30" placeholder="Your Mobile Number" pattern="[0-9]+">
</div>
<div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
<input type="email" name="email" class="form-control mb-30" placeholder="Your Email">
</div>
<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
<textarea name="message" class="form-control mb-30" placeholder="Your Message"></textarea>
</div>
<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
 <input type="submit" value="send" name="submit" class="btn roberto-btn mt-15">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>


<section class="roberto-cta-area">
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
</section>


<div class="partner-area">
<div class="container">
<div class="row">
<div class="col-12">
<div class="partner-logo-content d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="300ms">

<a href="#" class="partner-logo"><img data-cfsrc="img/core-img/p1.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/p1.png" alt=""></noscript></a>

<a href="#" class="partner-logo"><img data-cfsrc="img/core-img/p2.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/p2.png" alt=""></noscript></a>

<a href="#" class="partner-logo"><img data-cfsrc="img/core-img/p3.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/p3.png" alt=""></noscript></a>

<a href="#" class="partner-logo"><img data-cfsrc="img/core-img/p4.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/p4.png" alt=""></noscript></a>

<a href="#" class="partner-logo"><img data-cfsrc="img/core-img/p5.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/p5.png" alt=""></noscript></a>
</div>
</div>
</div>
</div>
</div>

<?php include_once('footer.php') ?>