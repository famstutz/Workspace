<?php
class car extends vehicle {
    var $passengers = 0;
    
    function addPassenger() {
        $this->passengers += 1;
    }
    
    function removePassenger() {
        $this->passengers -= 1;
    }
    
    function getPassengers() {
        return $this->passengers;
    }
}
?>
