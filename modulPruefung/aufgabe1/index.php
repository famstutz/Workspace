<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Search for sidewalk cafes</h1>
        <form method="get" action="search_result.php">
            <p>
                <label for="type">sidewalk cafe type</label>
                <select name="type">
                    <option>None</option>
                    <option>Enclosed</option>
                    <option>Unenclosed</option>
                </select>
            </p>
            <p>
                <label for="streetName">exact street name</label>
                <input type="text" name="streetName" />
            </p>
            <p>
                <label for="zipCode">zip code</label>
                <input type="text" name="zipCode" />
            </p>
            <p>
                <input type="submit" name="submit" value="Search cafe" />
            </p>
        </form>
    </body>
</html>
