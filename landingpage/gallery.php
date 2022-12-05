<?php include_once('header.php') ?>
<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
<div class="container h-100">
<div class="row h-100 align-items-center">
<div class="col-12">
<div class="breadcrumb-content text-center">
<h2 class="page-title">Gallery</h2>

</div>
</div>
</div>
</div>
</div>

<section class="roberto-about-area section-padding-100-0">

<div class="container mt-100">
<div class="row align-items-center">
<div class="col-12 col-lg-12">

						
<div class="col-12 col-lg-12">
<div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
<div class="row no-gutters">
							<?php
$sql="SELECT * from tblroom";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<div class="col-6">
	<div class="single-thumb">
	<img src="../admin/images/<?php echo $row->Image;?>" alt="" style="height: 300px;width: 600px;" >
	</div>
</div>

<?php $cnt=$cnt+1;}} ?>
 <

</div>
</div>
</div>
</div>
</div>
</div>
</section> 

<?php include_once('footer.php') ?>