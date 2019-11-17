<?php
include_once('connection.php');
session_start();
$sql="select residence.residenceID ,numUnits,monthlyRental,requiredMonth,requiredYear,username,monthlyIncome,applicationID,applicant.applicantID from application,residence,applicant where residence.residenceID=application.residenceID and applicant.applicantID=application.applicantID and status in ('new','wait list') group by residence.residenceID,numUnits,monthlyRental,requiredMonth,requiredYear,username,monthlyIncome,applicationID,applicantID;";
$result=$con->query($sql);
$attr=$result->fetch_all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Easy Estate</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/styleApplicant.css" rel="stylesheet">


</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
        <h1><a href="index.html" class="scrollto" style="font-size:27px;" >Easy Estate</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="
          " /></a>-->
      </div>
	  <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.html">Go back</a></li>
        </ul>
      </nav>


    </div>
  </header><!-- #header -->
</br>
</br>






    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">
            </br>
            </br>
		<h2>Hi.<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our website.</h2>
        <h2> Applications </h2>
        <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
		   <th>Residence ID</th>
		   <th>Number of units</th>
       <th>Monthly Rental</th>
		   <th>Required Month</th>
       <th>Required Year</th>
       <th>Applicant Name </th>
		   <th>Monthly Income</th>
       <th></th>
	   <th></th>
	   <th></th>
        </tr>
        </thead>
        <tbody>
          <?php

		  foreach($attr as $v)
    {
        echo"<tr>";

		echo"<td>{$v[0]}</td>";
		echo"<td>{$v[1]}</td>";
		echo"<td>{$v[2]}</td>";
		echo"<td>{$v[3]}</td>";
		echo"<td>{$v[4]}</td>";
		echo"<td>{$v[5]}</td>";
		echo"<td>{$v[6]}</td>";
		
		echo"<td><a href='allocateHousing.php?c={$v[0]}&d={$v[7]}&e={$v[8]}'  type='button' class='btn btn-primary' >Allocate</a></td>";
		echo"<td><a href='reject.php?d={$v[7]}' type='button' class='btn btn-primary' >Reject</a></td>";
		echo"<td><a href='waitList.php?d={$v[7]}'  type='button' class='btn btn-primary' >Pause</a></td>";
        echo"</tr>";
    }

    ?>

        </tbody>
        </table>
      </div>
    </section>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">



          <div class="col-lg-4 col-md-4 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="index.html">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href=index.html#about>About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href=index.html#services>Services</a></li>

            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Jalan Damansara, Bukit Kiara <br>
              60000 Kuala Lumpur<br>
              Wilayah Persekutuan Kuala Lumpur <br>
              <strong>Phone:</strong> +603-7727 1886<br>
              <strong>Email:</strong> Application_Finder@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/login?lang=en" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>

            </div>

          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe to our Newsletter to get the latest news and updates about our Website and the world of Higher Education.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Easy Estate</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
