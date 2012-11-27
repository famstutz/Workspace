<?php
    require_once("class.product.php");
    require_once("class.parameterHelper.php");
    
    if(parameterHelper::isGetParameterSet("operation")) {
        $operation = parameterHelper::getGetParameter("operation");
        switch($operation) {
            case "add_product": 
                addProduct(
                        parameterHelper::getPostParameter("name"),
                        parameterHelper::getPostParameter("description"),
                        parameterHelper::getPostParameter("prize"),
                        parameterHelper::getPostParameter("comment"));
                break;
            case "remove_product":
                $id = parameterHelper::getGetParameter("id");
                removeProduct($id);
                break;
        } 
    }
    
    function addProduct($name, $description, $prize, $comment) {
        date_default_timezone_set("Europe/Zurich");
        $date = date('Y-d-m', time());
        
        // Validation of user entries
        $validationIssue = false;
        if (parameterHelper::isNotSetOrEmpty($name)) {
            $validationIssue = true;
            echo "<h2>Name is not given</h2>";
        }
        if (parameterHelper::isNotSetOrEmpty($description)) {
            $validationIssue = true;
            echo "<h2>Description is not given</h2>";
        }
        if (parameterHelper::isNotSetOrEmpty($prize)) {
            $validationIssue = true;
            echo "<h2>Prize is not given</h2>";
        }
        if (parameterHelper::isNotSetOrEmpty($comment)) {
            $validationIssue = true;
            echo "<h2>Comment is not given</h2>";
        }
        
        if ($validationIssue == false) {
            $product = product::withoutId($name, $description, $prize, $comment, $date);
            product::addProduct($product);
            echo "<h2>Successfully added product</h2>";
        }
    }    
    
    function removeProduct($id) {
        product::deleteProduct($id);
        echo "<h2>Successfully removed product</h2>";
    }
?>

<h1>Add product</h1>
<form action="index.php?action=add_remove_product&operation=add_product" method="post">
    <p>
        <label for="name">Name</label>
        <input type="text" name="name" />
    </p>
    <p>
        <label for="description">Description</label>
        <input type="text" name="description" />
    </p>
    <p>
        <label for="prize">Prize</label>
        <input type="text" name="prize" />
    </p>
    <p>
        <label for="comment">Comment</label>
        <input type="text" name="comment" />
    </p>
    <p>
        <input type="submit" value="Add product" />
        <input type="reset" value="Reset" />
    </p>
</form>

<h1>Edit product</h1>
<form action="index.php" method="get">
    <p>
        <label for="id">Product</label>
        <select name="id">
            <?php
                $products = product::getAllProducts();
                foreach ($products as $product) {
                   echo "<option value='" . $product->getId() . "'>";
                   echo $product->getName();
                   echo "</option>";
                }
            ?>
        </select>
    </p>
    <p>
        <input type="hidden" name="action" value="edit_product" />
        <input type="submit" value="Edit product" />
    </p>
</form>

<h1>Remove product</h1>
<form action="index.php" method="get">
    <p>
        <label for="id">Product</label>
        <select name="id">
            <?php
                $products = product::getAllProducts();
                foreach ($products as $product) {
                   echo "<option value='" . $product->getId() . "'>";
                   echo $product->getName();
                   echo "</option>";
                }
            ?>
        </select>
    </p>
    <p>
        <input type="hidden" name="action" value="add_remove_product" />
        <input type="hidden" name="operation" value="remove_product" />
        <input type="submit" value="Remove product" />
    </p>
</form>

<ul>
    <li>[<a href="index.php">to-main-page</a>]</li>
    <li>[<a href="index.php?action=view_products">view-products</a>]</li>
    <li>[<a href="index.php?action=my_cart">my-cart</a>]</li>
</ul>