<?php
    // include('./tor_only.php');

    session_start();

    if (!$_SESSION['username']) {
        die(header("Location: ./tor_blog_login.php"));
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tor Blog New Post</title>
    </head>
    <body>
        <form action='./tor_blog_store_post.php' method='post'>
            Title:<input type='text' name='title' required><br>
            <textarea id="content" name="current_content" rows="4" cols="50" placeholder='enter your shit' required></textarea>
            <br>
            <input type="submit">
        </form>
    </body>
</html>