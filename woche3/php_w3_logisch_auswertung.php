<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $username = $_GET['username'];
            $password = $_GET['password'];
            
            if ($username == 'Peter' && $password == 'Zürich') 
            {
                echo "Zutritt gestattet";
            }                
            elseif ($username == 'Philipp' && $password == 'Basel')
            {
                echo "Zutritt gestattet";
            }
            else
            {
                echo "Zutritt verweigert";
            }
         ?>
    </body>
</html>
