<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <p>Bitte tragen sie ihre Adresse ein</p>
        <form action="php_w3_auswertung.php">
            <p>
                <label for="firstname">Vorname</label>
                <input type="text" name="firstname" />
            </p>
            <p>
                <label for="lastname">Nachname</label>
                <input type="text" name="lastname" />
            </p>
            <p>
                <label for="address">Strasse</label>
                <input type="text" name="address" />
            </p>
            <p>
                <label for="zip">PLZ</label>
                <input type="text" name="zip" />
            </p>
            <p>
                <label for="city">City</label>
                <input type="text" name="city" />
            </p>
            <p>
                <input type="submit" value="Daten absenden" />
                <input type="reset" value="Zurücksetzen" />
            </p>
        </form>
    </body>
</html>
