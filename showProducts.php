<?php
$website_id = $_GET["website_id"];

 $url = "http://vidita.co/getServices.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));
    $result = curl_exec($ch);
    $json = json_decode($result);

    echo '<table celpadding = "0" cellspacing="0" class = "db-table">';
    echo '<tr><th>Name</th><th>Description</th><th>Image</th>';
    foreach($json as $object){
        echo '<tr>';
        echo '<td>',$object->name,'</td>';
        echo '<td>',$object->description,'</td>';
        echo '<td>',$object->image,'</td>';
    }
    curl_close($ch);

?>
