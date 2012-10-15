<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $name = $_GET['name'];
            $address = $_GET['address'];
            $gender = $_GET['gender'];
            $pizzatype = $_GET['pizzatype'];
            $extras = $_GET['extras'];
            
            $total = 11 + (count($extras) * 2);
        ?>
        <p>
            Dear <?php echo $name ?> (<?php echo $gender ?>) in <?php echo $address ?>.
        </p>
        <p>
            You ordered a pizza <?php echo $pizzatype ?> with the following extras:
        </p>
        <ul>
            <?php foreach($extras as $extra) {
                echo "<li>" . $extra . "</li>";
            } ?>
        </ul>
        <p>
            The total price of your order is <?php echo $total ?> CHF.
        </p>
    </body>
</html>
