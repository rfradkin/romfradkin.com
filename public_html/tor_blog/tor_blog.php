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
        <title>TOR Blog</title>
    </head>

    <body>
        <p> here are da posts...</p>

        <?php
            $server_name = "romfradkin.com";
            $database_username = "rfradkin";
            $database_name = "tor_blog_romfradkin_com";

            // Recieve the password from a file so not shown on GitHub...
            $romfradkin_com_root = getenv('romfradkin_com_root');
            $senstive_information = fopen("$romfradkin_com_root/sensitive_information.txt","r");
            while ($line = fgets($senstive_information)) {
                if (substr($line, 0, 8) == "mariadb:") {
                    $database_password = substr($line, 8);
                    break;
                }
            }

            fclose($senstive_information);
            if (!isset($database_password)) 
                die(header("Location: ../error.php"));

            // Create connection
            $database = new mysqli($server_name, $database_username, $database_password, $database_name);
            // Check connection
            if ($database->connect_error)
                die(header("Location: ../error.php"));

            $sql = "SELECT content, title, post_id FROM blog_posts";
            foreach($database->query($sql) as $current_post) {
                echo "Title:" . $current_post['title'].", Post ID:" . $current_post['post_id']."<br>";
                echo "Post:" . $current_post['content']."<br><br>";
            }

            $database->close();
        ?>

        <a href='./tor_blog_create_post.php'>Click here to create a new post</a>
    </body>
</html>