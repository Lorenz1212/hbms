<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hbmsaid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {

		$hbmsaid = $_SESSION['hbmsaid'];
		$roomtype = $_POST['roomtype'];
		$roomname = $_POST['roomname'];
		$maxadult = $_POST['maxadult'];
		$maxchild = $_POST['maxchild'];
		$roomfac = implode(',', $_POST['roomfac']);
		$hotel_type = $_POST['hotel_type'];
		$roomdes = $_POST['roomdes'];
		$nobed = $_POST['nobed'];
		$eid = $_GET['editid'];

		$sql = "update tblroom set RoomType=:roomtype,RoomName=:roomname,MaxAdult=:maxadult,MaxChild=:maxchild,RoomDesc=:roomdes,NoofBed=:nobed,RoomFacility=:roomfac,hotel_type=:hotel_type where ID=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':roomtype', $roomtype, PDO::PARAM_STR);
		$query->bindParam(':roomname', $roomname, PDO::PARAM_STR);
		$query->bindParam(':maxadult', $maxadult, PDO::PARAM_STR);
		$query->bindParam(':maxchild', $maxchild, PDO::PARAM_STR);
		$query->bindParam(':roomdes', $roomdes, PDO::PARAM_STR);
		$query->bindParam(':nobed', $nobed, PDO::PARAM_STR);
		$query->bindParam(':roomfac', $roomfac, PDO::PARAM_STR);
		$query->bindParam(':hotel_type', $hotel_type, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();

		echo '<script>alert("Room detail has been updated")</script>';
		echo "<script>window.location.href ='manage-room.php'</script>";
	}
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>UNIVERSITY INN HOTEL | Edit Room</title>

		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="css/font-awesome.css" rel="stylesheet">
		<!-- jQuery -->
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<!-- lined-icons -->
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
		<script src="js/simpleCart.min.js"> </script>
		<script src="js/amcharts.js"></script>
		<script src="js/serial.js"></script>
		<script src="js/light.js"></script>
		<!-- //lined-icons -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<!--pie-chart--->
		<script src="js/pie-chart.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#demo-pie-1').pieChart({
					barColor: '#3bb2d0',
					trackColor: '#eee',
					lineCap: 'round',
					lineWidth: 8,
					onStep: function(from, to, percent) {
						$(this.element).find('.pie-value').text(Math.round(percent) + '%');
					}
				});

				$('#demo-pie-2').pieChart({
					barColor: '#fbb03b',
					trackColor: '#eee',
					lineCap: 'butt',
					lineWidth: 8,
					onStep: function(from, to, percent) {
						$(this.element).find('.pie-value').text(Math.round(percent) + '%');
					}
				});

				$('#demo-pie-3').pieChart({
					barColor: '#ed6498',
					trackColor: '#eee',
					lineCap: 'square',
					lineWidth: 8,
					onStep: function(from, to, percent) {
						$(this.element).find('.pie-value').text(Math.round(percent) + '%');
					}
				});


			});
		</script>
	</head>

	<body>
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="inner-content">
					<!-- header-starts -->
					<?php include_once('includes/header.php'); ?>

					<!--content-->
					<div class="content">
						<div class="women_main">
							<!-- start content -->
							<div class="grids">
								<div class="progressbar-heading grids-heading">
									<h2>Edit Room</h2>
								</div>
								<div class="panel panel-widget forms-panel">
									<div class="forms">
										<div class="form-grids widget-shadow" data-example-id="basic-forms">
											<div class="form-title">
												<h4>Edit Room</h4>
											</div>
											<div class="form-body">

												<form method="post" enctype="multipart/form-data">
													<?php
													$eid = $_GET['editid'];
													$sql = "SELECT tblroom.*,tblcategory.CategoryName,tblhotel.hotel_name from tblroom join tblcategory on tblroom.RoomType=tblcategory.ID join tblhotel on tblroom.hotel_type=tblhotel.hotel_id  where tblroom.ID=$eid";
													$query = $dbh->prepare($sql);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);
													$cnt = 1;
													if ($query->rowCount() > 0) {
																foreach ($results as $row) {               ?>
																	<div class="form-group"> <label for="exampleInputEmail1">Select Campus</label> <select type="text" name="hotel_type" id="hotel_type" value="" class="form-control" required="true">
																	<option value="<?php echo $row->hotel_type; ?>"><?php echo $row->hotel_name; ?></option>
																	<?php

																	$sql2 = "SELECT * from   tblhotel ";
																	$query2 = $dbh->prepare($sql2);
																	$query2->execute();
																	$result2 = $query2->fetchAll(PDO::FETCH_OBJ);

																	foreach ($result2 as $row2) {
																	?>
																		<option value="<?php echo htmlentities($row2->hotel_id); ?>"><?php echo htmlentities($row2->hotel_name); ?></option>
																	<?php } ?>


																</select> 
															</div>
															<div class="form-group"> <label for="exampleInputEmail1">Room Type or Category</label> <select type="text" name="roomtype" id="roomtype" value="" class="form-control" required="true">
																	<option value="<?php echo $row->RoomType; ?>"><?php echo $row->CategoryName; ?></option>
																	<?php

																	$sql2 = "SELECT * from   tblcategory ";
																	$query2 = $dbh->prepare($sql2);
																	$query2->execute();
																	$result2 = $query2->fetchAll(PDO::FETCH_OBJ);

																	foreach ($result2 as $row2) {
																	?>
																		<option value="<?php echo htmlentities($row2->ID); ?>"><?php echo htmlentities($row2->CategoryName); ?></option>
																	<?php } ?>


																</select> </div>
															<div class="form-group"> <label for="exampleInputEmail1">Room Name</label> <input type="text" class="form-control" name="roomname" value="<?php echo $row->RoomName; ?>" required='true'> </div>
															<div class="form-group"> <label for="exampleInputEmail1">Max Adult</label> <input type="text" class="form-control" name="maxadult" value="<?php echo $row->MaxAdult; ?>" required='true'> </div>
															<div class="form-group"> <label for="exampleInputEmail1">Max Child</label> <input type="text" class="form-control" name="maxchild" value="<?php echo $row->MaxChild; ?>" required='true'> </div>
															<div class="form-group"> <label for="exampleInputEmail1">Room Description</label> <textarea type="text" class="form-control" name="roomdes"><?php echo $row->RoomDesc; ?></textarea> </div>
															<div class="form-group"> <label for="exampleInputEmail1">No. of Bed</label> <input type="text" class="form-control" name="nobed" value="<?php echo $row->NoofBed; ?>" required='true'> </div>
															<div class="form-group"> <label for="exampleInputEmail1">Room Image</label> &nbsp;&nbsp;
																<img src="images/<?php echo $row->Image; ?>" width="100" height="100" value="<?php echo $row->Image; ?>">
																<a href="changeimage.php?editid=<?php echo $row->ID; ?>"> &nbsp; Edit Image</a>
															</div>
															<div class="form-group"> <label for="exampleInputEmail1">Room Facility</label> <select type="text" name="roomfac[]" id="roomfac" value="" class="form-control" multiple="multiple">
																	<option value="<?php echo $row->RoomFacility; ?>"><?php echo $row->RoomFacility; ?></option>
																	<?php


																	$sql2 = "SELECT * from   tblfacility ";
																	$query2 = $dbh->prepare($sql2);
																	$query2->execute();
																	$result2 = $query2->fetchAll(PDO::FETCH_OBJ);

																	foreach ($result2 as $row3) {
																	?>
																		<option value="<?php echo htmlentities($row3->FacilityTitle); ?>"><?php echo htmlentities($row3->FacilityTitle); ?></option>
																	<?php } ?>


															<?php $cnt = $cnt + 1;
														}
													} ?>
																</select> </div>


															<button type="submit" class="btn btn-default" name="submit">Update</button>
												</form>
											</div>
										</div>
									</div>
								</div>


							</div>

							<!-- end content -->

							<?php include_once('includes/footer.php'); ?>
						</div>

					</div>
					<!--content-->
				</div>
			</div>
			<!--//content-inner-->
			<!--/sidebar-menu-->
			<?php include_once('includes/sidebar.php'); ?>
			<div class="clearfix"></div>
		</div>
		<script>
			var toggle = true;

			$(".sidebar-icon").click(function() {
				if (toggle) {
					$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
					$("#menu span").css({
						"position": "absolute"
					});
				} else {
					$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
					setTimeout(function() {
						$("#menu span").css({
							"position": "relative"
						});
					}, 400);
				}

				toggle = !toggle;
			});
		</script>
		<!--js -->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- /Bootstrap Core JavaScript -->
		<!-- real-time -->
		<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
		<!-- /real-time -->
		<script src="js/menu_jquery.js"></script>
	</body>

	</html><?php }  ?>