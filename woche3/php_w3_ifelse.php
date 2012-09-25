<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function calculatePrice($type, $amount)
            {
                $factor = 0;
                switch($type)
                {
                    case 'D':
                        $factor = 1.25;
                        break;
                    case 'S':
                        $factor = 1.4;
                        break;
                    case 'N':
                        $factor = 1.35;
                        break;
                }
                return $amount * $factor;
            }
            
            $amount = $_GET['amount'];
            $type = $_GET['type'];
        ?>
        <p>
            <?php echo $amount ?> Liter Benzin vom Typ 
            <strong><?php echo $type ?></strong> kosten 
            <?php echo calculatePrice($type, $amount) ?> sFr.
        </p>
    </body>
</html>
