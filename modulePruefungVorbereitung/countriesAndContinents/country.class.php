<?php

class country {
    public function getAllCountries() {
        $db = self::getDbConnection();
        $sql = "SELECT Code, Name, Continent FROM Country";
        $statement = $db->prepare($sql);
        $statement->execute();
        $return = $statement->fetchAll(PDO::FETCH_BOTH);
        return $return;
    }
    
    public function getAllContinents() {
        $db = self::getDbConnection();
        $sql = "SELECT Continent FROM Country GROUP BY Continent ORDER BY Continent";
        $statement = $db->prepare($sql);
        $statement->execute();
        $return = $statement->fetchAll(PDO::FETCH_BOTH);
        return $return;
    }
    
    public function updateCountry($code, $name, $continent) {
        $db = self::getDbConnection();
        $sql = "UPDATE Country SET Name = ?, Continent = ? WHERE Code = ?";
        $statement = $db->prepare($sql);
        $statement->execute(array($name, $continent, $code));
    }
    
    private static function getDbConnection() {
        $dsn = "mysql:host=localhost;dbname=world";
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
