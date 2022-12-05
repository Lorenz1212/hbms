
<?php include_once('header.php') ?>

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
<div class="container h-100">
<div class="row h-100 align-items-end">
<div class="col-12">
<div class="breadcrumb-content d-flex align-items-center justify-content-between pb-5">
<?php
$rmid = intval($_GET['rmid']);
$sql = "SELECT tblroom.*,tblroom.id as rmid , tblcategory.Price,tblcategory.ID,tblcategory.CategoryName from tblroom 
join tblcategory on tblroom.RoomType=tblcategory.ID 

where tblroom.id=:rmid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':rmid', $rmid, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);

	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $row) {               
?>
	<h2 class="room-title"><?php echo htmlentities($row->RoomName); ?> </h2>
	<h2 class="room-price">₱ <?php echo htmlentities($row->Price); ?></h2>
</div>
</div>
</div>
</div>
</div>


<div class="roberto-rooms-area section-padding-100-0">
<div class="container">
<div class="row">
<div class="col-6 col-lg-6">

<div class="single-room-details-area mb-50">

<div class="room-thumbnail-slides mb-50">
<div id="room-thumbnail--slide" class="carousel " >
<div class="carousel-inner">
<div class="carousel-item active">
<img src="../admin/images/<?php echo $row->Image; ?>" class="d-block w-100" alt="">
</div>
<div class="carousel-item">
<img data-cfsrc="img/bg-img/49.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/49.jpg" class="d-block w-100" alt=""></noscript>
</div>
<div class="carousel-item">
<img data-cfsrc="img/bg-img/50.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/50.jpg" class="d-block w-100" alt=""></noscript>
</div>
<div class="carousel-item">
<img data-cfsrc="img/bg-img/51.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/51.jpg" class="d-block w-100" alt=""></noscript>
</div>
<div class="carousel-item">
<img data-cfsrc="img/bg-img/52.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/52.jpg" class="d-block w-100" alt=""></noscript>
</div>
</div>
<!-- <ol class="carousel-indicators">
<li data-target="#room-thumbnail--slide" data-slide-to="0" class="active">
<img data-cfsrc="img/bg-img/48.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/48.jpg" class="d-block w-100" alt=""></noscript>
</li>
<li data-target="#room-thumbnail--slide" data-slide-to="1">
<img data-cfsrc="img/bg-img/49.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/49.jpg" class="d-block w-100" alt=""></noscript>
</li>
<li data-target="#room-thumbnail--slide" data-slide-to="2">
<img data-cfsrc="img/bg-img/50.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/50.jpg" class="d-block w-100" alt=""></noscript>
</li>
<li data-target="#room-thumbnail--slide" data-slide-to="3">
<img data-cfsrc="img/bg-img/51.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/51.jpg" class="d-block w-100" alt=""></noscript>
</li>
<li data-target="#room-thumbnail--slide" data-slide-to="4">
<img data-cfsrc="img/bg-img/52.jpg" class="d-block w-100" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/52.jpg" class="d-block w-100" alt=""></noscript>
</li>
</ol> -->
</div>
</div>

<!-- <div class="room-features-area d-flex flex-wrap mb-50">
<h6>Size: <span>350-425sqf</span></h6>
<h6>Capacity: <span>Max persion 5</span></h6>
<h6>Bed: <span>King beds</span></h6>
<h6>Services: <span>Wifi, television ...</span></h6>
</div> -->
<p><?php echo htmlentities($row->RoomDesc); ?></p>
<!-- <ul>
<li><i class="fa fa-check"></i> Mauris molestie lectus in irdiet auctor.</li>
<li><i class="fa fa-check"></i> Dictum purus at blandit molestie.</li>
<li><i class="fa fa-check"></i> Neque non fermentum suscipit.</li>
<li><i class="fa fa-check"></i> Donec id dui ac massa malesuada.</li>
<li><i class="fa fa-check"></i> In sit amet sapien quis orci maximus.</li>
<li><i class="fa fa-check"></i> Vestibulum rutrum diam vel eros tristique.</li>
</ul> -->
<p>Room Facilities : <?php echo htmlentities($row->RoomFacility); ?></p>
</div>

<!-- <div class="room-service mb-50">
<h4>Room Services</h4>
<ul>
<li><img data-cfsrc="img/core-img/icon1.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/icon1.png" alt=""></noscript> Air Conditioning</li>
<li><img data-cfsrc="img/core-img/icon2.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/icon2.png" alt=""></noscript> Free drinks</li>
<li><img data-cfsrc="img/core-img/icon3.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/icon3.png" alt=""></noscript> Restaurant quality</li>
<li><img data-cfsrc="img/core-img/icon4.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/icon4.png" alt=""></noscript> Cable TV</li>
<li><img data-cfsrc="img/core-img/icon5.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/icon5.png" alt=""></noscript> Unlimited Wifi</li>
<li><img data-cfsrc="img/core-img/icon6.png" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/core-img/icon6.png" alt=""></noscript> Service 24/24</li>
</ul>
</div> -->

<?php $cnt = $cnt + 1;}} ?>	

