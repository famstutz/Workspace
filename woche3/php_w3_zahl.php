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
            $tax = 0.076;
            $netsum = $article1 + $article2 + $article3;
            $totalsum = $netsum + ($netsum * $tax);
        ?>
        <p>Artikel 1: <?php echo $article1 ?></p>
        <p>Artikel 2: <?php echo $article2 ?></p>
        <p>Artikel 3: <?php echo $article3 ?></p>
        <p>Nettosumme: <?php echo $netsum ?></p>
        <p>Mehrwertsteuer: <?php echo $tax * 100 ?>%</p>
        <p>Bruttosumme: <?php echo $totalsum ?></p>
    </body>
</html>
