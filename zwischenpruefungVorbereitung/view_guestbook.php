<?php
    include_once("class.guestbook.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <th>
                <td>Name</td>
                <td>Titel</td>
                <td>Nachricht</td>
                <td>Datum</td>
                <td>Operation</td>
            </th>
            <?php
                $guestbook = new guestbook();
                $result = $guestbook->load();
                foreach ($result as $entry) {
                    echo "<tr>";
                    echo "<td>" . $entry["sender"] ."</td>";
                    echo "<td>" . $entry["title"] ."</td>";
                    echo "<td>" . $entry["message"] ."</td>";
                    echo "<td>" . $entry["date"] ."</td>";
                    echo "<td>" . $entry["ip_address"] ."</td>";
                    echo "<td><a href='edit_guestbook.php?id=" . $entry["id"] . "'>Edit</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <p>
            <a href="edit_guestbook.php">Neuer Eintrag</a>
        </p>
    </body>
</html>
