<?php
class vehicle {
    const velocityIncrease = 10;
    var $velocity = 0;
        
    function vehicle($velocity) {
        $this->velocity = $velocity;
    }
    
    function accelerate() {
        $this->speed += self::velocityIncrease;
    }
    
    function decelerate() {
        $this->speed -= self::velocityIncrease;
    }
    
    function getVelocity() {
        return $this->velocity;
    }        
}
?>
