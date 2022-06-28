<?php
    // include("./tor_only.php");

    session_start();

    $server_name = "romfradkin.com";
    $database_username = "rfradkin";
    $database_name = "tor_blog_romfradkin_com";

    // Recieve the password from a file so not shown on GitHub...
    $romfradkin_com_root = getenv("romfradkin_com_root");
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

    $sql = "SELECT username, passphrase from user_information";
    foreach($database->query($sql) as $current_user){
        if ($current_user["username"] == $_POST["username"]){
            if (password_verify($_POST["passphrase"], $current_user["passphrase"])){
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["login_failed"] = False;
                die(header("Location: ./tor_blog.php"));
            }
        }
    }

    $_SESSION["login_failed"] = True;

    $database->close();

    header("Location: ./tor_blog_login.php"); 
?>
