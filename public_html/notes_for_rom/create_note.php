<?php
    include("../redir_http_s.php");
    // ADD A WAY TO TAKE USERNAME FROM TOR BLOG TO AUTO PLACE NAME
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Notes for Rom</title>
    </head>
    <body>
        <form action="./store_note.php" method="post">
            Name:<input type="text" name="name" required><br>
            <input type="radio" name="content_type" value="note" checked>Note<br>
            <input type="radio" name="content_type" value="complaint">Complaint<br>
            <input type="radio" name="content_type" value="question">Question<br>
            <textarea id="content" name="current_content" rows="4" cols="50" placeholder="enter your content for yours truly. Also, if you enter something, I will respond :)" required></textarea>
            <br>
            <input type="submit">
        </form>
    </body>
</html>