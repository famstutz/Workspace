<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="orderPizzaResult.php">
            <p>
                <label for="name">Name</label>
                <input type="text" name="name" />
            </p>
            <p>
                <label for="address">Addresse</label>
                <input type="text" name="address" />
            </p>
            <p>
                <label for="gender">Gender</label>
                <input type="radio" name="gender" value="male">Male</input>
                <input type="radio" name="gender" value="female">Female</input>
            </p>
            <p>
                <label for="pizzatype">Type of pizza</label>
                <select name="pizzatype">
                    <option>Margerita 8CHF</option>
                    <option>Tonno 12CHF</option>
                    <option>Quattro stagioni 11CHF</option>
                    <option>Napoletana 9CHF</option>
                    <option>Marinara 9CHF</option>
                </select>
            </p>
            <p>
                <label for="extras">Extras</label>
                <input type="checkbox" name="extras[]" value="cheese">Cheese +2CHF</input>
                <input type="checkbox" name="extras[]" value="sardines">Sardines +2CHF</input>
                <input type="checkbox" name="extras[]" value="tuna">Tuna +2CHF</input>
            </p>
            <p>
                <input type="submit" value="Calculate price" />
                <input type="reset" value="Reset form" />
            </p>
        </form>
    </body>
</html>
