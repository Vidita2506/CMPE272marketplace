<?php

$website_id = $_GET["website_id"];
$productname = array();
$productimage = array();

if ($website_id == 1) {
    $url = "http://jsidharth.com/bookzon/getProductDetail.php?product_id=";
    $companyName = 'Bookzon';
}
if ($website_id == 2) {
    $url = 'http://tejasmadappa.com/VRGrad/getProductDetail.php';
    $companyName = 'VRGRAD';
}
if ($website_id == 3) {
    $url = "http://sruthiduvvuri.com/Users/getProductDetail.php?product_id=";
    $companyName = 'PPM Software Solutions';
}
if ($website_id == 4) {
    $url = "http://sushantmathur.xyz/get_prod.php?product_id=";
    $companyName = 'Arcade Motor Services';
}
if ($website_id == 5) {
    $url = "http://www.mitranayak.org/mitraSingleProduct.php?product_id=";
    $companyName = 'Platinum County Gym';
}
if ($website_id == 6) {
    $url = "http://vidita.co/getProductDetails.php?product_id=";
    $companyName = 'Fitness Studio';
}

$avg_ratings_all = array();
for ($i = 0; $i < 10; $i++) {
    $index = $i + 1;
    $producturl = $url.($index);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $producturl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));
    $result = curl_exec($ch);
    $productName = json_decode($result) ->product_name;
    $productDescripton = json_decode($result) ->product_description;
    $image1 = json_decode($result)->product_image;
    $image =  "background-image: url(".$image1.");";
    $price = json_decode($result) ->price;
    $reviews = json_decode($result) ->reviews;
    
    $productname[$index] = $productName;
    $productimage[$index] = $image;  

    $decoded_reviews = json_decode($reviews);
    $average_rating = 0;
    $total_reviews_count = 0;
    foreach ($decoded_reviews as $rkey => $rvalue) {
        $username =  json_decode($rvalue)->user_name;
        $body = json_decode($rvalue)->body;
        $rating = json_decode($rvalue)->rating;
        $average_rating = $rating + $average_rating;
        $total_reviews_count = $total_reviews_count + 1;
    }
    if ($total_reviews_count > 0) {
        $average_rating = $average_rating / $total_reviews_count;
    }
 
    $average_rating = round($average_rating, 2);
    $avg_ratings_all[$index] = $average_rating;
    curl_close($ch);
}

arsort($avg_ratings_all);

foreach ($avg_ratings_all as $key => $val) {
    echo $key." ";
    echo $productname[$key]." ";
    echo $productimage[$key]." ";
    echo $val."<br>";
}
?>