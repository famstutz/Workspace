<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            function square($n)
            {
                return $n * $n;
            }
            
            $calculations = array(3, 3.2, -5, 83373);
            foreach($calculations as $calculation)
            {
                echo "<p>Das Quadrat von " . $calculation . " ist " . square($calculation) . ".</p>";
            }   
        ?>
    </body>
</html>
