<?php
include 'visittracker.php';
session_start();
$website_id = $_GET['website_id'];
$_SESSION['websiteid'] = $website_id;

$product_id = $_GET['product_id'];
trackVisit($website_id.'-'.$product_id);

if ($website_id == 1) {
    $url = "http://jsidharth.com/bookzon/getProductDetail.php?product_id=$product_id";
    $companyName = 'Bookzon';
}
if ($website_id == 2) {
    $url = "http://tejasmadappa.com/VRGrad/getProductDetail.php?product_id=$product_id";
    $companyName = 'VRGRAD';
}
if ($website_id == 3) {
    $url = "http://sruthiduvvuri.com/Users/getProductDetail.php?product_id=$product_id";
    $companyName = 'PPM Software Solutions';
}
if ($website_id == 4) {
    $url = "http://sushantmathur.xyz/get_prod.php?product_id=$product_id";
    $companyName = 'Arcade Motor Services';
}
if ($website_id == 5) {
    $url = "http://www.mitranayak.org/mitraSingleProduct.php?product_id=$product_id";
    $companyName = 'Platinum County Gym';
}
if ($website_id == 6) {
    $url = "http://vidita.co/getProductDetails.php?product_id=$product_id";
    $companyName = 'Fitness Studio';
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));
$result = curl_exec($ch);
//echo 'Result is '.$result;
$productName = json_decode($result) ->product_name;
$_SESSION['productname'] = $productName;
// echo 'product name is '.$productName;
$productDescripton = json_decode($result) ->product_description;
// echo 'product description is '.$productDescripton;
$image1 = json_decode($result)->product_image;
$image =  "background-image: url(".$image1.");";

// echo $image;

$price = json_decode($result) ->price;
// echo 'product price is '.$price;
$reviews = json_decode($result) ->reviews;

// Update db start!
$servername = "sidharthjayaprakash9360963.ipagemysql.com";
$username = "jsidharth";
$password = "root123";
$dbname = "market_place_1";
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed!!!!" .mysqli_connect_error());
}

$sql_init = "SELECT * FROM product_visits WHERE product_name='$productName' LIMIT 1";

$result = $conn->query($sql_init);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $current = $row['count'];
    $current = $current + 1;
}

$sql_new = "UPDATE product_visits SET count=$current WHERE product_name='$productName'";

$conn->query($sql_new);

$conn->close();
//Update db end.


// echo 'reviews'.$reviews;
// $decoded_result = json_decode( $result );
// echo 'Decoded Result'.$decoded_result;
curl_close($ch);
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <title>Imperial Boootstrap Template</title>
    <meta content='width=device-width, initial-scale=1.0' name='viewport'>
    <meta content='' name='keywords'>
    <meta content='' name='description'>

    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property='og:title' content=''>
    <meta property='og:image' content=''>
    <meta property='og:url' content=''>
    <meta property='og:site_name' content=''>
    <meta property='og:description' content=''>

    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name='twitter:card' content='summary'>
    <meta name='twitter:site' content=''>
    <meta name='twitter:title' content=''>
    <meta name='twitter:description' content=''>
    <meta name='twitter:image' content=''>

    <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
    <link href='favicon.ico' rel='shortcut icon'>

    <!-- Google Fonts -->
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800'
        rel='stylesheet'>

    <!-- Bootstrap CSS File -->
    <link href='lib/bootstrap/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Libraries CSS Files -->
    <link href='lib/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
    <link href='lib/animate-css/animate.min.css' rel='stylesheet'>

    <!-- Main Stylesheet File -->
    <link href='css/style.css' rel='stylesheet'>

    <!-- ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  =
Theme Name: Imperial
Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
Author: BootstrapMade.com
Author URL: https://bootstrapmade.com
===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  = -->
</head>

<body>
    <!-- Add to cart functionality -->
    <script>
        function getCookie(name) {
            var re = new RegExp(name + "=([^;]+)");
            var value = re.exec(document.cookie);
            return (value != null) ? unescape(value[1]) : null;
        }

        function addToCart() {
            if (!getCookie("login_success")) {
                alert("Please login to add items to cart!");
            } else {
                const item = {
                    productname: document.getElementById('productname').innerText.substring(14),
                    productprice: document.getElementById('productprice').innerText.substring(15),
                    quantity: document.getElementById('productquantity').value,
                    productimage: document.getElementById('productimage').value
                };
                let currentCart = [];
                let itemexists = false;
                if (sessionStorage.getItem('cart')) {
                    currentCart = JSON.parse(sessionStorage.getItem('cart'));
                    if (currentCart && currentCart.length) {
                        currentCart.forEach(cartItem => {
                            if (item.productname === cartItem.productname) {
                                cartItem.quantity = item.quantity;
                                itemexists = true;
                            }
                        })
                    }
                }
                if (!itemexists) {
                    currentCart.push(item);
                }
                sessionStorage.setItem("cart", JSON.stringify(currentCart))
            }
        }
        function checkLogin() {
            if (!getCookie("login_success")) {
                alert("Please login to post review!");
                window.location.replace("http://jsidharth.com/marketplace/login.php");
            }
        }
    </script>
    <div id='preloader'></div>
    <header id="header">
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

    <!- -==========================Products Section============================-->

        <section id='portfolio'>
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">About Product</h3>
                        <div class="section-title-divider"></div>
                    </div>
                </div>
            </div>
            <div class='container about-container wow fadeInUp'>
                <div class='row'>
                    <div class="col-md-6 about-img" style="text-align:right">
                    <a  class=" portfolio-item" style='<?php echo $image ?>; height:400px' ></a>
                        <!-- <img id="productimage" style ="max-height: 500px;height:50%"src="<?php echo $image; ?>" alt='image'> -->
                    </div>

                    <div class='col-md-6 about-content'>
                        <h2 class='about-title' id='productname'><?php echo 'Product Name: '.$productName ?></h2>
                        <p class='about-text'>
                            <?php echo $productDescripton?>
                        </p>
                        <p class='about-text' id='productprice'>
                            <?php echo 'Product Price '."$".$price ?>
                        </p>

                        <form method='POST'>
                            <div class="col-md-6">
                                <div class='btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m'>
                                    <i class='fs-16 zmdi zmdi-minus'></i>
                                </div>

                                <input class='mtext-104 cl3 txt-center ' type='number' id='productquantity'
                                    name='num-product' value='1' />

                                <div class='btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m'>
                                    <i class='fs-16 zmdi zmdi-plus'></i>
                                </div>
                                <!-- Added hidden field to get the value of product image -->
                                <input type="hidden" class='mtext-104 cl3 txt-center ' id="productimage"
                                     value="<?php echo $image1; ?>">
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" name='addtocart' type="button" onclick="addToCart()">Add
                                    to
                                    cart</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </section>


        <!- -==========================Review Section============================-->
            <?php
