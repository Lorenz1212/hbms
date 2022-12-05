<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $mobno = $_POST['mobno'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $ret = "select Email from tbluser where Email=:email";
  $query = $dbh->prepare($ret);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() == 0) {
    $sql = "Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {

      echo "<script>alert('You have successfully registered with us');</script>";
    } else {

      echo "<script>alert('Something went wrong.Please try again');</script>";
    }
  } else {

    echo "<script>alert('Email-id already exist. Please try again');</script>";
  }
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>UNIVERSITY INN HOTEL | Hotel :: Sign Up</title>
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
  <!--about-->

  <div class="content">
    <div class="contact">
      <div class="container">



        <style>
          body {
            background-image: url("images/tanginamo.jpg");
            font-family: "Asap", sans-serif;
          }

          .login {
            overflow: hidden;
            background-color: dimgray;
            padding: 40px 30px 30px 30px;
            border-radius: 10px;
            position: absolute;
            top: 60%;
            left: 50%;
            width: 400px;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
            -moz-transition: -moz-transform 300ms, box-shadow 300ms;
            transition: transform 300ms, box-shadow 300ms;
            box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
          }

          .login::before,
          .login::after {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            border-top-left-radius: 40%;
            border-top-right-radius: 45%;
            border-bottom-left-radius: 35%;
            border-bottom-right-radius: 40%;
            z-index: -1;
          }

          .login::before {
            left: 40%;
            bottom: -130%;
            background-color: rgba(69, 105, 144, 0.15);
            -webkit-animation: wawes 6s infinite linear;
            -moz-animation: wawes 6s infinite linear;
            animation: wawes 6s infinite linear;
          }

          .login::after {
            left: 35%;
            bottom: -125%;
            background-color: rgba(2, 128, 144, 0.2);
            -webkit-animation: wawes 7s infinite;
            -moz-animation: wawes 7s infinite;
            animation: wawes 7s infinite;
          }

          .login>input {
            font-family: "Asap", sans-serif;
            display: block;
            border-radius: 5px;
            font-size: 16px;
            background: white;
            width: 100%;
            border: 0;
            padding: 10px 10px;
            margin: 15px -10px;
          }

          .login>button {
            font-family: "Asap", sans-serif;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            width: 80px;
            border: 0;
            padding: 10px 0;
            margin-top: 10px;
            margin-left: -5px;
            border-radius: 5px;
            background-color: #f45b69;
            -webkit-transition: background-color 300ms;
            -moz-transition: background-color 300ms;
            transition: background-color 300ms;
          }

          .login>button:hover {
            background-color: #f24353;
          }

          @-webkit-keyframes wawes {
            from {
              -webkit-transform: rotate(0);
            }

            to {
              -webkit-transform: rotate(360deg);
            }
          }

          @-moz-keyframes wawes {
            from {
              -moz-transform: rotate(0);
            }

            to {
              -moz-transform: rotate(360deg);
            }
          }

          @keyframes wawes {
            from {
              -webkit-transform: rotate(0);
              -moz-transform: rotate(0);
              -ms-transform: rotate(0);
              -o-transform: rotate(0);
              transform: rotate(0);
            }

            to {
              -webkit-transform: rotate(360deg);
              -moz-transform: rotate(360deg);
              -ms-transform: rotate(360deg);
              -o-transform: rotate(360deg);
              transform: rotate(360deg);
            }
          }

          a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.6);
            position: absolute;
            right: 10px;
            bottom: 10px;
            font-size: 12px;
          }
        </style>

        <form method="post" class="login">

          <h5>Full Name</h5>
          <input type="text" value="" name="fname" required="true" class="form-control">
          <h5>Mobile Number</h5>
          <input type="text" name="mobno" class="form-control" required="true" maxlength="11" pattern="[0-9]+">
          <h5>Email Address</h5>
          <input type="email" class="form-control" value="" name="email" required="true">
          <h5>Password</h5>
          <input type="password" value="" class="form-control" name="password" required="true">
          <br />


          <br />
          <input type="submit" value="Sign Up" name="submit">

        </form>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  </div>

  </div>
  =

</html>