<style>
.checked {
  color: orange;
}
</style>
<div class="room-review-area mb-100">
	<div class="reviwer-rating">
	<span id="average_rating">0.0</span> / 5</b>
		<i class="fa fa-star main_star"></i>
		<i class="fa fa-star main_star"></i>
		<i class="fa fa-star main_star"></i>
		<i class="fa fa-star main_star"></i>
		<i class="fa fa-star main_star"></i>
	<span id="total_review">0</span> Review
</div>

<div class="single-room-review-area d-flex align-items-center">
<div class="reviwer-thumbnail">
<img data-cfsrc="img/bg-img/53.jpg" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/53.jpg" alt=""></noscript>
</div>
<div class="reviwer-content">
<div class="reviwer-title-rating d-flex align-items-center justify-content-between">
<div class="reviwer-title">
<h6 id="total_five_star_review" style="padding-right: 10px;">0</h6>
</div>
<div>
<i class="fa fa-star total_five_star_review_star"></i>
<i class="fa fa-star total_five_star_review_star"></i>
<i class="fa fa-star total_five_star_review_star"></i>
<i class="fa fa-star total_five_star_review_star"></i>
<i class="fa fa-star total_five_star_review_star"></i>
</div>
</div>
</div>
</div>

<div class="single-room-review-area d-flex align-items-center">
<div class="reviwer-thumbnail">
<img data-cfsrc="img/bg-img/54.jpg" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/54.jpg" alt=""></noscript>
</div>
<div class="reviwer-content">
<div class="reviwer-title-rating d-flex align-items-center justify-content-between">
<div class="reviwer-title">
<h6 id="total_four_star_review" style="padding-right: 10px;">0</h6>
</div>
<div>
<i class="fa fa-star total_four_star_review_star"></i>
<i class="fa fa-star total_four_star_review_star"></i>
<i class="fa fa-star total_four_star_review_star"></i>
<i class="fa fa-star total_four_star_review_star"></i>
<i class="fa fa-star total_four_star_review_star"></i>
</div>
</div>
</div>
</div>

<div class="single-room-review-area d-flex align-items-center">
<div class="reviwer-thumbnail">
<img data-cfsrc="img/bg-img/54.jpg" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/54.jpg" alt=""></noscript>
</div>
<div class="reviwer-content">
<div class="reviwer-title-rating d-flex align-items-center justify-content-between">
<div class="reviwer-title">
<h6 id="total_three_star_review" style="padding-right: 10px;">0</h6>
</div>
<div >
<i class="fa fa-star total_three_star_review_star"></i>
<i class="fa fa-star total_three_star_review_star"></i>
<i class="fa fa-star total_three_star_review_star"></i>
<i class="fa fa-star total_three_star_review_star"></i>
<i class="fa fa-star total_three_star_review_star"></i>
</div>
</div>
</div>
</div>

