<?php
  function getLog($type) {
    if($type == "mail"){
    	$errorLog = fopen("/var/log/mail.err", "r") or die("Unable to open file!");//change file paths
    }
    if($type == "mysql"){
    	$errorLog= fopen("/var/log/mysql.err", "r") or die("Unable to open file!");
    }
    if($type == "apache"){
    	$errorLog = fopen("/var/log/apache2/error.log", "r") or die("Unable to open file!");
    }
    return $errorLog;
  }

function printLog($log){
	while(!feof($log)) {
       echo fgets($log) . "<br>";
   }
}
  if (isset($_GET['type'])) {
    $log=getLog($_GET['type']);
  }
?>