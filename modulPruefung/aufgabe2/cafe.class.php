<?php
class cafe {
    public function read() {
        $db = dbHelper::getDbConnection();
        $sql = "SELECT * FROM cafes";
        $statement = $db->prepare($sql);
        $statement->execute();
        $return = $statement->fetchAll(PDO::FETCH_BOTH);
        return $return;
    }
    
    public function getRatingCount($cafeId, $ratingId) {
        $db = dbHelper::getDbConnection();
        $sql = "SELECT COUNT(*) AS count FROM cafes_ratings WHERE cafe_id = ? AND rating_id = ?";
        $statement = $db->prepare($sql);
        $statement->execute(array($cafeId, $ratingId));
        $return = $statement->fetchAll(PDO::FETCH_BOTH);
        return $return;
    }
    
    public function addRating($cafeId, $ratingId) {
        $db = dbHelper::getDbConnection();
        $sql = "INSERT INTO cafes_ratings (cafe_id, rating_id) VALUES (?, ?)";
        $statement = $db->prepare($sql);
        $statement->execute(array($cafeId, $ratingId));
    }
}
?>