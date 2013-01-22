<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            // assign get parameters
            $type = $_GET["type"];
            $streetName = $_GET["streetName"];
            $zipCode = $_GET["zipCode"];
            
            // validate get parameters
            if ($type == "None") {
                unset($type);
            }
            if (empty($streetName)) {
                unset($streetName);
            }
            if (empty($zipCode)) {
                unset($zipCode);
            }
            
            // compile query
            $queryArguments = array();
            if (isset($type)) {
                $queryArguments["sidewalk_cafe_type"] = $type;
            }
            if (isset($streetName)) {
                $queryArguments["address_street_name"] = $streetName;
            }
            if (isset($zipCode)) {
                $queryArguments["address_zip_code"] = $zipCode;
            }
            $compiledQuery = http_build_query($queryArguments);
            $request =  "http://data.cityofnewyork.us/resource/6k68-kc8u.json?" . $compiledQuery; 
            
            // execute query
            $session = curl_init($request); 
            curl_setopt($session, CURLOPT_HEADER, false); 
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true); 
            $response = curl_exec($session); 
            curl_close($session); 
            
            // decode json response
            $json = json_decode($response, true);
        ?>
        <h1>Search result</h1>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Street</th>
                <th>Zip</th>
                <th>Type</th>
            </tr>
            <?php
                foreach($json as $entity) {
                    echo "<tr>";
                    echo "<td>" . $entity["entity_name"] . "</td>";
                    echo "<td>" . $entity["address_street_name"] . "</td>";
                    echo "<td>" . $entity["address_zip_code"] . "</td>";
                    echo "<td>" . $entity["sidewalk_cafe_type"] . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>
