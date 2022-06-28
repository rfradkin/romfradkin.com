<?php
    $http_host = $_SERVER['HTTP_HOST'];

    // Checks to see if you are using tor cause you only have access
    // to certain pages if you are.
    // If you aren't, it sends you to a page saying, essentially,
    // YOU CAN'T DO THAT!!!!
    if ($http_host == 'romfradkin.com' or $http_host == 'www.romfradkin.com')
        header("Location: https://$http_host/tor_blog/tor_directions.php"); 
?>