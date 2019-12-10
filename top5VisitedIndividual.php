<?php
    $servername = "sidharthjayaprakash9360963.ipagemysql.com";
    $username = "jsidharth";
    $password = "root123";
    $dbname = "market_place_1";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $website_id = $_GET["website_id"];
    if ($website_id == 1) {
        $companyName = "Bookzon";
      }
      if ($website_id == 2 ) {
        $companyName = "VRGRAD";
      
      }
      if ($website_id == 3) {
        $companyName = "PPM Software Solutions";
      
      }
      if ($website_id == 4 ) {
        $companyName = "Arcade Motor Services";
      
      }
      if ($website_id == 5) {
        $companyName = "Platinum County Gym";
      
      }
      if ($website_id == 6 ) {
        $companyName = "Fitness Studio";
      
      }
    if(!$conn){
        die("Connection failed!!!!" .mysqli_connect_error());
    }

    $sql_init = "SELECT * FROM product_visits where website_id =".$website_id." ORDER BY 'count' DESC";

    $result = $conn->query($sql_init);
    
    $x=0;
    while($row = $result->fetch_array()){
        if($x>=5){
            break;
        }
        $productName[$x]=$row['product_name'];
        $count[$x]=$row['count'];
        $image[$x]=$row['image'];
        $x++;
    }

    $conn->close();

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
            </ul>
          </li>
                    <li class="menu-active"><a href="#hero">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- #header -->

    <section id="about" style="">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Top 5 of our most viewed products (<?php echo $companyName?>) </h3>
                    <div class="section-title-divider" style="margin-bottom:8%"></div>
                </div>
            </div>
        </div>

        <!-- iteration starts here -->
        <div class="container about-container wow fadeInUp">
            <div class="row" style="padding-bottom:2%">
            <div class="col-md-6">
                <div class="col-md-3 about-img">
                    <img  src=<?php echo $image[0] ?> alt="">
                </div>

                <div class="col-md-8 about-content">
                    <h2 class="about-title" style="margin-bottom:1%"><?php echo $productName[0] ?></h2>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Rank : <span style="color:black;font-weight:900">1</span> </p>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Count : <span style="color:black;font-weight:900"><?php echo $count[0] ?></span> </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3 about-img">
                    <img src=<?php echo $image[1] ?> alt="">
                </div>

                <div class="col-md-8 about-content">
                    <h2 class="about-title" style="margin-bottom:1%"><?php echo $productName[1] ?></h2>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Rank : <span style="color:black;font-weight:900">2</span> </p>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Count : <span style="color:black;font-weight:900"><?php echo $count[1] ?></span> </p>
                </div>
            </div>
            </div>
        </div>

        <div class="container about-container wow fadeInUp">
            <div class="row" style="padding-bottom:2%">
            <div class="col-md-6">
                <div class="col-md-3 about-img">
                    <img src=<?php echo $image[2] ?> alt="">
                </div>

                <div class="col-md-8 about-content">
                    <h2 class="about-title" style="margin-bottom:1%"><?php echo $productName[2] ?></h2>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Rank : <span style="color:black;font-weight:900">3</span> </p>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Count : <span style="color:black;font-weight:900"><?php echo $count[2] ?></span> </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-3 about-img">
                    <img src=<?php echo $image[3] ?> alt="">
                </div>

                <div class="col-md-8 about-content">
                    <h2 class="about-title" style="margin-bottom:1%"><?php echo $productName[3] ?></h2>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Rank : <span style="color:black;font-weight:900">4</span> </p>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Count : <span style="color:black;font-weight:900"><?php echo $count[3] ?></span> </p>
                </div>
            </div>
            </div>
        </div>
        <div class="container about-container wow fadeInUp">
            <div class="row" style="padding-bottom:2%">
            <div class="col-md-6">
                <div class="col-md-3 about-img">
                    <img src=<?php echo $image[4] ?> alt="">
                </div>

                <div class="col-md-8 about-content">
                    <h2 class="about-title" style="margin-bottom:1%"><?php echo $productName[4] ?></h2>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Rank : <span style="color:black;font-weight:900">5</span> </p>
                    <p
                        style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                        Count : <span style="color:black;font-weight:900"><?php echo $count[4] ?></span> </p>
                </div>
            </div>
          
            </div>
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