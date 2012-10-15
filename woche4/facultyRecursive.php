<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function faculty($n)
            {
                $sum = 1;
                for($i = 1; $i <= $n; $i++) {
                    $sum *= $i;
                }
                return $sum;
            }
        ?>
        <p>
            Faculty of 3 = <?php echo faculty(3) ?>.
        </p>
        <p>
            Faculty of 6 = <?php echo faculty(6) ?>.
        </p>
        <p>
            Faculty of 9 = <?php echo faculty(9) ?>.
        </p>
    </body>
</html>
