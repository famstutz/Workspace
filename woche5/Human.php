<?php
class Human extends Creature {
    var $name;
    public static $ancestor = '';
    
    public function __construct($name, $sex) {
        $this->name = $name;
        $this->sex = $sex;
    }
    
    public function __destruct() {
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function rename($newName) {
        $this->name = $newName;
    }
    
    public function age() {
        $this->age += 1;
    }
    
    public function celebrateBirthday() {
        $this->age();
        return "Yay! One year older!";
    }
    
    public function newEvolutionTheory($newAncestor) {
        self::$ancestor = $newAncestor;
    }
    
    public function getAncestor() {
        return self::$ancestor;
    }
}
?>