<div class="single-room-review-area d-flex align-items-center">
<div class="reviwer-thumbnail">
<img data-cfsrc="img/bg-img/54.jpg" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/54.jpg" alt=""></noscript>
</div>
<div class="reviwer-content">
<div class="reviwer-title-rating d-flex align-items-center justify-content-between">
<div class="reviwer-title">
<h6 id="total_two_star_review" style="padding-right: 10px;">0</h6>
</div>
<div>
<i class="fa fa-star total_two_star_review_star"></i>
<i class="fa fa-star total_two_star_review_star"></i>
<i class="fa fa-star total_two_star_review_star"></i>
<i class="fa fa-star total_two_star_review_star"></i>
<i class="fa fa-star total_two_star_review_star"></i>
</div>
</div>
</div>
</div>


<div class="single-room-review-area d-flex align-items-center">
<div class="reviwer-thumbnail">
<img data-cfsrc="img/bg-img/55.jpg" alt="" style="display:none;visibility:hidden;"><noscript><img src="img/bg-img/55.jpg" alt=""></noscript>
</div>
<div class="reviwer-content">
<div class="reviwer-title-rating d-flex align-items-center justify-content-between">
<div class="reviwer-title">
<h6 id="total_one_star_review" style="padding-right: 10px;">0</h6>
</div>
<div>
<i class="fa fa-star total_one_star_review_star"></i>
<i class="fa fa-star total_one_star_review_star"></i>
<i class="fa fa-star total_one_star_review_star"></i>
<i class="fa fa-star total_one_star_review_star"></i>
<i class="fa fa-star total_one_star_review_star"></i>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 col-lg-6">

<!-- <div class="hotel-reservation--area mb-100">
<form action="#" method="post">
<div class="form-group mb-30">
<label for="checkInDate">Date</label>
<div class="input-daterange" id="datepicker">
<div class="row no-gutters">
<div class="col-6">
<input type="text" class="input-small form-control" name="checkInDate" id="checkInDate" placeholder="Check In">
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
</div> -->
<!-- <div class="col-6">
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
</div> -->
<!-- <div class="form-group mb-50">
<div class="slider-range">
<div class="range-price">Max Price: $0 - $3000</div>
<div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="3000" data-label-result="Max Price: ">
<div class="ui-slider-range ui-widget-header ui-corner-all"></div>
<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
</div>
</div>
</div> -->
<div class="form-group">
<h2 class="room-title"> <?php echo htmlentities($row->CategoryName); ?></h2>
<div class="room-features-area d-flex flex-wrap mb-50">
<h6>Max Adult: <span><?php echo htmlentities($row->MaxAdult); ?></span></h6>
<h6>Max Child: <span><?php echo htmlentities($row->MaxChild); ?></span></h6>
<h6>No of Beds: <span><?php echo htmlentities($row->NoofBed); ?></span></h6>
</div>
<a href="../book-room.php?rmid=<?php echo $row->rmid; ?>"  class="btn roberto-btn w-100">Book Now</a>
<hr>
	<h4 class="text-center">Rate the room:</h4>
		<h4 class="text-center mt-2 mb-4">
			<i class="fa fa-star  submit_star mr-1" id="submit_star_1" data-rating="1"></i>
			<i class="fa fa-star  submit_star mr-1" id="submit_star_2" data-rating="2"></i>
			<i class="fa fa-star  submit_star mr-1" id="submit_star_3" data-rating="3"></i>
			<i class="fa fa-star  submit_star mr-1" id="submit_star_4" data-rating="4"></i>
			<i class="fa fa-star  submit_star mr-1" id="submit_star_5" data-rating="5"></i>
		</h4>
		<div class="form-group">
			<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
		</div>

		<input type="hidden" name="room_id" id="room_id" class="form-control" value="<?php $parameter = $_GET['rmid'];
																						echo $parameter; ?>" />

		<div class="form-group text-center mt-4">
			<button type="button" class="btn roberto-btn w-100" id="save_review">Submit</button>
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
	<div id="review_modal" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Submit Review</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4 class="text-center">Rate the room:</h4>
					<h4 class="text-center mt-2 mb-4">
						<i class="fa fa-star  submit_star mr-1" id="submit_star_1" data-rating="1"></i>
						<i class="fa fa-star  submit_star mr-1" id="submit_star_2" data-rating="2"></i>
						<i class="fa fa-star  submit_star mr-1" id="submit_star_3" data-rating="3"></i>
						<i class="fa fa-star  submit_star mr-1" id="submit_star_4" data-rating="4"></i>
						<i class="fa fa-star  submit_star mr-1" id="submit_star_5" data-rating="5"></i>
					</h4>
					<div class="form-group">
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
					</div>

					<input type="hidden" name="room_id" id="room_id" class="form-control" value="<?php $parameter = $_GET['rmid'];
																									echo $parameter; ?>" />

					<div class="form-group text-center mt-4">
						<button type="button" class="btn btn-primary" id="save_review">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once('footer.php') ?>

