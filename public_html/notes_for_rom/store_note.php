<?php
    include("../redir_http_s.php");

    session_start();

    $server_name = "romfradkin.com";
    $database_username = "rfradkin";
    $database_name = "notes_for_rom_romfradkin_com";

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

    // Count the number of posts to for creating a post id
    $sql = "SELECT COUNT(*) FROM notes;";
    $count_query = $database->query($sql);
    $post_number_array = $count_query->fetch_assoc();
    $post_number = $post_number_array['COUNT(*)'] + 1;

    $content_type = $_POST['content_type'];
    $current_time = time();

    // $database->real_escape_string blocks sql injection attacks
    $current_content = $database->real_escape_string($_POST['current_content']);
    $name = $database->real_escape_string($_POST['name']);

    // Insert the post into the database
    $sql = "INSERT INTO notes (content, name, content_type, time, post_id)
    VALUES ('$current_content', '$name', '$content_type', $current_time, $post_number)";
    $database->query($sql);

    $database->close();

    header("Location: ./thanks_for_the_note.php"); 
?>
