<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Spieler 1</th>
                <th>Spieler 2</th>
            </tr>
            <?php
                $s1 = 0;
                $s2 = 0;
                $won = false;
                while (!$won)
                {
                    $s1 += rand(1, 6);
                    $s2 += rand(1, 6);
                    
                    echo "<tr><td>" . $s1 . "</td><td>" . $s2 . "</td></tr>";
                    
                    if ($s1 >= 25 || $s2 >= 25) 
                    {
                        $won = true;
                    }
                }
            ?>
        </table>
        <p>
            Spieler
            <?php
                if ($s1 > $s2) 
                {
                    echo " 1 ";
                }
                else
                {
                    echo " 2 ";
                }
            ?>
            hat gewonnen!
        </p>
    </body>
</html>
