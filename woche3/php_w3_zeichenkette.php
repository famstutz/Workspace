<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $article1 = 22.5;
            $article2 = 13.5;
            $article3 = 16.8;
            $tax = 1.076;
            $totalprice = ($article1 + $article2 + $article3) * $tax;
            echo $totalprice;
        ?>
    </body>
</html>
