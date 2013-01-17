<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            date_default_timezone_set("Europe/Zurich");
            
            $from = $_GET["from"];
            $to = $_GET["to"];
            $departureTime = $_GET["departureTime"];
        
            $request =  "http://transport.opendata.ch/v1/connections?from=" . $from . "&to=" . $to . "&time=" . $departureTime . "&limit=4"; 
            $session = curl_init($request); 

            curl_setopt($session, CURLOPT_HEADER, false); 
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 

            $response = curl_exec($session); 
            curl_close($session); 
            $json = json_decode($response, true);
        ?>
        <h1>Your connections</h1>
        <table border="1">
            <tr>
                <th></th>
                <th>Location</th>
                <th>Time</th>
                <th>Travel with</th>
                <th>Change</th>
                <th>Platform</th>
            </tr>
        <?php  
            foreach($json["connections"] as $connection) {
                echo "<tr>";
                echo "<td>From:</td>";
                echo "<td>" . $connection["from"]["station"]["name"] . "</td>";
                echo "<td>" . date("H:i", strtotime($connection["from"]["departure"])) . "</td>";
                echo "<td>" . implode(", ", $connection["products"]) . "</td>";
                echo "<td>". (count($connection["sections"]) - 1) . "</td>";
                echo "<td>" . $connection["from"]["platform"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>To:</td>";
                echo "<td>" . $connection["to"]["station"]["name"] . "</td>";
                echo "<td>" . date("H:i", strtotime($connection["to"]["arrival"])) . "</td>";
                echo "<td></td>";
                echo "<td></td>";

                echo "<td>" . $connection["to"]["platform"] . "</p>";

                echo "</tr>";
            }
        ?>
        </table>
    </body>
</html>
