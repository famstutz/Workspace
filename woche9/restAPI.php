<?php
require_once "API.php";

class restAPI implements API {
    private $allowedObj = array("kantone");
    private $resource;
    private $filename;

    public function __construct($data) {
        $this->filename = $data . ".class.php";
        $this->resource = $data;
        /*$this->path = implode("/", $data);
        array_shift($data);
        if (!in_array($data[0], $this->allowedObj))
            return false;
        if (isset($data[1]) && is_numeric($data[1])) {
            $id = intval($data[1]);
            $this->resource = $data[0] . "/" . $id;
            $this->filename = "/srv/www/htdocs/rest/" . $data[0] . "/" . $id;
        } else {
            $this->resource = $data[0];
            $this->filename = "/srv/www/htdocs/rest/" . $data[0];
        }*/
    }

    public function isGET() {
        //echo "<strong>GET</strong> wurde aufgerufen auf path: " . $this->path;
        if (($this->resource == ""))
            return false;
        if (is_file($this->filename)) {
            readfile($this->filename);
        } else {
            echo "Ressource: " . $this->resource . " ist nicht vorhanden.";
        }
    }

    public function isPOST() {
        echo "<strong>POST</strong> wurde aufgerufen auf path: " . $this->path;
        $id = time();
        if (($this->resource == "") OR (!$this->writeFile($id)))
            return false;
        fwrite($this->fileHandle, $_GET["postparam"]);
        echo "Ressource:" . $this->resource . " wurde angelegt.";
    }
}
?>
