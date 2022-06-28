<?php
    include('./redir_http_s.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <?php
            echo 'public_html<br>';
            foreach(glob('./*.*') as $file) {
                echo "<a href='$file'>$file</a><br>";
            }
            echo '<br>public_html/tor_blog<br>';
            foreach(glob('./tor_blog/*.*') as $file) {
                echo "<a href='$file'>$file</a><br>";
            }
            ?>
        <p>This is the current home page for romfradkin.com. Right now, its just links to other pages I'm working on. It'll get better, I swear...</p>
    </body>
</html>