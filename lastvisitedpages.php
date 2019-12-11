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
foreach ($visitedcookie as $product) {
    $contents = explode("-", $product);
    $website_id = $contents[0];
    $product_id = $contents[1];
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
    array_unshift($products, $productName);
    array_unshift($websites, $website_id);
    array_unshift($productids, $product_id);
}

?>

<html>
<h3>Your last 5 visited services</h3><br>
 <a href="showProductDetailsNoTracking.php?website_id=<?=$websites[0] ?>&product_id=<?=$productids[0]?>"> <?= $products[0] ?> </a><br>
 <a href="showProductDetailsNoTracking.php?website_id=<?=$websites[1] ?>&product_id=<?=$productids[1]?>"> <?= $products[1] ?> </a><br>
<a href="showProductDetailsNoTracking.php?website_id=<?=$websites[1] ?>&product_id=<?=$productids[2]?>"> <?= $products[2] ?> </a><br>
<a href="showProductDetailsNoTracking.php?website_id=<?=$websites[1] ?>&product_id=<?=$productids[3]?>"> <?= $products[3] ?> </a><br>
<a href="showProductDetailsNoTracking.php?website_id=<?=$websites[1] ?>&product_id=<?=$productids[4]?>"> <?= $products[4] ?> </a><br>
</html>