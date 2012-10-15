<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function assignSeat(&$seats, $row, $seat)
            {
                for($i = 0; $i < 5; $i++)
                {
                    for ($n = 0; $n < 8; $n++)
                    {
                        if ($i == $row - 1 && $n == $seat - 1)
                        {
                            $seats[$row][$seat] = true;
                        }
                    }
                }
            }
            
            function printSeatMap($seats)
            {
                echo "<pre>";
                foreach($seats as $rows)
                {
                    foreach ($rows as $seat)
                    {
                        if ($seat == true)
                        {
                            echo "[X] ";
                        } 
                        else
                        {
                            echo "[ ] ";
                        }
                    }
                    echo "<br />";
                } 
                echo "</pre>";
            }
            
            $seats = array_fill(0, 5, array_fill(0, 8, false));

            assignSeat($seats, 2, 6);
            printSeatMap($seats);
        ?>
    </body>
</html>
