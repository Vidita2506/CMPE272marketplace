<?php
$visited = array();
$cookie_name = "lastvisited";
 if(isset($_COOKIE[$cookie_name])) {
    $visitedcookie = json_decode($_COOKIE[$cookie_name], true);
} else {
    $visitedcookie = $visited;
} 
?>

<html>
<h3>Your last 5 visited services</h3><br>
 <a href=""> <?= $visitedcookie[0] ?> </a><br>
 <a href=""> <?= $visitedcookie[1] ?></a> <br>
 <a href=""> <?= $visitedcookie[2] ?></a> <br>
 <a href=""> <?= $visitedcookie[3] ?></a> <br>
 <a href=""> <?= $visitedcookie[4] ?></a> <br><br><br>
 <a href="">Back To Services</a>
</html>