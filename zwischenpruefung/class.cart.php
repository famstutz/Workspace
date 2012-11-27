<?php
require_once("class.dbHelper.php");

class cart {
    // Private member variables of cart entity
    private $products;
    
    // Constructor
    public function __construct() {
        $this->products = array();
    }
    
    // Public properties of cart entity
    public function getProducts() {
        return $this->products;
    }
    
    public function setProducts($products) {
        $this->products = $products;
    }
    
    // Public functions of cart entity
    public function getAllProducts() {
        return $this->getProducts();
    }
    
    public function addProduct($product) {
        array_push($this->products, $product);
    }
    
    public function removeProduct($product) {
        if (!in_array($product, $this->products)) {
            throw new Exception("Product '" . $product ."' is not in cart.");
        }
        $key = array_search($product, $this->products);
        unset($this->products[$key]);
    }
    
    public function clearCart() {
        $this->products = array();
    }
}
?>
