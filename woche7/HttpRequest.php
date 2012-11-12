<?php
class HttpRequest implements Request {
    public function getHeader($name) {
        $headers = getallheaders();
        return $headers[$name];
    }

    public function getParameter($name) {
        if ($this->issetParameter($name)) {
            return $_GET[$name];
        }
        throw new Exception(sprintf("GET variable '%1' is not set", $name));
    }

    public function getParameterNames() {
        $names = array();
        foreach ($_GET as $key => $value) {
            $names[] = $key;
        }            
        return $names;
    }

    public function issetParameter($name) {
        if (empty($_GET[$name]) or !isset($_GET[$name])) {
            return false;
        }
        return true;
    }
}
?>
