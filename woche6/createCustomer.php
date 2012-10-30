<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Create customer</h1>
        <?php
            // set up propel
            require_once('propelLoader.php');
        
            // is this the postback?
            if ($_SERVER['REQUEST_METHOD'] == "POST")  {
                // assign variables
                $name = $_POST['name'];
                
                // create new customer object
                $newCustomer = new Customer();
                $newCustomer->setName($name);
                $newCustomer->save();
                
                echo "<p>Successfully created a new customer.</p>";
            }
            else {
        ?>
        <form action="createCustomer.php" method="post">
            <p>
                <label for="name">Name</label>
                <input type="text" name="name" />
            </p>
            <p>
                <input type="submit" value="save" />
            </p>
        </form>
        <?php } ?>
    </body>
</html>
