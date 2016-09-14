<?php
    $db['host'] = "server.blakewarrington.net"; // Server IP of the database
    $db['user'] = "gthorson"; // The user who has access to the database
    $db['pass'] = "meowmeowKittyKat"; // The password for the above user
    $db['name'] = "kp"; // The name of our database

    $_SESSION['settings'] = array();
    $_SESSION['settings']['maintenance'] = false; // If set to true, website will be down and a maitnence page will be shown
    $_SESSION['settings']['debug'] = true; // If set to true, error reporting will be enabled (a.k.a. debug mode)
    $_SESSION['settings']['language'] = "en"; // Sets the default language
    $_SESSION['settings']['version'] = "0.1 [Pre-Alpha]"; // Sets the version number
    $_SESSION['settings']['maxLoginAttempts'] = 10; // Specifies how many times the user can login incorrectly before getting locked out
    $_SESSION['settings']['maxLoginAttemptsTimeOut'] = 60; // Specifies the length of the lockout period; Value in minutes
    
    date_default_timezone_set('America/New_York');
?>