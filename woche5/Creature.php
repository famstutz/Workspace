<?php
abstract class Creature implements IGrowth {
    var $age = 0;
    var $sex;
    
    abstract function age();
    
    function getAge() {
        return $this->age;
    }
}
?>
