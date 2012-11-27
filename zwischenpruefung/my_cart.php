<?php
    require_once("class.cart.php");
    require_once("class.product.php");
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
            case "remove_from_cart": 
                $id = parameterHelper::getGetParameter("id");
                removeFromCart($cart, $id);
                break;
            case "clear_cart":
                clearCart($cart);
                break;
        } 
    }
    
    function removeFromCart($cart, $id) {
         $product = product::getProduct($id);
         $cart->removeProduct($product);
         echo "<h2>Successfully removed product from cart</h2>";
    }
    
    function clearCart($cart) {
        $cart->clearCart();
        echo "<h2>Successfully cleared the cart</h2>";
    }
?>

<h1>My cart</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Prize</th>
        <th>Operation</th>
    </tr>
    <?php
        $products = $cart->getProducts();
        $totalPrize = 0;
        foreach ($products as $product) {
            $totalPrize += $product->getPrize();
            echo "<tr>";
            echo "<td>" . $product->getName() ."</td>";
            echo "<td>" . $product->getDescription() ."</td>";
            echo "<td>" . $product->getPrize() ."</td>";
            echo "<td>[<a href='index.php?action=my_cart&operation=remove_from_cart&id=" . $product->getId() . "'>remove-from-cart</a>]</td>";
            echo "</tr>";
        }
    ?>
    <tr>
        <td colspan="2">Total:</td>
        <td>
            <?php echo $totalPrize ?>
        </td>
        <td>
            [<a href="index.php?action=my_cart&operation=clear_cart">clear-cart</a>]
        </td>
    </tr>
</table>

<ul>
    <li>[<a href="index.php">to-main-page</a>]</li>
    <li>[<a href="index.php?action=view_products">view-products</a>]</li>
</ul>