<?php
session_start();
$website_id = $_GET['website_id'];
$_SESSION['websiteid'] = $website_id;

$product_id = $_GET['product_id'];

if ( $website_id == 1 ) {
    $url = "http://jsidharth.com/bookzon/getProductDetail.php?product_id=$product_id";
    $companyName = 'Bookzon';
}
if ( $website_id == 2 ) {
    $url = 'http://tejasmadappa.com/VRGrad/response.php';
    $companyName = 'VRGRAD';

}
if ( $website_id == 3 ) {
    $url = "http://sruthiduvvuri.com/Users/getProductDetail.php?product_id=$product_id";
    $companyName = 'PPM Software Solutions';

}
if ( $website_id == 4 ) {
    $url = 'http://www.sushantmathur.xyz/get_prod.php';
    $companyName = 'Arcade Motor Services';

}
if ( $website_id == 5 ) {
    $url = 'http://www.mitranayak.org/mitraProducts.php';
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
//echo 'Result is '.$result;
$productName = json_decode( $result ) ->product_name;
$_SESSION['productname'] = $productName;
// echo 'product name is '.$productName;
$productDescripton = json_decode( $result ) ->product_description;
// echo 'product description is '.$productDescripton;
$image = json_decode( $result )->product_image;
// echo $image;

$price = json_decode( $result ) ->price;
// echo 'product price is '.$price;
$reviews = json_decode( $result ) ->reviews;

echo 'reviews'.$reviews;
$decoded_result = json_decode( $reviews );
for ( $i = 0; $i<10; $i++ ) {
    $user_name[$i] = json_decode( $decoded_result[$i] )->user_name;
    echo $user_name[$i];
    $body[$i] = json_decode( $decoded_result[$i] )->body;
    echo $body[$i];
    $rating[$i] = json_decode( $decoded_result[$i] )->rating;
    echo $rating[$i];
}

// $decoded_result = json_decode( $result );
// echo 'Decoded Result'.$decoded_result;
curl_close( $ch );
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'utf-8'>
<title>Imperial Boootstrap Template</title>
<meta content = 'width=device-width, initial-scale=1.0' name = 'viewport'>
<meta content = '' name = 'keywords'>
<meta content = '' name = 'description'>

<!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
<meta property = 'og:title' content = ''>
<meta property = 'og:image' content = ''>
<meta property = 'og:url' content = ''>
<meta property = 'og:site_name' content = ''>
<meta property = 'og:description' content = ''>

<!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
<meta name = 'twitter:card' content = 'summary'>
<meta name = 'twitter:site' content = ''>
<meta name = 'twitter:title' content = ''>
<meta name = 'twitter:description' content = ''>
<meta name = 'twitter:image' content = ''>

<!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
<link href = 'favicon.ico' rel = 'shortcut icon'>

<!-- Google Fonts -->
<link href = 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800' rel = 'stylesheet'>

<!-- Bootstrap CSS File -->
<link href = 'lib/bootstrap/css/bootstrap.min.css' rel = 'stylesheet'>

<!-- Libraries CSS Files -->
<link href = 'lib/font-awesome/css/font-awesome.min.css' rel = 'stylesheet'>
<link href = 'lib/animate-css/animate.min.css' rel = 'stylesheet'>

<!-- Main Stylesheet File -->
<link href = 'css/style.css' rel = 'stylesheet'>

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
    function getCookie(name)
    {
        var re = new RegExp(name + "=([^;]+)");
        var value = re.exec(document.cookie);
        return (value != null) ? unescape(value[1]) : null;
    }

    function addToCart() {
        if(!getCookie("login_success")) {
            alert("Please login to add items to cart!");
        } else {
            const item = {
                productname: document.getElementById('productname').innerText.substring(14),
                productprice: document.getElementById('productprice').innerText.substring(15),
                quantity: document.getElementById('productquantity').value
            };
            let currentCart = [];
            let itemexists = false;
            if(sessionStorage.getItem('cart')){
                currentCart = JSON.parse(sessionStorage.getItem('cart'));
                if(currentCart && currentCart.length) {
                    currentCart.forEach(cartItem => {
                        if(item.productname === cartItem.productname) {
                            cartItem.quantity = item.quantity;
                            itemexists = true;
                        }
                    })
                }
            }
            if(!itemexists) {
                currentCart.push(item);
            }
            sessionStorage.setItem("cart", JSON.stringify(currentCart))
        }
    }
</script>
<div id = 'preloader'></div>
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

<!- -===  ===  ===  ===  ===  ===  ===  ===  ==
Products Section
===  ===  ===  ===  ===  ===  ===  ===  ===  = -->
<div class = 'row container'>
<section id = 'productdetails'>
<br/><br/>
<div class = 'container about-container wow fadeInUp'>
<div class = 'row'>
<div class = 'col-md-1' >
<img src = "<?php echo $image; ?>" alt = 'image' style = 'width:350px;height:328px;'>
</div>
<br/><br/><br/><br/>
<div class = 'col-md-13 about-content pull-right'>
<h3 class = 'productdetail-name' id='productname'><?php echo 'Product Name: '.$productName ?></h3>
<p class = 'productdetail-description'>
<?php echo 'Product Description: '.$productDescripton?>
</p>
<p class = 'product-price' id='productprice'>
<?php echo 'Product Price '."$".$price ?>
</p>
</div>
</div>
</div>
</section>
</div>
<!-- - -->

<!- -===  ===  ===  ===  ===  ===  ===  ===  ==
Add to Cart Section
===  ===  ===  ===  ===  ===  ===  ===  ===  = -->

<div class = 'p-t-33'>

<form method = 'POST'>
<div class = 'flex-w flex-r-m p-b-10'>
<div class = 'size-204 flex-w flex-m respon6-next'>
<div class = 'wrap-num-product flex-w m-r-20 m-tb-10'>
<div class = 'btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m'>
<i class = 'fs-16 zmdi zmdi-minus'></i>
</div>

<input class = 'mtext-104 cl3 txt-center ' type = 'number' id= 'productquantity' name = 'num-product' value = '1'>

<div class = 'btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m'>
<i class = 'fs-16 zmdi zmdi-plus'></i>
</div>
</div>

<button class = 'flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04' name = 'addtocart' type="button" onclick="addToCart()"">
Add to cart
</button>

</div>
</div>
</form>
</div>

<!- -===  ===  ===  ===  ===  ===  ===  ===  ==
Review Section
===  ===  ===  ===  ===  ===  ===  ===  ===  = -->
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

if ( isset( $_POST['review_form'] ) ) {
    // receive all input values from the form
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    //API URL
    if ( $website_id == 3 ) {
        $url = 'http://sruthiduvvuri.com/Users/update_review.php';
    }

    //create a new cURL resource
    $ch = curl_init( $url );

    //setup request to send json via POST
    $myObj->product_name = $productName;
    $myObj->body = $review ;
    $myObj->email = $email;
    $myObj->user_name = $email;
    $myObj->rating = $rating;

    $payload = json_encode( $myObj );

    // echo 'payload is '.$payload;

    //attach encoded JSON string to the POST fields
    //curl_setopt( $ch, CURLOPT_POST, true ):
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );

    //set the content type to application/json
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Content-Type:application/json' ) );

    //return response instead of outputting
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

    //execute the POST request
    $result = curl_exec( $ch );

    if ( isset( $result ) ) {
        echo '<script language="javascript">';
        echo 'alert("Review Posted!")';
        echo '</script>';
    }

    //close cURL resource
    curl_close( $ch );

}

