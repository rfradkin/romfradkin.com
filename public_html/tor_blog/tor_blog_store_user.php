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


    $sql = "SELECT * from user_information";
    if ($user_information = $database->query($sql)) {
        // Return the number of rows in result set
        $number_of_users = mysqli_num_rows($user_information);
    }

    // Checks to make sure the inputs are filled
    if (count($_POST) == 3) {
        foreach($_POST as $input) {
            if (empty($input)) {
            $database->close();       
            die(header("Location: ./tor_blog_create_user.php"));
            }
        }
    }
    else {
        $database->close();
        die(header("Location: ./tor_blog_create_user.php")); 
    }

    // Block sql injection attack
    $name = $database->real_escape_string($_POST["name"]);
    $username = $database->real_escape_string(strtolower($_POST["username"]));
    $passphrase = $database->real_escape_string($_POST["passphrase"]);

    // Hash and salt the passphrase for security
    $hashed_passphrase = password_hash($passphrase, PASSWORD_DEFAULT);

    $sql = "SELECT username from user_information";
    foreach($database->query($sql) as $current_username) {
        if ($username == $current_username["username"]) {
            $_SESSION["username_used"] = True;
            $database->close();
            die(header("Location: ./tor_blog_create_user.php")); 
        }
    }

    $sql = "INSERT INTO user_information (id, name, username, passphrase)
    VALUES ($number_of_users + 1, '$name', '$username', '$hashed_passphrase')";
    $database->query($sql);

    $database->close();

    # Store the username as a session variable to keep the user logged in
    # I don"t use cookies cause TOR browser deletes them after each session, 
    # so the effect would be the same
    $_SESSION["username"] = $username;

    header("Location: ./tor_blog.php"); 
?>
