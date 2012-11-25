<?php
class guestbook {
    public function load($filter = 10) {
        $db = self::getDbConnection();
        $sql = "SELECT * FROM guestbook ORDER BY date DESC LIMIT 10";
        $statement = $db->prepare($sql);
        $statement->execute(array($filter));
        $return = $statement->fetchAll(PDO::FETCH_BOTH);
        return $return;
    }
    
    public function get($id) {
        $db = self::getDbConnection();
        $sql = "SELECT * FROM guestbook WHERE id = ?";
        $statement = $db->prepare($sql);
        $statement->execute(array($id));
        $return = $statement->fetchAll(PDO::FETCH_BOTH);
        return $return;
    }            
    
    public function edit($id, $sender, $ip_address, $title, $message, $date) {
        $db = self::getDbConnection();
        $sql = "UPDATE guestbook SET sender = ?, ip_address = ?, title = ?, message = ?, date = ? WHERE id = ?";
        $statement = $db->prepare($sql);
        $statement->execute(array($sender, $ip_address, $title, $message, $date, $id));
    }
    
    public function add($sender, $ip_address, $title, $message, $date) {
        $db = self::getDbConnection();
        $sql = "INSERT INTO guestbook (sender, ip_address, title, message, date) VALUES (?, ?, ?, ?, ?)";
        $statement = $db->prepare($sql);
        $statement->execute(array($sender, $ip_address, $title, $message, $date));
    }
    
    public function delete($id) {
        $db = self::getDbConnection();
        $sql = "DELETE FROM guestbook WHERE id = ?";
        $statement = $db->prepare($sql);
        $statement->execute(array($id));
    }
    
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
}
?>
