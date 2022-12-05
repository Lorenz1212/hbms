

<div style="background-color: #172238;" class="touch-section">
					<div  class="container">
						<h3 style="color:WHITE;">Contact Details</h3>
						<div class="touch-grids">
							

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
							<div class="col-md-4 touch-grid">
								<h4 style="color:WHITE;">address</h4>
								<h5 style="color:WHITE;"> <?php  echo htmlentities($row->PageDescription);?></h5>
								
							</div>
							<div  class="col-md-4 touch-grid">
								<h4 style="color:WHITE;">Sales</h4>
								<h5 style="color:WHITE;">Sales Enquiries</h5>
								<p style="color:WHITE;">Telephone : +<?php  echo htmlentities($row->MobileNumber);?></p>
							<p style="color:WHITE;">E-mail : <?php  echo htmlentities($row->Email);?></p>
							</div><?php $cnt=$cnt+1;}} ?>
							<div class="col-md-4 touch-grid">
								<?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
							<h4 style="color:WHITE;"><?php  echo htmlentities($row->PageTitle);?></h4>
									
								<p><?php  echo htmlentities($row->PageDescription);?></p>
								
							</div><?php $cnt=$cnt+1;}} ?>
							<div class="clearfix"></div>
						</div>
					</div>
					</div>
				<!--GET IN TOUCH-->