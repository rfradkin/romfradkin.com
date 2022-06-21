<?php

$http_host = $_SERVER['HTTP_HOST'];

# Checks to see if you are using the darknet
# cause I only allow certain pages to be accessed
# if you are using the darknet.
# If you aren't, it sends you to a page saying, essentially,
# YOU CAN'T DO THAT!!!!
if ($http_host == 'romfradkin.com' or $http_host == 'www.romfradkin.com')
    header("Location: https://$http_host/you_cant_do_that.php"); 
?>