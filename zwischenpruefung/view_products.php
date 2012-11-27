<?php
    require_once("class.product.php");
    require_once("class.cart.php");
    require_once("class.parameterHelper.php");
    
    session_start();
    
    if (!parameterHelper::isSessionParameterSet("cart")) {
        $cart = new cart();
        parameterHelper::setSessionParameter("cart", $cart);
    }
    else {
        $cart = parameterHelper::getSessionParameter("cart");
    }
    
    if(parameterHelper::isGetParameterSet("operation")) {
        $operation = parameterHelper::getGetParameter("operation");
        switch($operation) {
            case "add_to_cart": 
                $id = parameterHelper::getGetParameter("id");
                addProductToCart($cart, $id);
                break;
        } 
    }
    
    function addProductToCart($cart, $id) {
        $product = product::getProduct($id);
        $cart->addProduct($product);
        echo "<h2>Successfully added product to cart</h2>";
    }
?>

<h1>View products</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Prize</th>
        <th>Operation</th>
    </tr>
    <?php
        $products = product::getAllProducts();
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>" . $product->getName() ."</td>";
            echo "<td>" . $product->getDescription() ."</td>";
            echo "<td>" . $product->getPrize() ."</td>";
            echo "<td>[<a href='index.php?action=view_products&operation=add_to_cart&id=" . $product->getId() . "'>add-to-cart</a>]</td>";
            echo "</tr>";
        }
    ?>
</table>

<ul>
    <li>[<a href="index.php">to-main-page</a>]</li>
    <li>[<a href="index.php?action=add_remove_product">new/remove-product</a>]</li>
    <li>[<a href="index.php?action=my_cart">my-cart</a>]</li>
</ul>