<?php
require_once("restAPI.php");

class Resolver {
    var $HTTPMethod;
    var $APIObj;

    public function __construct() {
        $this->HTTPMethod = $_SERVER["REQUEST_METHOD"];
        $this->pathResolver();
        switch ($this->HTTPMethod) {
            case "GET":
                $this->APIObj->isGET();
                break;
            case "POST":
                $this->APIObj->isPOST();
                break;
            case "PUT":
                $this->APIObj->isPUT();
                break;
            case "DELETE":
                $this->APIObj->isDELETE();
                break;
            default:
                $this->error();
        }
    }

    private function pathResolver() {
        if ($_GET["service"] == "")
            die("Keine API angegeben.");
        $data = $_GET["service"];
        $this->APIObj = new restAPI($data);
    }
}

$resolver = new Resolver();
?>