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
  $url = "http://vidita.co/getServices.php";
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
    //$data = json_decode($result);
    echo $result;
    curl_close($ch);
?>
