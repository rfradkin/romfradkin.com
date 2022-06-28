<?php
    // Checks if using SSL/TLS
    // If not, redirects to HTTPS (unless coming from .onion)
    $http_s = "http";
    if (isset($_SERVER['HTTPS']))
        $http_s = "https";

    $http_host = $_SERVER['HTTP_HOST'];
    $reque_uri = $_SERVER['REQUEST_URI'];

    // Checks the http_host to see if it a .onion address
    // Those are to be ignored as I don't have an SSL certificate
    // for the onion page. (Also, https for .onion pages is redundant)
    if ($http_host == 'romfradkin.com' || $http_host == 'www.romfradkin.com')
        if ($http_s == 'http')
            // Redirects to https version of same page
            header("Location: https://$http_host$reque_uri"); 
?>