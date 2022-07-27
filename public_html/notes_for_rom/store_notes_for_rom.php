<?php
    include(getenv("romfradkin_com_root")."/public_html/redir_http_s.php");
    
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
        die(header("Location: /error.php"));

    // Create connection
    $database = new mysqli($server_name, $database_username, $database_password, $database_name);
    // Check connection
    if ($database->connect_error)
        die(header("Location: /error.php"));

    // Count the number of posts to for creating a post id
    $sql = "SELECT post_id FROM notes ORDER BY time DESC LIMIT 1;";
    $count_query = $database->query($sql);
    // echo $count_query;
    $post_number_array = $count_query->fetch_assoc();
    if (isset($post_number_array['post_id'])) {
        $post_number = $post_number_array['post_id'] + 1;
    }
    else {
        $post_number = 1;
    }
    echo $post_number;

    $content_type = $_POST['content_type'];
    $current_time = time();

    // $database->real_escape_string blocks sql injection attacks
    $current_content = $database->real_escape_string($_POST['current_content']);
    $name = $database->real_escape_string($_POST['name']);

    // Insert the post into the database
    $sql = "INSERT INTO notes (content, name, content_type, time, post_id, hall_of_fame)
    VALUES ('$current_content', '$name', '$content_type', $current_time, $post_number, 0)";
    $database->query($sql);

    $database->close();

    // MAIL IS NOT WORKING
    // mail("fradkin.rom@gmail.com", "Note from $name -- $content_type", "$current_content");

    // Set Cookie for remembering name
    setcookie("notes_for_rom_name", "$name", time() + (86400 * 365), "/"); // 86400 = 1 day

    header("Location: ./thanks_for_the_note.php"); 
?>
