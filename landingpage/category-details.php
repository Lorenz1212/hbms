
<?php include_once('header.php') ?>
<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
<div class="container h-100">
<div class="row h-100 align-items-center">
<div class="col-12">
<div class="breadcrumb-content text-center">
<h2 class="page-title">Our Room</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb justify-content-center">
<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Room</li>
</ol>
</nav>
</div>
</div>
</div>
</div>
</div>


<div class="roberto-rooms-area section-padding-100-0">
<div class="container">
<div class="row">
<div class="col-12 col-lg-12">


<?php

	$hotel_id = intval($_GET['hotel_id']);
					$sql = "SELECT tblroom.*,tblroom.id as rmid , tblcategory.Price,tblcategory.ID,tblcategory.CategoryName from tblroom 
join tblcategory on tblroom.RoomType=tblcategory.ID 
where tblroom.hotel_type=:hotel_id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':hotel_id', $hotel_id, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);

	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $row) {               ?>
			<div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; " data-wow-delay="100ms">

			<div class="room-thumbnail">
				<img src="../admin/images/<?php echo $row->Image; ?>" alt="" style="height: 300px;width: 400px;">
				</div>
			<div class="room-content">
				<h2><?php echo htmlentities($row->RoomName); ?></h2>
				<h4>₱ <?php echo htmlentities($row->Price); ?> </h4>
				<div class="room-feature">
				<!-- <h6>Room: <span> </span></h6> -->
				<h6>Category Name: <span><?php echo htmlentities($row->CategoryName); ?></span></h6>
				<h6>Room Facilities: <span><?php echo htmlentities($row->RoomFacility); ?></span></h6>
				<!-- <h6>Services: <span>Wifi, television ...</span></h6> -->
				</div>
				<!-- <button class="btn btn-success"><a href="book-room.php?rmid=<?php echo $row->rmid; ?>">Book</a></button> -->
				<a href="room-details.php?rmid=<?php echo $row->rmid; ?>" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
				</div>

				<?php $cnt = $cnt + 1;
				}
			} ?>

</div>



<!-- <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
<ul class="pagination">
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">Next <i class="fa fa-angle-right"></i></a></li>
</ul>
</nav> -->
</div>
<!--<div class="col-12 col-lg-4">

 <div class="hotel-reservation--area mb-100">
<form action="#" method="post">
<div class="form-group mb-30">
<label for="checkInDate">Date</label>
<div class="input-daterange" id="datepicker">
<div class="row no-gutters">
<div class="col-6">
<input type="text" class="input-small form-control" id="checkInDate" name="checkInDate" placeholder="Check In">
</div>
<div class="col-6">
<input type="text" class="input-small form-control" name="checkOutDate" placeholder="Check Out">
</div>
</div>
</div>
</div> -->
<!-- <div class="form-group mb-30">
<label for="guests">Guests</label>
<div class="row">
<div class="col-6">
<select name="adults" id="guests" class="form-control">
<option value="adults">Adults</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
</select>
</div>
<div class="col-6">
<select name="children" id="children" class="form-control">
<option value="children">Children</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
</select>
</div>
</div>
</div> 
<div class="form-group mb-50">
<div class="slider-range">
<div class="range-price">Max Price: $0 - $3000</div>
<div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="3000" data-label-result="Max Price: ">
<div class="ui-slider-range ui-widget-header ui-corner-all"></div>
<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn roberto-btn w-100">Check Available</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>-->
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