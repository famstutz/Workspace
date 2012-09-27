<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Alter</th>
            </tr>
            <?php
                $alter = array("Peter" => 35, "Philipp" => 42, "Dominik" => 16, "Laura" => 17, "Monika" => 42, "Hans-Peter" => 55);
                foreach($alter as $name => $age)
                {
                    echo "<tr><td>" . $name . "</td><td>" . $age . "</td></tr>";
                }
            ?>
        </table>
    </body>
</html>
