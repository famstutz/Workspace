<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Create car</h1>
        <?php
            // set up propel
            require_once('propelLoader.php');
        
            // is this the postback?
            if ($_SERVER['REQUEST_METHOD'] == "POST")  {
                // assign variables
                 $manufacturer = $_POST['manufacturer'];
                 $color = $_POST['color'];
                 $mileage = $_POST['mileage'];
                 $maxspeed = $_POST['maxspeed'];
                
                // create new car object
                $newCar = new Car();
                $newCar->setManufacturer($manufacturer);
                $newCar->setColor($color);
                $newCar->setMilage($mileage);
                $newCar->setMaxspeed($maxspeed);
                $newCar->save();
                
                echo "<p>Successfully created a new car.</p>";
            }
            else {
        ?>
        <form action="createCar.php" method="post">
            <p>
                <label for="manufacturer">Manufacturer</label>
                <input type="text" name="manufacturer" />
            </p>
            <p>
                <label for="color">Color</label>
                <input type="text" name="color" />
            </p>
            <p>
                <label for="mileage">Mileage</label>
                <input type="text" name="mileage" />
            </p>
            <p>
                <label for="maxspeed">Max. speed</label>
                <input type="text" name="maxspeed" />
            </p> 
            <p>
                <input type="submit" value="save" />
            </p>
        </form>
        <?php } ?>
    </body>
</html>
