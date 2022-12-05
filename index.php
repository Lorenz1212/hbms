<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>UNIVERSITY INN HOTEL | Hotel :: Facilities</title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
      <div class="header-top">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <div class="navbar-brand">

                <h1 style="margin-left: -180px; margin-top: -12px; font-size: 20px; color: red;"> <img src="images/logoo.png" img align="left-content" width="70" height="70" /> <a href="index.php"></a>HOTEL BOOKING/RESERVATION SYSTEM</h1>


              </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 ">
              <ul class="nav navbar-nav">

                <li class=""><a href="index.php">Facilities <span class="sr-only">(current)</span></a></li>
                <!--  
                                    <li><a href="services.php">Facilities</a></li> -->
                <li class="nav-item dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Campus <span class="caret"></span></a>
                  <ul class="dropdown-menu">
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
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if (strlen($_SESSION['hbmsuid'] == 0)) { ?>


                  <li><a href="signup.php">Sign Up</a></li>
                  <li><a href="signin.php">Login</a></li><?php } ?>
                <?php if (strlen($_SESSION['hbmsuid'] != 0)) { ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="profile.php">Profile</a></li>
                      <li><a href="my-booking.php">My Booking</a></li>
                      <li><a href="change-password.php">Change Password</a></li>
                      <li><a href="logout.php">Logout</a></li>

                    </ul>
                  </li><?php } ?>
              </ul>

            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

      </div>
    </div>
  </div>
  <!--header-->
  <!--services-->
  <div class="content">
    <div class="services">
      <div class="container">
        <div class="services-main">
          <h2>Facilities</h2>
          <div class="services1">
            <?php
            $sql = "SELECT * from tblfacility";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $row) {               ?>
                <div class="col-md-6 services-grid">
                  <br />
                  <div class="col-md-5 serv-img">
                    <img src="admin/images/<?php echo $row->Image; ?>" height="300" width="300" alt="" class="img-responsive">
                  </div><br />
                  <div class="col-md-6 serv-text">
                    <h4><?php echo htmlentities($row->FacilityTitle); ?> </h4>
                    <p><?php echo htmlentities($row->Description); ?> </p>
                  </div>
                  <div class="clearfix"> </div>
                </div><?php $cnt = $cnt + 1;
                    }
                  } ?>


          </div>

        </div>
      </div>
    </div>


    <?php include_once('includes/getintouch.php'); ?>

  </div>
  <!--footer-->
  <?php include_once('includes/footer.php'); ?>
</body>

</html>