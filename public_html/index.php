<?php
    include(getenv("romfradkin_com_root")."/public_html/redir_http_s.php");
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Rom Fradkin</title>
        <link rel="stylesheet" href="/index.css">
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
            <img id="main_image" src="/images/tess_first_light.jpg" alt="TESS First Light">
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
        <div id="idkwhatthisis">
            <p >Welcome to my website</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim consectetur voluptas 
                inventore delectus dolores, eaque eum pariatur laborum debitis omnis quas vero necessitatibus 
                nesciunt quam labore! Repellendus a perspiciatis quibusdam!</p>
        </div>

        <footer>
            <p id="footer_text">Proudly individually coded.</p>
        </footer>

    </body>

</html>
