<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Create rental</h1>
        <?php
            // set up propel
            require_once('propelLoader.php');
        
            // is this the postback?
            if ($_SERVER['REQUEST_METHOD'] == "POST")  {
                // assign variables
                $carId = $_POST['carId'];
                $customerId = $_POST['customerId'];
              
                // retrieve customer and car object
                $car = CarQuery::create()->findPk($carId);
                $customer = CustomerQuery::create()->findPk($customerId);
                 
                // create new rentalaction object
                $newRentalaction = new Rentalaction();
                $newRentalaction->setCar($car);
                $newRentalaction->setCustomer($customer);
                $newRentalaction->save();
                
                echo "<p>Successfully created a new rental.</p>";
            }
            else {
        ?>
        <form action="createRentalaction.php" method="post">
            <p>
                <label for="carId">Choose car</label>
                <select name="carId">
                    <?php
                        $cars = CarQuery::create()->find();
                        foreach ($cars as $car) {
                           echo "<option value='" . $car->getId() . "'>";
                           echo $car->getManufacturer();
                           echo "</option>";
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="customerId">Choose customer</label>
                <select name="customerId">
                    <?php
                        $customers = CustomerQuery::create()->find();
                        foreach ($customers as $customer) {
                           echo "<option value='" . $customer->getId() . "'>";
                           echo $customer->getName();
                           echo "</option>";
                        }
                    ?>
                </select>
            </p>
            <p>
                <input type="submit" value="rent car" />
            </p>
        </form>
        <?php } ?>
    </body>
</html>
