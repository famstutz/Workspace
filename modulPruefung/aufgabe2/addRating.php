<?php
    require_once("autoloader.php");
    
    // assign parameters
    $cafeId = $_GET["cafeId"];
    $ratingId = $_GET["ratingId"];
    
    // add rating to database
    $cafe = new cafe();
    $cafe->addRating($cafeId, $ratingId);
    
    // read new rating count and return
    $rating = $cafe->getRatingCount($cafeId, $ratingId);
    echo $rating[0]["count"];
?>