?>
<div class = 'row container'>
<div class = 'col-md-4 '>
<h3><b>Rating & Reviews</b></h3>
</div>
<div class = 'col-md-10 '>

<form method = 'post' action = ''>

<div class = 'input-group'>
<label>Email</label>
<input type = 'email' name = 'email' value = ''>
</div>
<div class = 'input-group'>
<label>Rating</label>
<input type = 'text' name = 'rating' value = ''>
</div>
<div class = 'input-group'>
<label>Review</label>
<input type = 'text' name = 'review' value = ''>
</div>
<div class = 'input-group'>
<button type = 'submit' class = 'btn' name = 'review_form'>Submit</button>
</div>

</form>
</div>
</div>

<!-- #products -->

<a href = '#' class = 'back-to-top'><i class = 'fa fa-chevron-up'></i></a>

<!-- Required JavaScript Libraries -->
<script src = 'lib/jquery/jquery.min.js'></script>
<script src = 'lib/bootstrap/js/bootstrap.min.js'></script>
<script src = 'lib/superfish/hoverIntent.js'></script>
<script src = 'lib/superfish/superfish.min.js'></script>
<script src = 'lib/morphext/morphext.min.js'></script>
<script src = 'lib/wow/wow.min.js'></script>
<script src = 'lib/stickyjs/sticky.js'></script>
<script src = 'lib/easing/easing.js'></script>

<!-- Template Specisifc Custom Javascript File -->
<script src = 'js/custom.js'></script>

<script src = 'contactform/contactform.js'></script>

</body>

</html>
