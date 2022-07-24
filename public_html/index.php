<?php
    include(getenv("romfradkin_com_root")."/public_html/redir_http_s.php");
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Rom Fradkin</title>
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
        <link rel="stylesheet" href="/index_desktop.css">
        <link rel="stylesheet" href="/index_mobile.css">
        <link rel="stylesheet" href="/fonts/fonts.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
    </head>
    <script>
        function open_mobile_overlay() {
            document.getElementById("mobile_overlay").style.width = "100%";
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        }

        function close_mobile_overlay() {
            document.getElementById("mobile_overlay").style.width = "0%";
            document.getElementsByTagName("body")[0].style.overflow = "auto";
        }
    </script>
    <body>
        <header>
            <div id="desktop_navigation">
                <a href="/index.php" id="active_link">Home</a>
                <a href="/about/about.php">About</a>
                <a href="/notes_for_rom/notes_for_rom.php">Notes for Rom</a>
                <a href="/about/about.php">Tor Blog</a>
            </div>
            <div id="mobile_navigation">
                <a href="HOMEPAGE" id="rom_fradkin_home_link">ROM FRADKIN.</a>
                <div id="three_bars" onclick="open_mobile_overlay()">&#9776;</div>
                <div id="mobile_overlay">
                    <div id="cross" onclick="close_mobile_overlay()">&times;</div>
                    <div id="mobile_links">
                        <a href="/index.php" id="mobile_home">Home</a>
                        <a href="/about/about.php" id="mobile_about">About</a>
                        <a href="/notes_for_rom/notes_for_rom.php" id="mobile_notes_for_rom">Notes for Rom</a>
                        <a href="/about/about.php" id="mobile_tor_blog">Tor Blog</a>
                    </div>
                </div>
            </div>
        </header>

        <div id="image_bio">
            <p class="image_text" id="hello_im">Hello, I'm</p>
            <p class="image_text" id="rom_fradkin_image_text">Rom Fradkin</p>

            <!-- Select a random image using PHP for display -->
            <?php
                $files = glob("/var/www/romfradkin.com/public_html/astro_images/*");
                $file_number = array_rand($files);
                // Split the string, then only take the last part of the array (which is the filename)
                $file_path = explode("/", $files[$file_number]);
                $file_name = end($file_path);
                echo "<img id='main_image' src='/astro_images/$file_name' alt='Astrophysics Image'>"
            ?>

            <div id="bio">
                <img id="circle_image" src="/images/circle_image.png" alt="Circle Headshot">
                <p class="bio_text" id="mit_bio">Massachusetts Institute of Technology</p>
                <p class="bio_text" id="major_bio">Computer Science & Math</p>
                <p class="bio_text" id="email_bio">fradkin.rom@gmail.com</p>
                <p class="bio_text" id="phone_bio">(847) 868-5504</p>
                <div id="social_links">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <a class="fa fa-instagram" href="https://www.instagram.com/romfradkin/" rel="noopener noreferrer" target="_blank"></a> 
                    <a class="fa fa-linkedin" href="https://www.linkedin.com/in/rom-fradkin-a3a9541a5/" rel="noopener noreferrer" target="_blank"></a> 
                    <a class="fa fa-github" href="https://github.com/rfradkin" rel="noopener noreferrer" target="_blank"></a>
                </div>
            </div>
        </div>

        <div id="welcome">
            <p id="welcome_title">Welcome to my website</p>
            <p id="welcome_content">
                Come buy some Rom Fradkin merch:
                <a target="_blank" rel="noopener noreferrer" href="https://www.redbubble.com/people/rfradkin/shop?asc=u">merch link</a>
                (this is a joke but please buy something. it would make me laugh (and no, I don't get a commission)). Also, this is 
                not the ransomware link (trust. it goes to redbubble). I'm still working on that.
            </p>
        </div>

        <footer>
            <p id="footer_text">Proudly individually coded.</p>
        </footer>

    </body>
    
</html>
