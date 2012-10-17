<?php
class Swiss extends Human {
    public function __construct($name, $sex) {
        parent::__construct($name, $sex);
    }
    
    function celebrateBirthday($tether = false) {
        parent::celebrateBirthday();
        $this->governmentService($tether);
    } 
    
    function governmentService($tether) {
        if ($tether) {
            throw new Exception("At the end of the tether.");
        }
    }
}

?>
