<?php
  function trackVisit($service_value){ 
     // Last Visited
      $visited = array();
      $cookie_name = "lastvisited";
      if(isset($_COOKIE[$cookie_name])) {
         $visitedcookie = json_decode($_COOKIE[$cookie_name], true);
         $index = array_search($service_value, $visitedcookie);
         if($index !== false){
            unset($visitedcookie[$index]); 
         } 
         array_unshift($visitedcookie, $service_value);
         $lengthOfArray = sizeof($visitedcookie);
         if ( $lengthOfArray > 5 ) {
            array_pop($visitedcookie);
          }
          setcookie($cookie_name, json_encode($visitedcookie), time()+(60*60*24*30));
      } else {
          array_unshift($visited, $service_value);
          setcookie($cookie_name, json_encode($visited), time()+(60*60*24*30));
      }
  }
?>