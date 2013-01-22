<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            date_default_timezone_set("Europe/Zurich");
            $currentTime = date("H:i");
        ?>
        <form action="view_timetable.php" method="GET">
            <p>
                <label for="from">From</label>
                <input type="text" name="from" />
            </p>
            <p>
                <label for="to">To</label>
                <input type="text" name="to" />
            </p>
            <p>
                <label for="departureTime">Departure time</label>
                <input type="text" name="departureTime" value="<?php echo $currentTime ?>" />
            </p>
            <p>
                <input type="submit" value="Search connection" />
                <input type="reset" value="Reset" />
            </p>
        </form>
    </body>
</html>
