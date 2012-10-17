<?php
class truck extends vehicle {
    var $drivingTime = 0;
    
    function setDrivingTime($drivingTime) {
        $this->drivingTime = $drivingTime;
    }
    
    function getDrivingTime() {
        return $this->drivingTime;
    }    
}
?>
