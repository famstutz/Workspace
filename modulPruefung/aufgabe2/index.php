<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
            function getXMLHttp()
            {
              var xmlHttp

              try {
                // Firefox, Opera 8.0+, Safari
                xmlHttp = new XMLHttpRequest();
              }
              catch (e) {
                // Internet Explorer
                try {
                  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e) {
                  try {
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  catch (e)
                  {
                    alert("Your browser does not support AJAX!")
                    return false;
                  }
                }
              }
              return xmlHttp;
            }

            function rate(cafeId, ratingId) {
                var xmlHttp = getXMLHttp();
                
                xmlHttp.onreadystatechange = function()
                {
                    if (xmlHttp.readyState == 4) {
                        printResponseToSpan(cafeId, ratingId, xmlHttp.responseText);
                    }
                }

                xmlHttp.open("GET", "addRating.php?cafeId=" + cafeId + "&ratingId=" + ratingId, true); 
                xmlHttp.send(null);
            }
            
            function printResponseToSpan(cafeId, ratingId, responseText) {
                 var span = document.getElementById(cafeId + "." + ratingId);
                 span.textContent = responseText;
            }
        </script>
    </head>
    <body>
        <h1>Rate and favor cafes in NYC</h1>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Street</th>
                <th>Zip</th>
                <th>Type</th>
                <th>Rate/Rating</th>
                <th>Favorite</th>
            </tr>
            <?php
                require_once("autoloader.php");
                
                $cafe = new cafe();
                $favorite = new favorite();
                    
                // set favorite (if postback)
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $favorite->set($_POST["cafeId"]);
                }
                
                foreach ($cafe->read() as $c) {
                    $cafeId = $c["id"];
                    
                    // fetch ratings for current cafe
                    $ratingsExcellent = $cafe->getRatingCount($cafeId, 1);
                    $ratingsDrinkable = $cafe->getRatingCount($cafeId, 2);
                    $ratingsCrap = $cafe->getRatingCount($cafeId, 3);
            ?>
            <tr>
                <td><?php echo $c["name"] ?></td>
                <td><?php echo $c["street"] ?></td>
                <td><?php echo $c["zip"] ?></td>
                <td><?php echo $c["type"] ?></td>
                <td>
                    <p>
                        <span id="<?php echo $cafeId ?>.1">
                            <?php echo $ratingsExcellent[0]["count"] ?>
                        </span> say it's excellent
                    </p>
                    <p>
                        <span id="<?php echo $cafeId ?>.2">
                            <?php echo $ratingsDrinkable[0]["count"] ?>
                        </span> say it's drinkable
                    </p>
                    <p>
                        <span id="<?php echo $cafeId ?>.3">
                            <?php echo $ratingsCrap[0]["count"] ?>
                        </span> say it's crap</p>
                    <p>
                        <select onchange="javascript:rate(<?php echo $cafeId ?>, this.value)">
                            <option value="0">Make a rating...</option>
                            <option value="1">Excellent</option>
                            <option value="2">Drinkable</option>
                            <option value="3">Crap</option>
                        </select>
                    </p>
                </td>
                <td>
                    <?php
                        if ($favorite->isFavorite($cafeId)) {
                            echo "Is a favorite";
                        }
                        else {
                    ?>
                    <form method="post">
                        <input type="hidden" name="cafeId" value="<?php echo $cafeId ?>" />
                        <input type="submit" name="submit" value="Add favorite" />
                    </form>
                    <?php
                        }
                    ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>
