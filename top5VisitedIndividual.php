<?php
    $servername = "sidharthjayaprakash9360963.ipagemysql.com";
    $username = "jsidharth";
    $password = "root123";
    $dbname = "market_place_1";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $website_id = $_GET["website_id"];
    
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
        echo $row['product_name'];
        echo $row['count'];
        $x++;
    }

    $conn->close();

?>