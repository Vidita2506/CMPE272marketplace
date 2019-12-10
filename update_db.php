<?php
    $servername = "sidharthjayaprakash9360963.ipagemysql.com";
    $username = "jsidharth";
    $password = "root123";
    $dbname = "market_place_1";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if(!$conn){
        die("Connection failed!!!!" .mysqli_connect_error());
    }

    $sql_init = "SELECT * FROM product_visits WHERE product_name='<FILL IN>' LIMIT 1";

    $result = $conn->query($sql_init);
    $row = mysqli_fetch_assoc($result);
    $current = $row['count']++;

    $sql_new = "UPDATE product_visits SET count=$current WHERE product_name='<FILL IN>'";

    $conn->query($sql_new);

    $conn->close();

?>