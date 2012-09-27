<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $n1 = $_GET['n1'];
            $n2 = $_GET['n2'];
            
            try 
            {
                $calc = $n1 / $n2;
                echo $calc;
            }
            catch (Exception $e)
            {
                echo "Es ist eine Ausnahme aufgetreten: Divison durch Null.";
            }
        ?>
    </body>
</html>
