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
    </head>
    <body>
        <header>
            <a href="/index.php" id="active_link">Home</a>
            <a href="/about/about.php">About</a>
            <a href="/notes_for_rom/notes_for_rom.php">Notes for Rom</a>
            <a href="/about/about.php">Tor Blog</a>
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
                <p class="bio_text" id="rom_fradkin_bio">Rom Fradkin</p>
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
                (this is a joke but please buy something. it would make me laugh (and no, I don't get a commission)).
            </p>
        </div>

        <footer>
            <p id="footer_text">Proudly individually coded.</p>
        </footer>

    </body>
    
</html>
