<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');


?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UNIVERSITY INN HOTEL | Hotel :: Single Rooms</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/lightbox.css">

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function() {
			$("#slider").responsiveSlides({
				auto: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				pager: true,
			});
		});
	</script>

</head>

<body>
	<!--header-->
	<div class="header head-top">
		<div class="container">
			<?php include_once('includes/header.php'); ?>
		</div>
	</div>
	<!--header-->
	<!--rooms-->
	<div class="content">
		<div class="room-section">
			<div class="container">
				<h2>Rooms Details</h2>
				<div class="room-grids">
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
						foreach ($results as $row) {               ?>
							<div class="room1">
								<div class="row">
									<div class="col-md-5 room-grid" style="padding-bottom: 50px">
										<a href="#" class="mask">
											<img style="width:100%" src="admin/images/<?php echo $row->Image; ?>" class=" mask img-responsive zoom-img" alt="" /></a>
											<div style="margin-left: 3.4in; margin-top:10px">
											<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
										<button class="btn btn-success"><a href="book-room.php?rmid=<?php echo $row->rmid; ?>">Book</a></button>
											</div>

									</div>
									<div class="col-md-7 room-grid1">
										<h4> <?php echo htmlentities($row->RoomName); ?> <i> (<?php echo htmlentities($row->CategoryName); ?>)</i></h4>
										<h4> <?php echo htmlentities($row->FacilityTitle); ?> </h4>
										<p><?php echo htmlentities($row->RoomDesc); ?></p>
										<p>Max Adult: <?php echo htmlentities($row->MaxAdult); ?></p>
										<p>Max Child: <?php echo htmlentities($row->MaxChild); ?></p>
										<p>No of Beds: <?php echo htmlentities($row->NoofBed); ?></p>
										<p>Room Facilities: <?php echo htmlentities($row->RoomFacility); ?></p>
										<p>Price: <?php echo htmlentities($row->Price); ?></p>
										<p>Rating: <b><span id="average_rating">0.0</span> / 5</b>
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<span id="total_review">0</span> Review
										<div class="col-sm-4">
											<p>
											<div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

											<div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
											</div>
											</p>
											<p>
											<div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

											<div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
											</div>
											</p>
											<p>
											<div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

											<div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
											</div>
											</p>
											<p>
											<div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

											<div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
											</div>
											</p>
											<p>
											<div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

											<div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
											<div class="progress">
												<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
											</div>
											</p>
					
										</div>
										</p>
										<br>
										
									</div>


									<div class="clearfix"></div>
								</div>

								<br>
								<hr>
							</div><?php $cnt = $cnt + 1;
								}
							} ?>


					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--rooms-->
		<?php include_once('includes/getintouch.php'); ?>
	</div>
	<!--footer-->
	<?php include_once('includes/footer.php'); ?>

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
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
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
	<script>
		var rating_data = 0;

		$('#add_review').click(function() {

			$('#review_modal').modal('show');

		});

		$(document).on('mouseenter', '.submit_star', function() {

			var rating = $(this).data('rating');

			reset_background();

			for (var count = 1; count <= rating; count++) {

				$('#submit_star_' + count).addClass('text-warning');

			}

		});

		function reset_background() {
			for (var count = 1; count <= 5; count++) {

				$('#submit_star_' + count).addClass('star-light');

				$('#submit_star_' + count).removeClass('text-warning');

			}
		}

		$(document).on('mouseleave', '.submit_star', function() {

			reset_background();

			for (var count = 1; count <= rating_data; count++) {

				$('#submit_star_' + count).removeClass('star-light');

				$('#submit_star_' + count).addClass('text-warning');
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
					url: "submit_rating.php",
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
				url: "submit_rating.php",
				method: "POST",
				data: {
					action: 'load_data',
					room_id: room_id
				},
				dataType: "JSON",
				success: function(data) {
					$('#average_rating').text(data.average_rating);
					$('#total_review').text(data.total_review);

					var count_star = 0;

					$('.main_star').each(function() {
						count_star++;
						if (Math.ceil(data.average_rating) >= count_star) {
							$(this).addClass('text-warning');
							$(this).addClass('star-light');
						}
					});


					$('#total_five_star_review').text(data.five_star_review);

					$('#total_four_star_review').text(data.four_star_review);

					$('#total_three_star_review').text(data.three_star_review);

					$('#total_two_star_review').text(data.two_star_review);

					$('#total_one_star_review').text(data.one_star_review);

					$('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

					$('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

					$('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

					$('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

					$('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

				}
			})
		}
	</script>
</body>

</html>