session_start();

// initializing variables
$website_id = '';
$productName = '';
$email = '';
$rating = '';
$review    = '';
$errors = array();

$productName = $_SESSION['productname'];
$website_id = $_SESSION['websiteid'];

// echo 'productname is '.$productName;
// echo 'website id is '.$website_id;

if (isset($_POST['review_form']) && $_COOKIE['login_success'] == 'true') {
    // receive all input values from the form
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    //API URL
    if ($website_id == 1) {
        $url = 'http://jsidharth.com/bookzon/postReview.php';
    }
    if ($website_id == 3) {
        $url = 'http://sruthiduvvuri.com/Users/update_review.php';
    }
    if ($website_id == 4) {
        $url = "http://www.sushantmathur.xyz/postReview.php";
    }
    if ($website_id == 5) {
        $url = "http://mitranayak.org/mitraPostReview.php";
    }
    if ($website_id == 6) {
        $url = "http://vidita.co/insertReview.php";
    }

    //create a new cURL resource
    $ch = curl_init($url);

    //setup request to send json via POST
    $myObj->product_name = $productName;
    $myObj->body = $review ;
    $myObj->email = $email;
    $myObj->user_name = $email;
    $myObj->rating = $rating;

    $payload = json_encode($myObj);

    // echo 'payload is '.$payload;

    //attach encoded JSON string to the POST fields
    //curl_setopt( $ch, CURLOPT_POST, true ):
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type:application/json' ));

    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $result = curl_exec($ch);

    if (isset($result)) {
        echo '<script language="javascript">';
            echo 'alert("Review Posted!")';
            echo '</script>';
        
            echo "<meta http-equiv='refresh' content='0'>";
    }

    //close cURL resource
    curl_close($ch);
}

?>
            <div class='container wow fadeInUp'>
                <div class='col-md-12 '>
                    <h3><b>Rating & Reviews</b></h3>
                    <div>
                        <?php
                        $decoded_result = json_decode($reviews);

                        foreach ($decoded_result as $i => $i_value) {
                            $username =  json_decode($i_value)->user_name;
                            $body = json_decode($i_value)->body;
                            $rating = json_decode($i_value)->rating;
                            echo "<div class='list-group'>
                            <a href='#' class='list-group-item list-group-item-action flex-column w-300 align-items-start active'>
                            <div class='d-flex w-100 justify-content-between'>
                            <h5 class='mb-1' style='padding-bottom:0;margin-bottom:0'>Username: $username </h5>
                            <small>Rating: $rating</small>
                            </div>
                            <p class='mb-1' style='padding-bottom:0;margin-bottom:0'>Review: $body </p>
                            </a>
                            </div>";
                        }
                        ?>
                    </div>

                </div>

                <div class='col-md-10 '>
                    <h5><b>Post your review</b></h5>
                    <div id="errormessage"></div>
                    <form method='post' action=''  role="form" class="contactForm"> 
                        <div class='form-group'>
                            <label>Email</label>
                            <input type='email' name='email' value='' class="form-control" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required />
                            <div class="validation"></div>
                        </div>
                        <div class='form-group'>
                            <label>Rating</label>
                            <input type='number' name='rating' value=''  class="form-control" placeholder="Your Rating" data-rule="minlen:1" data-msg="Please enter your Rating"   min="0" max="5" required />
                            <div class="validation"></div>
                        </div>
                        <div class='form-group'>
                            <label>Review</label>
                            <input type='text' name='review' value='' class="form-control" placeholder="Your Review" data-rule="minlen:1" data-msg="Please enter your Review" required />
                            <div class="validation"></div>
                        </div>
                        <div class='form-group'>
                            <button type='submit' class=" btn btn-primary" name='review_form' onclick="checkLogin()" >Submit</button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- #products -->

            <a href='#' class='back-to-top'><i class='fa fa-chevron-up'></i></a>

            <!-- Required JavaScript Libraries -->
            <script src='lib/jquery/jquery.min.js'></script>
            <script src='lib/bootstrap/js/bootstrap.min.js'></script>
            <script src='lib/superfish/hoverIntent.js'></script>
            <script src='lib/superfish/superfish.min.js'></script>
            <script src='lib/morphext/morphext.min.js'></script>
            <script src='lib/wow/wow.min.js'></script>
            <script src='lib/stickyjs/sticky.js'></script>
            <script src='lib/easing/easing.js'></script>

            <!-- Template Specisifc Custom Javascript File -->
            <script src='js/custom.js'></script>


</body>

</html>