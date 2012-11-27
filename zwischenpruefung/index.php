<?php 
    require_once("class.parameterHelper.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if (!parameterHelper::isGetParameterSet("action")) {
        ?>
        <ul>
            <li>[<a href="index.php?action=add_remove_product">new/remove-product</a>]</li>
            <li>[<a href="index.php?action=view_products">view-products</a>]</li>
            <li>[<a href="index.php?action=my_cart">my-cart</a>]</li>
        </ul>
        <?php
            }
            else {
                $action = parameterHelper::getGetParameter("action");
                require_once("$action.php");
            }
        ?>
    </body>
</html>
