<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function bigger($n1, $n2) 
            {
                if ($n1 > $n2)
                {
                    return $n1;
                }
                return $n2;
            }
        ?>
        <p>
            Maximum: <?php echo bigger(2, 4); ?>
        </p>
        <p>
            Maximum: <?php echo bigger(12, 8); ?>
        </p>
        <p>
            Maximum: <?php echo bigger(13, 12.999); ?>
        </p>
    </body>
</html>
