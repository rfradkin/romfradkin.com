<?php
    // include("./tor_only.php");

    session_start();

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


    $sql = "SELECT username, id from user_information";
    foreach($database->query($sql) as $current_user_information) {
        if ($current_user_information['username'] == $_SESSION['username']) {
            $user_id = $current_user_information['id'];
            break;
        }
    }

    // Count the number of posts to for creating a post id
    $sql = "SELECT COUNT(*) FROM blog_posts;";
    $count_query = $database->query($sql);
    $post_number_array = $count_query->fetch_assoc();
    $post_number = $post_number_array['COUNT(*)'] + 1;

    $current_time = time();

    // $database->real_escape_string blocks sql injection attacks
    $current_content = $database->real_escape_string($_POST['current_content']);
    $title = $database->real_escape_string($_POST['title']);

    // Insert the post into the database
    $sql = "INSERT INTO blog_posts (content, title, time, post_id, user_id)
    VALUES ('$current_content', '$title', $current_time, $post_number, $user_id)";
    $database->query($sql);

    $database->close();

    header("Location: ./tor_blog.php"); 
?>
