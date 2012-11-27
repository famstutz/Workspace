<?php
    require_once("class.product.php");
    require_once("class.parameterHelper.php");
    
    if(parameterHelper::isGetParameterSet("id")) {
        if (parameterHelper::isGetParameterSet("operation")) {
            $operation = parameterHelper::getGetParameter("operation");
            switch($operation) {
                case "edit": 
                    editProduct(
                            parameterHelper::getGetParameter("id"),
                            parameterHelper::getPostParameter("name"),
                            parameterHelper::getPostParameter("description"),
                            parameterHelper::getPostParameter("prize"),
                            parameterHelper::getPostParameter("comment"));
                    break;
            } 
        }
        else {
            $id = parameterHelper::getGetParameter("id");
            printProduct($id);
        }
    }
    
    function editProduct($id, $name, $description, $prize, $comment) {
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
            $product = product::getProduct($id);
            $product->setName($name);
            $product->setDescription($description);
            $product->setPrize($prize);
            $product->setComment($comment);
            $product->setDate($date);
            product::editProduct($product);
            echo "<h2>Successfully edited product</h2>";
        }
    }    
    
    function printProduct($id) {
        $product = product::getProduct($id);
    }
    
    function getCurrentProduct() {
        $id = parameterHelper::getGetParameter("id");
        return product::getProduct($id);
    }
?>

<h1>Edit product</h1>
<form action="index.php?action=edit_product&id=<?php echo getCurrentProduct()->getId() ?>&operation=edit" method="post">
    <p>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo getCurrentProduct()->getName() ?>" />
    </p>
    <p>
        <label for="description">Description</label>
        <input type="text" name="description" value="<?php echo getCurrentProduct()->getDescription() ?>" />
    </p>
    <p>
        <label for="prize">Prize</label>
        <input type="text" name="prize" value="<?php echo getCurrentProduct()->getPrize() ?>" />
    </p>
    <p>
        <label for="comment">Comment</label>
        <input type="text" name="comment" value="<?php echo getCurrentProduct()->getComment() ?>" />
    </p>
    <p>
        <input type="submit" value="Edit product" />
    </p>
</form>

<ul>
    <li>[<a href="index.php">to-main-page</a>]</li>
    <li>[<a href="index.php?action=view_products">view-products</a>]</li>
    <li>[<a href="index.php?action=my_cart">my-cart</a>]</li>
</ul>