<?php
///////////////////////////////////
// index.php v1                  //
//                               //
// Date Created: 03/08/16        //
// Last Modified: 03/08/16       //
// Contact: Blake Warrington     //
// Email: bwarring24@gmail.com   //
///////////////////////////////////

session_start();

// Lets check to make sure our config file exists
if(!file_exists("includes/config.inc.php")){
    die("Config file can not be located.");
}else{
    require_once("includes/config.inc.php");
}

// Check to see if maintenance mode should be enabled
if($_SESSION['settings']['maintenance'] == true){
    die("System is down for maintenance. Please check back later");
}

// Check to see if debug mode should be enalbed
if($_SESSION['settings']['debug'] == true){
    ini_set('display_errors', 1);
    error_reporting(1);
}

// Check to see if there is a specified language requested
if($_SESSION['settings']['language'] != null){
    if(file_exists("includes/lang/lang.class.php")){
        require_once("includes/lang/lang.class.php");    
    }else{
        die("Unable to locate the language class, file does not exist");
    }
}else{
    die("Must specify a default language!");
}

// Check to see if the db class exists
if(file_exists("includes/db/db.class.php")){
    require_once("includes/db/db.class.php");
}else{
    die("Unable to locate the db class, file does not exist");
}

// Check to see if the auth class exists
if(file_Exists("includes/auth/auth.class.php")){
    require_once("includes/auth/auth.class.php");
}else{
    die("Unable to locate the auth class, file does not exist");
}

// Check to see if the auth class exists
if(file_Exists("includes/user/user.class.php")){
    require_once("includes/user/user.class.php");
}else{
    die("Unable to locate the user class, file does not exist");
}

// Start the Auth Engine
$Auth = Auth::getInstance();


// Start the Language Engine
$Lang = Lang::getInstance();

if(file_Exists("includes/page/page.class.php")){
    require_once("includes/page/page.class.php");
}else{
    die("Unable to locate the page class, file does not exist");
}

if(file_Exists("includes/mod/mod.class.php")){
    require_once("includes/mod/mod.class.php");
}else{
    die("Unable to locate the mod class, file does not exist");
}


// Start the Page Engine
$Page = Page::getInstance();

// Start the Mod Engine
$Mod = Mod::getInstance();

if(file_exists("includes/tpl/tpl.class.php")){
    require_once("includes/tpl/tpl.class.php");
}else{
    die("Unable to locate tpl class, file not found");
}

// Start the template engine
$Tpl = Tpl::getInstance();
$Tpl->display();


?>