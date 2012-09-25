<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function getVariable($var)
            {
                if (empty($_GET[$var]) or !isset($_GET[$var]))
                {
                    throw new Exception(sprintf("GET variable '%1' is not set", $var));
                }
                return $_GET[$var];
            }
        
            $firstname = getVariable('firstname');
            $lastname = getVariable('lastname');
            $address = getVariable('address');
            $zip = getVariable('zip');
            $city = getVariable('city');
        ?>
        <p>Ihre Adresse lautet:</p>
        <p>
            <?php echo $firstname ?> <?php echo $lastname ?>
        </p>
        <p>
            <?php echo $address ?>
        </p>
        <p>
            <?php echo $zip ?> <?php echo $city ?>
        </p>
    </body>
</html>
