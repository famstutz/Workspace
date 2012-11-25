<?php
try {
    $dsn = "mysql:host=localhost;dbname=webprogrammieren";
    $dbh = new PDO($dsn, "florian", "myPass");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $dbh->exec("CREATE TABLE guestbook (" +
        "id INT NOT NULL AUTO_INCREMENT," +
        "sender VARCHAR(50) NOT NULL," +
        "ip_address VARCHAR(10) NOT NULL," +
        "title VARCHAR(255) NOT NULL," +
        "message VARCHAR(255) NOT NULL," +
        "date DATE NOT NULL " +
        "PRIMARY KEY (id)" +
        ")");

    $dbh->exec("INSERT INTO guestbook (sender, ip_address, title, message, date) " +
        "VALUES ('teukros', '127.0.0.1', 'Willkommen', 'Die Willkommensnachricht zum Gästebuch', '2011-11-29')");

    $dbh->exec("INSERT INTO guestbook (sender, ip_address, title, message, date) " +
        "VALUES ('paeschli', '127.0.0.1', 'Viel Erfolg', 'Ich wünsche allen viel Erfolg bei der Prüfung', '2011-11'29)");
} 
catch (PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
}
?>
