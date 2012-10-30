<?php
set_include_path("./build/classes" . PATH_SEPARATOR . get_include_path());
require_once "propel/Propel.php";
Propel::init("./build/conf/rentalcompany-conf.php");
            
function __autoload($className) {
    include_once("rentalcompany/$className.php");
}
?>