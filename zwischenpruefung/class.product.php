<?php
require_once("class.dbHelper.php");

class product {
    // Private member variables of product entity
    private $id;
    private $name;
    private $description;
    private $prize;
    private $comment;
    private $date;
    
    // Static factory methods since PHP does not support constructor overloading. 
    // Use product::withId or product::withoutId to create a new instance of product
    public static function withId($id, $name, $description, $prize, $comment, $date) {
        $instance = self::withoutId($name, $description, $prize, $comment, $date);
        $instance->setId($id);
        return $instance;
    }
    
    public static function withoutId($name, $description, $prize, $comment, $date) {
        $instance = new self();
        $instance->setName($name);
        $instance->setDescription($description);
        $instance->setPrize($prize);
        $instance->setComment($comment);
        $instance->setDate($date);
        return $instance;
    }
    
    // Public properties of product entity
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getPrize() {
        return $this->prize;
    }
    
    public function setPrize($prize) {
        $this->prize = $prize;
    }
    
    public function getComment() {
        return $this->comment;
    }
    
    public function setComment($comment) {
        $this->comment = $comment;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }
    
    // Static db operations
    public static function getAllProducts() {
        $allProducts = array();
        $sql = "SELECT * FROM product ORDER BY date DESC";
        $statement = dbHelper::executeSqlCommandAndReturnStatement($sql, null);
        $result = $statement->fetchAll(PDO::FETCH_BOTH);
        foreach ($result as $productRow) {
            $product = self::withId(
                    $productRow["id"],
                    $productRow["name"],
                    $productRow["description"],
                    $productRow["prize"],
                    $productRow["comment"],
                    $productRow["date"]);
            array_push($allProducts, $product);
        }
        return $allProducts;
    }
    
    public static function getProduct($id) {
        $sql = "SELECT * FROM product WHERE id = ?";
        $statement = dbHelper::executeSqlCommandAndReturnStatement($sql, array($id));
        $result = $statement->fetch();
        return self::withId(
                    $result["id"],
                    $result["name"],
                    $result["description"],
                    $result["prize"],
                    $result["comment"],
                    $result["date"]);
    }
    
    public static function addProduct($product) {
        $sql = "INSERT INTO product (name, description, prize, comment, date) VALUES (?, ?, ?, ?, ?)";
        dbHelper::executeSqlCommand($sql, array(
            $product->getName(),
            $product->getDescription(),
            $product->getPrize(),
            $product->getComment(),
            $product->getDate()));
    }
    
    public static function editProduct($product) {
        $sql = "UPDATE product SET name = ?, description = ?, prize = ?, comment = ?, date = ? WHERE id = ?";
        dbHelper::executeSqlCommand($sql, array(
            $product->getName(),
            $product->getDescription(),
            $product->getPrize(),
            $product->getComment(),
            $product->getDate(),
            $product->getId()));
    }
    
    public static function deleteProduct($id) {
        $sql = "DELETE FROM product WHERE id = ?";
        dbHelper::executeSqlCommand($sql, array($id));
    }
}
?>
