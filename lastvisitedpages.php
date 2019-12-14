<?php
$visited = array();
$cookie_name = "lastvisited";
 if(isset($_COOKIE[$cookie_name])) {
    $visitedcookie = json_decode($_COOKIE[$cookie_name], true);
} else {
    $visitedcookie = $visited;
} 

$products = array();
$websites = array();
$productids = array();
$productImages = array();

foreach ($visitedcookie as $product) {
    $contents = explode("-", $product);
    $website_id = $contents[0];
    $product_id = $contents[1];
    if ( $website_id == 1 ) {
      $url = "http://jsidharth.com/bookzon/getProductDetail.php?product_id=$product_id";
      $companyName = 'Bookzon';
    }
    if ( $website_id == 2 ) {
      $url = "http://tejasmadappa.com/VRGrad/getProductDetail.php?product_id=$product_id";
      $companyName = 'VRGRAD';
    }
    if ( $website_id == 3 ) {
      $url = "http://sruthiduvvuri.com/Users/getProductDetail.php?product_id=$product_id";
      $companyName = 'PPM Software Solutions';
    }
    if ( $website_id == 4 ) {
      $url = "http://sushantmathur.xyz/get_prod.php?product_id=$product_id";
      $companyName = 'Arcade Motor Services';
    }
    if ( $website_id == 5 ) {
      $url = "http://www.mitranayak.org/mitraSingleProduct.php?product_id=$product_id";
      $companyName = 'Platinum County Gym';
    }
    if ( $website_id == 6 ) {
      $url = "http://vidita.co/getProductDetails.php?product_id=$product_id";
      $companyName = 'Fitness Studio';
    }
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Accept: application/json'
    ) );
    $result = curl_exec( $ch );
    $productName = json_decode( $result ) ->product_name;
    $image1 = json_decode( $result ) ->product_image;
    $image =  "background-image: url(".$image1.");";

    array_push($products, $productName);
    array_push($websites, $website_id);
    array_push($productids, $product_id);
    array_push($productImages, $image);

  }
?>
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate-css/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="preloader"></div>
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="#hero"><img src="img/logo.png" alt="" title="" /></a>
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
              <li class="menu-has-children"><a href="#">Top Ratings</a>
                <ul>
                  <li><a href="top5ByRatingIndividual.php?website_id=1">Bookzon</a></li>
                  <li><a href="top5ByRatingIndividual.php?website_id=2">VR GRAD</a></li>
                  <li><a href="top5ByRatingIndividual.php?website_id=3">PPM Software Solutions</a></li>
                  <li><a href="top5ByRatingIndividual.php?website_id=4">Arcade Motor Services</a></li>
                  <li><a href="top5ByRatingIndividual.php?website_id=5">Platinum County Gym</a></li>
                  <li><a href="top5ByRatingIndividual.php?website_id=6">Fitness Studio</a></li>

                </ul>
              </li>
            </ul>
          </li>
          <li class="menu-active"><a href="http://www.jsidharth.com/marketplace/#hero">Home</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/#about">About Us</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/#services">Services</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/#contact">Contact Us</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/cart.php">Cart</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/login.php">Login</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/register.php">Sign Up</a></li>
          <li><a href="http://www.jsidharth.com/marketplace/logout.php">Log Out</a></li>
        </ul>
      </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- #header -->

    <section id="portfolio" style="">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Most Recently Viewed </h3>
                    <div class="section-title-divider" style="margin-bottom:8%"></div>
                </div>
            </div>
        </div>


          <div class="container about-container wow fadeInUp">
          <?php for($i=0;$i<count($products);$i++) {?>
            <div id='' class="row" style="padding-bottom:2%">
            <div class="col-md-6">
                <div class="col-md-3 about-img">
                <a  class=" portfolio-item" style='<?php echo $productImages[$i] ?>; height:100px;text-align:right' ></a>
                </div>

                <div class="col-md-8 about-content">
                    <h2 class="about-title" style="margin-bottom:1%"><?php echo $products[$i] ?></h2>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Rank : <span style="color:black;font-weight:900"><?php echo $i+1 ?></span> </p>
                  
                </div>
            </div>
          </div>
          <?php }?>
        </div>

        
        <!-- iteration ends here -->



    </section>



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
