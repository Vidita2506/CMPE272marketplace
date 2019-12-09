<?php
$website_id = $_GET["website_id"];

if ($website_id == 1) {
  $url = "http://jsidharth.com/bookzon/getProducts.php";
}
if ($website_id == 2 ) {
  $url = "http://tejasmadappa.com/VRGrad/response.php";
}
if ($website_id == 3) {
  $url = "http://sruthiduvvuri.com/Users/fetch_products.php";
}
if ($website_id == 4 ) {
  $url = "http://www.sushantmathur.xyz/get_prod.php";
}
if ($website_id == 5) {
  $url = "http://www.mitranayak.org/mitraProducts.php";
}
if ($website_id == 6 ) {
  $url = "http://vidita.co/getServices.php";
}

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));
    $result = curl_exec($ch);
    $decoded_result= json_decode($result);
    for($i=0;$i<10;$i++){
      $image[$i] =  "background-image: url(".json_decode($decoded_result[$i])->product_image.");";
      $productName[$i] = json_decode($decoded_result[$i])->product_name;
      $prductDescripton[$i] = json_decode($decoded_result[$i])->product_description;
      $price[$i] = json_decode($decoded_result[$i])->price;
    }
    curl_close($ch);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Imperial Boootstrap Template</title>
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

<body>
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
          <li class="menu-active"><a href="http://www.jsidharth.com/marketplace/#hero">Home</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/#about">About Us</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/#services">Services</a></li>

        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->
  
  <section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Products & Services</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">The products and services we are proud to offer </p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[0] ?>' href="">
            <div class="details">
              <h4><?php echo $productName[0] ?></h4>
              <span>$<?php echo $price[0] ?></span>
            </div>
          </a>
        </div>
    
        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[1] ?>' href="">
            <div class="details">
            <h4><?php echo $productName[1] ?></h4>
              <span>$<?php echo $price[1] ?></span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[2] ?>' href="">
            <div class="details">
            <h4><?php echo $productName[2] ?></h4>
              <span>$<?php echo $price[2] ?></span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[3] ?>' href="">
            <div class="details">
            <h4><?php echo $productName[3] ?></h4>
              <span>$<?php echo $price[3] ?></span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[4] ?>' href="">
            <div class="details">
            <h4><?php echo $productName[4] ?></h4>
              <span>$<?php echo $price[4] ?></span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[5] ?>' href="">
            <div class="details">
            <h4><?php echo $productName[5] ?></h4>
              <span>$<?php echo $price[5] ?></span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[6] ?>'href="">
            <div class="details">
            <h4><?php echo $productName[6] ?></h4>
              <span>$<?php echo $price[6] ?></span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[7] ?>' href="">
            <div class="details">
            <h4><?php echo $productName[7] ?></h4>
              <span>$<?php echo $price[7] ?></span>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[8] ?>' href="">
            <div class="details">
            <h4><?php echo $productName[8] ?></h4>
              <span>$<?php echo $price[8] ?></span>
            </div>
          </a>
        </div> 
        <div class="col-md-3">
          <a class="portfolio-item" style='<?php echo $image[9] ?>' href="">
            <div class="details">
            <h4><?php echo $productName[9] ?></h4>
              <span>$<?php echo $price[9] ?></span>
            </div>
          </a>
        </div> 
     

      </div>
    </div>
  </section>

  
  <!--==========================
  Footer
============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright <strong>Imperial Theme</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
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


</body>

</html>