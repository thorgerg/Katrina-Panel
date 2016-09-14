<?php

    $User = User::getInstance();

    $email = $User->getEmail();
    $fname = $User->getFirstName();
    $lname = $User->getLastName();
    $lastIP = $User->getLastIP();
    $creationDate = $User->getCreatedDate();
    $lastLogin = $User->getLastLogin();
    $language = $User->getLanguage();
?>