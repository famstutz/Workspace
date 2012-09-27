<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function calculate($n1, $n2, &$sum, &$product)
            {
                $sum = $n1 + $n2;
                $product = $n1 * $n2;
            }
        
            $n1 = 7;
            $n2 = 5;
            $sum;
            $product;
            
            calculate($n1, $n2, $sum, $product);
        ?>
        <p>
            Die Summe von <?php echo $n1 ?> und <?php echo $n2 ?> ist <?php echo $sum ?>.
        </p>
        <p>
            Das Produkt von <?php echo $n1 ?> und <?php echo $n2 ?> ist <?php echo $product ?>.
        </p>
    </body>
</html>
