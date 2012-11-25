<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once("class.guestbook.php");
            $guestbook = new guestbook();
            
            date_default_timezone_set("Europe/Zurich");
            $sender = "";
            $title = "";
            $message = "";
            $ipAddress = $_SERVER["REMOTE_ADDR"];
            $date = date('Y-d-m', time());
            
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                
                $entry = $guestbook->get($id);
                $sender = $entry[0]["sender"];
                $message = $entry[0]["message"];
                $ipAddress = $entry[0]["ip_address"];
                $title = $entry[0]["title"];
                $date = $entry[0]["date"];
            }
            
             if ($_SERVER['REQUEST_METHOD'] == "POST")  {
                 $sender = $_POST["sender"];
                 $message = $_POST["message"];
                 $ipAddress = $_POST["ipAddress"];
                 $title = $_POST["title"];
                 $date = $_POST["date"];
                 
                 if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $guestbook->edit($id, $sender, $ipAddress, $title, $message, $date);
                 }
                 else {
                     $guestbook->add($sender, $ipAddress, $title, $message, $date);
                 }
                 
                 header("Location: view_guestbook.php");
             }
        ?>
        <form action="edit_guestbook.php" method="post">
            <p>
                <label for="sender">Sender</label>
                <input type="text" name="sender" value="<?php echo $sender ?>" />
            </p>
            <p>
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $title ?>"/>
            </p>
            <p>
                <label for="message">Message</label>
                <input type="text" name="message" value="<?php echo $message ?>"/>
            </p>
            <p>
                <input type="hidden" name="ipAddress" value="<?php echo $ipAddress ?>" />
                <input type="hidden" name="date" value="<?php echo $date ?>" />
                <input type="submit" value="Speichern" />
                <input type="button" onclick="parent.location='view_guestbook.php'" value="Abbrechen" />
            </p>
        </form>
    </body>
</html>
