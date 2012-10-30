<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            set_include_path("./build/classes" . PATH_SEPARATOR . get_include_path());
            require_once "propel/Propel.php";
            Propel::init("./build/conf/rentalcompany-conf.php");
            require_once "rentalcompany/Car.php";
            $bmw = new Car();
            $bmw->setManufacturer("BMW");
            $bmw->setColor("blau");
            $bmw->setMilage(0);
            $bmw->setMaxspeed(200);
            $bmw->save();
        ?>
    </body>
</html>
