<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <?php
                for ($i = 1; $i <= 10; $i++)
                {
                    echo "<tr>";
                    for ($j = 1; $j <= 10; $j++)
                    {
                        echo "<td>" . $i * $j . "</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>
