<?php
session_start();
error_reporting(0);

include('../includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/roberto/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 05:03:19 GMT -->
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Roberto - Hotel &amp; Resort HTML Template</title>

<!-- <link rel="icon" href="img/core-img/favicon.png"> -->

<link rel="stylesheet" href="style.css">
<script nonce="4c62b7e9-93e4-4ec1-b4a4-18e41c5dae0e">(function(w,d){!function(cM,cN,cO,cP){cM.zarazData=cM.zarazData||{};cM.zarazData.executed=[];cM.zaraz={deferred:[],listeners:[]};cM.zaraz.q=[];cM.zaraz._f=function(cQ){return function(){var cR=Array.prototype.slice.call(arguments);cM.zaraz.q.push({m:cQ,a:cR})}};for(const cS of["track","set","debug"])cM.zaraz[cS]=cM.zaraz._f(cS);cM.zaraz.init=()=>{var cT=cN.getElementsByTagName(cP)[0],cU=cN.createElement(cP),cV=cN.getElementsByTagName("title")[0];cV&&(cM.zarazData.t=cN.getElementsByTagName("title")[0].text);cM.zarazData.x=Math.random();cM.zarazData.w=cM.screen.width;cM.zarazData.h=cM.screen.height;cM.zarazData.j=cM.innerHeight;cM.zarazData.e=cM.innerWidth;cM.zarazData.l=cM.location.href;cM.zarazData.r=cN.referrer;cM.zarazData.k=cM.screen.colorDepth;cM.zarazData.n=cN.characterSet;cM.zarazData.o=(new Date).getTimezoneOffset();if(cM.dataLayer)for(const cZ of Object.entries(Object.entries(dataLayer).reduce(((c_,da)=>({...c_[1],...da[1]})))))zaraz.set(cZ[0],cZ[1],{scope:"page"});cM.zarazData.q=[];for(;cM.zaraz.q.length;){const db=cM.zaraz.q.shift();cM.zarazData.q.push(db)}cU.defer=!0;for(const dc of[localStorage,sessionStorage])Object.keys(dc||{}).filter((de=>de.startsWith("_zaraz_"))).forEach((dd=>{try{cM.zarazData["z_"+dd.slice(7)]=JSON.parse(dc.getItem(dd))}catch{cM.zarazData["z_"+dd.slice(7)]=dc.getItem(dd)}}));cU.referrerPolicy="origin";cU.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(cM.zarazData)));cT.parentNode.insertBefore(cU,cT)};["complete","interactive"].includes(cN.readyState)?zaraz.init():cM.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body>
<div id="preloader">
<div class="loader"></div>
</div>

<header class="header-area">

<div class="search-form d-flex align-items-center">
<div class="container">
<form action="https://preview.colorlib.com/theme/roberto/index.html" method="get">
<input type="search" name="search-form-input" id="searchFormInput" placeholder="Type your keyword ...">
<button type="submit"><i class="icon_search"></i></button>
</form>
</div>
</div>

<div class="top-header-area">
<div class="container">
<div class="row">
<div class="col-6">
<div class="top-header-content">
<a href="#"><i class="icon_phone"></i> <span>(123) 456-789-1230</span></a>
<a href="#"><i class="icon_mail"></i> <span><span class="__cf_email__" data-cfemail="99f0f7fff6b7faf6f5f6ebf5f0fbd9fef4f8f0f5b7faf6f4">[email&#160;protected]</span></span></a>
</div>
</div>
<div class="col-6">
<div class="top-header-content">

<!-- <div class="top-social-area ml-auto">
<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
</div> -->
</div>
</div>
</div>
</div>
</div>


<div class="main-header-area">
<div class="classy-nav-container breakpoint-off">
<div class="container">

<nav class="classy-navbar justify-content-between" id="robertoNav">

<a class="nav-brand" href="index.php">
<img src="../images/logoo.png" img="" align="left-content" width="60" height="60">
Hotel Reservation
</a>

<div class="classy-navbar-toggler">
<span class="navbarToggler"><span></span><span></span><span></span></span>
</div>

<div class="classy-menu">

<div class="classycloseIcon">
<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
</div>

<div class="classynav">
<ul id="nav">
<!-- <li class="active"><a href="index-2.html">Home</a></li> -->
<li class="active"><a href="index.php">Facilities</a></li>
<li><a href="#">Campus</a>
<ul class="dropdown">
	 <?php
        $ret = "SELECT * from tblhotel";
        $query1 = $dbh->prepare($ret);
        $query1->execute();
        $resultss = $query1->fetchAll(PDO::FETCH_OBJ);
        foreach ($resultss as $rows) {               ?>
          <li><a href="category-details.php?hotel_id=<?php echo htmlentities($rows->hotel_id) ?>"><?php echo htmlentities($rows->hotel_name) ?></a></li>
        <?php } ?>
</ul>
</li>


<li><a href="../gallery.php">Gallery</a></li>
<li><a href="contact.php">Contact</a></li>
<?php 
if($_SESSION['login'] == false){
  echo '<li><a href="signup.php">Sign Up</a></li>
<li><a href="signin.php">Login</a></li>';
}else{
  echo '
    <li><a href="#">My Account</a>
      <ul class="dropdown">
        <li><a href="profile.php">Profile</a></li>
        <li><a href="my-booking.php">My Booking</a></li>
        <li><a href="change-password.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </li>';
}
?>

</ul>

<!-- <div class="search-btn ml-4">
<i class="fa fa-search" aria-hidden="true"></i>
</div> -->

<!-- <div class="book-now-btn ml-3 ml-lg-5">
<a href="#">Book Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
</div> -->
</div>

</div>
</nav>
</div>
</div>
</div>
</header>