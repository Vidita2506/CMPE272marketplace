<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		/*
     * Enable error reporting
     */
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    /*
     * Setup email addresses and change it to your own
     */
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $from = "admin@imperial.com";
    $to = $_COOKIE['email'];
    $subject = "Order Confirmed";
    $message = "<br>Hello, <br>Your order has been confirmed!!<br> <br>Thanks,<br> Imperial Marketplace";
    $headers .= "From:" . $from . "\r\n";
    /*
     * Test php mail function to see if it returns "true" or "false"
     * Remember that if mail returns true does not guarantee
     * that you will also receive the email
     */
    if(mail($to,$subject,$message, $headers))
    {
        header("Location: orderconfirmation.php");
    } 
    else 
    {
        echo "Failed to send.";
    }
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

<body onload="loadCart()">
    <script>

        function getCookie(name)
        {
            var re = new RegExp(name + "=([^;]+)");
            var value = re.exec(document.cookie);
            return (value != null) ? unescape(value[1]) : null;
        }
        function loadCart() {
            let cartHtml = '';
            let totalPrice = 0;
            if(!getCookie("login_success")) {
                alert("Please login!")
                window.location.replace("http://jsidharth.com/marketplace/index.php");
            } else {
                if(sessionStorage.getItem('cart')){
                    currentCart = JSON.parse(sessionStorage.getItem('cart'));
                    if(currentCart && currentCart.length) {
                        currentCart.forEach(cartItem => {
                            let itemPrice = parseInt(cartItem.quantity)*parseInt(cartItem.productprice);
                            totalPrice +=itemPrice;
                            cartHtml += `<form method="POST" action="cart.php"><div class="container about-container wow fadeInUp">
                                <div class="row" style="padding-bottom:2%">

                                    <div class="col-lg-2 about-img">
                                        <img src="img/about-img.jpg" alt="">
                                    </div>

                                    <div class="col-md-6 about-content">
                                        <h2 class="about-title" style="margin-bottom:1%">${cartItem.productname}</h2>
                                        <p
                                            style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                                            Quantity : <span style="color:black;font-weight:900">${cartItem.quantity}</span> </p>
                                        <p
                                            style="font-weight:900;padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;color:#03C4EB;font-size:15px">
                                            Price : <span style="color:black;font-weight:900">${cartItem.productprice}</span> </p>
                                    </div>
                                </div>
                            </div>`
                        })
                    } else {
                        alert('Cart is empty');
                        window.location.replace("http://jsidharth.com/marketplace/index.php");
                    }
                } else {
                    alert('Cart is empty');
                    window.location.replace("http://jsidharth.com/marketplace/index.php");
                }
            }
            cartHtml+= `<div id = "total" class="container about-container wow fadeInUp">
            <hr style="border-top: 3px solid" />
            <div class="row">
                <div class="col-md-2">
                    <h2 class="about-title" style="margin-bottom:1%">Total</h2>
                </div>
                <div class="col-md-2">
                    <h2 class="about-title" style="margin-bottom:1%">$${totalPrice}</h2>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Place Order</button>

                </div>
            </div>
        </div></form>`
            document.getElementById("cart_items").innerHTML = cartHtml;
        }
    </script>
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
          <li class="menu-active"><a href="/#hero">Home</a></li>
          <li><a href="/#about">About Us</a></li>
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

    <section id="about" style="">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Your Cart</h3>
                    <div class="section-title-divider"></div>
                </div>
            </div>
        </div>

        <!-- iteration starts here -->
        <div id="cart_items">

        <div>
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
