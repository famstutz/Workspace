<?php
class dbHelper {
    
    public static function getDbConnection() {
        $dsn = "mysql:host=localhost;dbname=nyc_cafes";
        try {
            $db = new PDO($dsn, "florian", "myPass");            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex) {
            echo "Connection could not be opened: " . $ex;
        }
        return $db;
    }
}

?>
