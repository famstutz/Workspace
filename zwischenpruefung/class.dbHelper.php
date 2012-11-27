<?php
class dbHelper {
    private static function getDbConnection() {
        $dsn = "mysql:host=localhost;dbname=webprogrammieren";
        try {
            $db = new PDO($dsn, "florian", "myPass");            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex) {
            echo "Connection could not be opened: " . $ex;
        }
        return $db;
    }
    
    public static function executeSqlCommand($sql, $parameters) {
        self::executeSqlCommandAndReturnStatement($sql, $parameters);
    }
    
    public static function executeSqlCommandAndReturnStatement($sql, $parameters) {
        $db = self::getDbConnection();
        $statement = $db->prepare($sql);
        $statement->execute($parameters);
        return $statement;
    }
}
?>
