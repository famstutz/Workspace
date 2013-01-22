<?php
class favorite {
    public function __construct() {
        session_start();
        
        if (!isset($_SESSION["favorites"])) {
            $_SESSION["favorites"] = array();
        }
    }
    
    public function set($cafeId) {
        array_push($_SESSION["favorites"], $cafeId);
    }
    
    public function isFavorite($cafeId) {
        return in_array($cafeId, $_SESSION["favorites"]);
    }
}
?>
