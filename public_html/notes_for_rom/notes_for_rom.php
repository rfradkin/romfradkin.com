<!DOCTYPE html>
<html lang="en-US">

    <head>
        <title>Rom Fradkin</title>
        <link rel="stylesheet" href="./notes_for_rom_desktop.css">
        <link rel="stylesheet" href="./notes_for_rom_mobile.css">
        <?php
            include(getenv("romfradkin_com_root")."/public_html/page_standards.php");
        ?>
    </head>

    <body>
        <?php
            include(getenv("romfradkin_com_root")."/public_html/header.php");
        ?>
        <div id="main_content">
            <form id="message_input" action="./store_notes_for_rom.php" method="post">
                <div id="name_and_column">
                    <p class="input_title">Name</p>
                    <input type="text" name="name" id="name_input" placeholder="Rom Fradkin" required>
                    <p id="type_title" class="input_title">Type</p>
                    <div>
                        <?php
                            // Used to cut down on the repetition for each choice's html code
                            $content_types = array("Command", "Complaint", "Complement", "Opinion", "Question", "Statement");
                            foreach ($content_types as $current_type) {

                                echo "<div>";
                                echo "\t<input type='radio' name='content_type' class='radio_button' value='$current_type' required>";

                                // Specifically add the (Recommended) to complaints
                                if ($current_type == "Complaint") {
                                    $current_type = "Complaint (Recommended)";
                                }
                                echo "\t<span class='radio_name'>$current_type</span>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>
                <div id="content">
                    <p class="input_title">Content</p>
                    <textarea id="content_input" name="current_content"
                    placeholder="Everyone always has an opinion on everything, so say it bitch." required></textarea>
                </div>
                <input type="submit" value="Let Me Know!" id="submit_button">
            </form>
        </div>

        <div class="hof">
            <p id="hof_title">Notes Hall of Fame</p>
            <?php
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

                // Select the hall of fame posts
                $sql = "SELECT content, name, content_type FROM notes WHERE hall_of_fame=1;";
                foreach ($database->query($sql) as $current_note) {

                    $name = $current_note['name'];
                    $content_type = $current_note['content_type'];
                    $content = $current_note['content'];

                    echo '<div class="hof_background">';
                    echo "\t<p class='input_title hof_note_title'>$name - $content_type</p>";
                    echo "\t<p class='hof_content'>$content</p>";
                    echo "</div>";
                }

                $database->close();
            ?>
        </div>

        <?php
            include(getenv("romfradkin_com_root")."/public_html/footer.php");
        ?>
    </body>
 
</html>
