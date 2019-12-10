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
 <a href="<?= $visitedcookie[0] ?>.php"> <?= $visitedcookie[0] ?> </a><br>
 <a href="<?= $visitedcookie[1] ?>.php"> <?= $visitedcookie[1] ?></a> <br>
 <a href="<?= $visitedcookie[2] ?>.php"> <?= $visitedcookie[2] ?></a> <br>
 <a href="<?= $visitedcookie[3] ?>.php"> <?= $visitedcookie[3] ?></a> <br>
 <a href="<?= $visitedcookie[4] ?>.php"> <?= $visitedcookie[4] ?></a> <br><br><br>
 <a href="services.php">Back To Services</a>
</html>