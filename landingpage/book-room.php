<?php include_once('header.php') ?>
<?php

if (strlen($_SESSION['hbmsuid'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {

		$booknum = mt_rand(100000000, 999999999);
		$rid = intval($_GET['rmid']);
		$uid = $_SESSION['hbmsuid'];
		$idtype = $_POST['idtype'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$checkindate = $_POST['checkindate'];
		$checkoutdate = $_POST['checkoutdate'];

		$cdate = date('Y-m-d');
		if ($checkindate <  $cdate) {
			echo '<script>alert("Check in date must be greater than current date")</script>';
		} else if ($checkindate > $checkoutdate) {
			echo '<script>alert("Booking Date Invalid, Make Sure Dates are Right")</script>';
		} else {
			$sql = "insert into tblbooking(RoomId,BookingNumber,UserID,IDType,Gender,Address,CheckinDate,CheckoutDate,check_out,check_out_date)values(:rid,:booknum,:uid,:idtype,:gender,:address,:checkindate,:checkoutdate,0,'')";
			$query = $dbh->prepare($sql);
			$query->bindParam(':rid', $rid, PDO::PARAM_STR);
			$query->bindParam(':booknum', $booknum, PDO::PARAM_STR);
			$query->bindParam(':uid', $uid, PDO::PARAM_STR);
			$query->bindParam(':idtype', $idtype, PDO::PARAM_STR);
			$query->bindParam(':gender', $gender, PDO::PARAM_STR);
			$query->bindParam(':address', $address, PDO::PARAM_STR);
			$query->bindParam(':checkindate', $checkindate, PDO::PARAM_STR);
			$query->bindParam(':checkoutdate', $checkoutdate, PDO::PARAM_STR);


			if ($query->execute()) {
				echo '<script>alert("Your room has been book successfully. Booking Number is "+"' . $booknum . '")</script>';

				echo "<script>window.location.href ='index.php'</script>";
			} else {
				echo '<script>alert("Something Went Wrong. Please try again")</script>';
			}
		}
	
 }}
?>

<style type="text/css">
	.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
</style>


<div class="roberto-contact-form-area section-padding-100" style="background-image: url(../images/tanginamo.jpg)">
<div class="container">
<div class="card" style=" background-color: white;">
	 <div class="card-body">
		<div class="row">
			<div class="col-12">

			<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
			<h2>Book Now</h2>
			</div>
			</div>
			</div>
			<div class="row">
			<div class="col-12">

			<div class="roberto-contact-form">
			<form action="#" method="post">
				<div class="row">
			<?php
				$uid = $_SESSION['hbmsuid'];
				$sql = "SELECT * from  tbluser where ID=:uid";
				$query = $dbh->prepare($sql);
				$query->bindParam(':uid', $uid, PDO::PARAM_STR);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $row) { ?>
						<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
						<input type="text" name="name" class="form-control mb-30" value="<?php echo $row->FullName; ?>" required="true" readonly="true">
						</div>
						<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
						<input type="text" name="phone" class="form-control mb-30" value="<?php echo $row->MobileNumber; ?>" readonly="true">
						</div>
						<div class="col-12 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
						<input type="email" name="email" class="form-control mb-30" value="<?php echo $row->Email; ?>" readonly="true">
						</div>


				<?php $cnt = $cnt + 1;
			   }}?>
				<div class="col-12 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
					<select type="text" value="" class="form-control" name="idtype" required="true" class="form-control">
								<option value="">Choose ID Type</option>
								<option value="Voter Card">Voter Card</option>
								<option value="Adhar Card">National ID</option>
								<option value="Driving Licence Card">Driving Licence</option>
								<option value="Passport">Passport ID</option>
							</select>
					</div>
			<div class="col-12 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
					<select name="gender" required="true" class="form-control mb-30">
							<option value="" selected disabled>Choose Gender</option>
							<option value="Male">Male</option>
							<option value="Femail">Female</option>
						</select>
					</div>
			<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
			<textarea name="address" class="form-control mb-30" placeholder="Your Address" rows="10"></textarea>
			</div>
			<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
				<label>Check In</label>
						<input type="date" name="checkindate" class="form-control mb-30"  required>
					</div>
			<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
				<label>Check Out</label>
						<input type="date" name="checkoutdate" class="form-control mb-30" required>
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
</div>
</div>
<?php include_once('footer.php') ?>