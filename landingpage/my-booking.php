<?php include_once('header.php') ?>
<?php

if (strlen($_SESSION['hbmsuid']==0)) {
  header('location:logout.php');
  } else{
  	        if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblbooking where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'my-booking.php'</script>";     

 }
}
?>


<div class="roberto-contact-form-area section-padding-100" >
<div class="container">
<div class="row ">
<div class="col-12">

<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
<h2 class="text-white">My Booking</h2>
</div>
</div>
</div>
<div class="row" >
<div class="col-12">

<div class="roberto-contact-form">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Booking Number</th>
				<th>Name</th>
				<th>Mobile Number</th>
				<th>Email</th>
				<th>Status</th>
				<th>Action</th>
				<th>Cancel</th>
			</tr>
		</thead>
		<tbody>
			<?php
                            $uid= $_SESSION['hbmsuid'];
$sql="SELECT tbluser.*,tblbooking.BookingNumber,tblbooking.Status,tblbooking.ID as bid from tblbooking join tbluser on tblbooking.UserID=tbluser.ID where UserID=:uid";

$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			<tr>
				<td><?php echo htmlentities($cnt);?></td>
				<td><?php  echo htmlentities($row->BookingNumber);?></td>
				<td><?php  echo htmlentities($row->FullName);?></td>
				<td><?php  echo htmlentities($row->MobileNumber);?></td>
				<td><?php  echo htmlentities($row->Email);?></td>
				<?php if($row->Status==""){ ?>

     <td><?php echo "Still Pending"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Status);?>
  </td>
  <?php } ?>
		 <td><a href="view-application-detail.php?viewid=<?php echo htmlentities ($row->bid);?>" class="btn roberto-btn ">View</a>
                                </td>
<td class="font-w600"><a href="my-booking.php?delid=<?php echo ($row->bid);?>" onclick="return confirm('Do you really want to Delete ?');">Cancel Book</a></td>                                  
		</tr>
		<?php $cnt=$cnt+1;}} ?>
			
		</tbody>
	</table>
</div>
</div>
</div>
</div>
</div>

<?php include_once('footer.php') ?>