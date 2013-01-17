<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once("country.class.php");
        
            $loggedOn = false;
            
            if (isset($_GET["action"]) && $_GET["action"] == "logout") {
                unset($_SESSION["username"]);
                session_destroy();
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                if (!empty($username) && !empty($password)) {
                    $file = file_get_contents("credentials.json");
                    $credentials = json_decode($file, true);
                    if ($credentials[$username]["password"] == $password) {
                        session_start();
                        $_SESSION["username"] = $username;
                    }
                }
            }
            
            if (isset($_SESSION["username"])) {
                $loggedOn = true;
            }
            
            if (!$loggedOn) {
        ?>
        <form method="POST" action="index.php">
            <p>
                <label for="username">Username</label>
                <input type="text" name="username" />
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" />
            </p>
            <p>
                <input type="submit" value="Log on" />
            </p>
        </form>
        <?php
            }
            else {
        ?>
        <p>
            <a href="index.php?action=logout">Log out</a>
        </p>
        <?php
            }
        ?>
        <table border="1">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Continent</th>
                <?php 
                    if ($loggedOn) {
                        echo "<th>New continent</th>";
                    }
                ?>
            </tr>
            <?php
                $country = new country();
                $result = $country->getAllCountries();
                if ($loggedOn) {
                    $resultContinents = $country->getAllContinents();
                }
                foreach ($result as $entry) {
            ?>
            <tr>
                <td><?php echo $entry["Code"] ?></td>
                <td><?php echo $entry["Name"] ?></td>
                <td><?php echo $entry["Continent"] ?></td>
                <?php 
                    if ($loggedOn) {
                        echo "<td><select name=\"Continent\" onchange=\"\">";
                        foreach ($resultContinents as $entryContinent) {
                            echo "<option>" . $entryContinent["Continent"] . "</option>";
                        }
                        echo "</select></td>";
                    }
                ?>
            </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>
