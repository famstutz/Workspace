<?php
class parameterHelper {
    public static function isGetParameterSet($name) {
        if (isset($_GET[$name]) || !empty($_GET[$name])) {
            return true;
        }
        return false;
    }
    
    public static function getGetParameter($name) {
        if (!self::isGetParameterSet($name)) {
            throw new Exception("Get parameter '" . $name . "' is not available in the HTTP request.");
        }
        return $_GET[$name];
    }
    
    public static function isSessionParameterSet($name) {
         if (isset($_SESSION[$name]) || !empty($_SESSION[$name])) {
            return true;
        }
        return false;
    }
    
    public static function getSessionParameter($name) {
        if (!self::isSessionParameterSet($name)) {
            throw new Exception("Session parameter '" . $name . "' is not available.");
        }
        return $_SESSION[$name];
    }
    
    public static function setSessionParameter($name, $value) {
        $_SESSION[$name] = $value;
    }
    
    public static function isPostParameterSet($name) {
        if (isset($_POST[$name]) || !empty($_POST[$name])) {
            return true;
        }
        return false;
    }
    
    public static function getPostParameter($name) {
        if (!self::isPostParameterSet($name)) {
            throw new Exception("Post parameter '" . $name . "' is not available in the HTTP request.");
        }
        return $_POST[$name];
    }
    
    public static function isNotSetOrEmpty($var) {
        if (!isset($var) || empty($var)) {
            return true;
        }
        return false;
    }
}
?>
