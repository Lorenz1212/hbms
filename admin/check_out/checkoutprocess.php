

<?php
if (isset($_POST['btnsubmit'])) {
  $bookingid = $_POST['bookingid'];
  $date = $_POST['date'];

  echo "<script>".$bookingid."</script>";

  include "../db_conn/db.php";
  $query = "UPDATE tblbooking SET check_out = 1, check_out_date = '$date' WHERE BookingNumber = '$bookingid'";
  $stmt=$conn->query($query);

    if ($stmt->execute()) {
      header('location: ../all-booking.php?checkout=1');
    }
}
 ?>