<script>
		var rating_data = 0;
    var count_star_five=0;
    var count_star_four=0;
    var count_star_three=0;
    var count_star_two=0;
    var count_star_one=0;
		$('#add_review').click(function() {

			$('#review_modal').modal('show');

		});

		$(document).on('mouseenter', '.submit_star', function() {

			var rating = $(this).data('rating');

			reset_background();

			for (var count = 1; count <= rating; count++) {

				$('#submit_star_' + count).addClass('checked');

			}

		});

		function reset_background() {
			for (var count = 1; count <= 5; count++) {

				$('#submit_star_' + count).addClass('checked');

				$('#submit_star_' + count).removeClass('checked');

			}
		}

		$(document).on('mouseleave', '.submit_star', function() {

			reset_background();

			for (var count = 1; count <= rating_data; count++) {

				$('#submit_star_' + count).removeClass('checked');

				$('#submit_star_' + count).addClass('checked');
			}

		});

		$(document).on('click', '.submit_star', function() {

			rating_data = $(this).data('rating');

		});



		$('#save_review').click(function() {

			var user_name = $('#user_name').val();

			var room_id = $('#room_id').val();
			if (user_name == '') {
				alert("Please Fill Both Field");
				return false;
			} else {
				$.ajax({
					url: "../submit_rating.php",
					method: "POST",
					data: {
						rating_data: rating_data,
						user_name: user_name,
						room_id: room_id
					},
					success: function(data) {
						$('#review_modal').modal('hide');

						load_rating_data();

						alert(data);
					}
				})
			}

		});


		load_rating_data();

		function load_rating_data() {
			var room_id = $('#room_id').val();
			$.ajax({
				url: "../submit_rating.php",
				method: "POST",
				data: {
					action: 'load_data',
					room_id: room_id
				},
				dataType: "JSON",
				success: function(data) {
					$('#average_rating').text(data.average_rating);
					$('#total_review').text(data.total_review);
					$('input[name=user_name]').val("");
					$('.submit_star').removeClass('checked');
					var count_star = 0;

					$('.main_star').each(function() {
						count_star++;
						if (Math.ceil(data.average_rating) >= count_star) {
							$(this).addClass('checked');
						}
					});

					$('.total_five_star_review_star').each(function() {
						count_star_five++;
						if (Math.ceil(data.five_star_review) >= count_star_five) {

							$(this).addClass('checked');
						}
					});

					$('.total_four_star_review_star').each(function() {
						count_star_four++;
						if (Math.ceil(data.four_star_review) >= count_star_four) {
							$(this).addClass('checked');
						}
					});

					$('.total_three_star_review_star').each(function() {
						count_star_three++;
						if (Math.ceil(data.three_star_review) >= count_star_three) {
							$(this).addClass('checked');
						}
					});

					$('.total_two_star_review_star').each(function() {
						count_star_two++;
						if (Math.ceil(data.two_star_review) >= count_star_two) {
							$(this).addClass('checked');
						}
					});

					$('.total_one_star_review_star').each(function() {
						count_star_one++;
						if (Math.ceil(data.one_star_review) >= count_star_one) {
							$(this).addClass('checked');
						}
					});

					$('#total_five_star_review').text(data.five_star_review);

					$('#total_four_star_review').text(data.four_star_review);

					$('#total_three_star_review').text(data.three_star_review);

					$('#total_two_star_review').text(data.two_star_review);

					$('#total_one_star_review').text(data.one_star_review);

					// $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

					// $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

					// $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

					// $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

					// $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

				}
			})
		}
	</script>