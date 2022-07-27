<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
// The message
$message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send - replace email@domain.com with the recipient address
$bool = mail('fradkin.rom@gmail.com', 'Here Is What I Wanted to Send', $message);

var_dump($bool);