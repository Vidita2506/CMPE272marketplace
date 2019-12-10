
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Imperial marketplace</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Imperial
    Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<body onload="clearCart()">
  <div id="preloader"></div>
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Header 1</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <li class="menu-has-children"><a href="">Trackings</a>
            <ul>
              <li><a href="lastvisitedpages.php">Last Visited</a></li>
              <li class="menu-has-children"><a href="#">Most Viewed</a>
                <ul>
                  <li><a href="top5_visited.php">Across All</a></li>
                  <li><a href="top5VisitedIndividual.php?website_id=1">Bookzon</a></li>
                  <li><a href="top5VisitedIndividual.php?website_id=2">VR GRAD</a></li>
                  <li><a href="top5VisitedIndividual.php?website_id=3">PPM Software Solutions</a></li>
                  <li><a href="top5VisitedIndividual.php?website_id=4">Arcade Motor Services</a></li>
                  <li><a href="top5VisitedIndividual.php?website_id=5">Platinum County Gym</a></li>
                  <li><a href="top5VisitedIndividual.php?website_id=6">Fitness Studio</a></li>

                </ul>
              </li>
            </ul>
          </li>
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Sign Up</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->
  
  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Order Confirmation</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Your Order has been confirmed!</p>
        </div>
      </div>
    </div>
    <!-- <div class="container about-container wow fadeInUp">
      <div class="row">

        <div class="col-lg-2 about-img">
          <img src="img/about-img.jpg" alt="">
        </div>

        <div class="col-md-6 about-content">
          <h2 class="about-title">We provide great services and ideass</h2>
          <p class="about-text">
            Founded in 2019, this marketplace is a one stop place for various products and services.
            Not only we provide world class services, we also provide excellent 24 hour customer 
            support. Our moto is "Customer is King" and we are here to serve you.
          </p>
        </div>
      </div>
    </div> -->
  </section>

  
  <!--==========================
  Footer
============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>
    <script>
    function clearCart() {
        sessionStorage.removeItem('cart');
    }
    </script>

</body>

</html>