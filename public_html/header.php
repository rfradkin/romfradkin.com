<?php
    // This code is used to determine which link is active in the desktop
    // interface, and underline it.
    $current_page = substr($_SERVER['REQUEST_URI'], 1);

    if ($current_page == "" or "index.php") {
        $home_active = " id='active_link'";
    }
    elseif ($current_page == "about.php") {
        $about_active = " id='active_link'";
    }
    elseif ($current_page == "notes_for_rom.php") {
        $notes_for_rom_active = " id='active_link'";
    }
    elseif ($current_page == "tor_blog.php") {
        $tor_blog_active = " id='active_link'";
    }
    else {
        throw new Exception('Active Link Not Found');
    }

    echo "
<header>
    <link rel='stylesheet' href='/header.css'>
    <script src='/mobile_overlay.js'></script>
    <div id='desktop_navigation'>
        <a href='/index.php'$home_active>Home</a>
        <a href='/about/about.php'$about_active>About</a>
        <a href='/notes_for_rom/notes_for_rom.php'$notes_for_rom_active>Notes for Rom</a>
        <a href='/about/about.php'$tor_blog_active>Tor Blog</a>
    </div>
    <div id='mobile_navigation'>
        <a href='/index.php' id='rom_fradkin_home_link'>ROM FRADKIN.</a>
        <div id='three_bars' onclick='open_mobile_overlay()'>&#9776;</div>
        <div id='mobile_overlay'>
            <div id='cross' onclick='close_mobile_overlay()'>&times;</div>
            <div id='mobile_links'>
                <a href='/index.php' id='mobile_home'>Home</a>
                <a href='/about/about.php' id='mobile_about'>About</a>
                <a href='/notes_for_rom/notes_for_rom.php' id='mobile_notes_for_rom'>Notes for Rom</a>
                <a href='/about/about.php' id='mobile_tor_blog'>Tor Blog</a>
            </div>
        </div>
    </div>
</header>
    ";
?>
