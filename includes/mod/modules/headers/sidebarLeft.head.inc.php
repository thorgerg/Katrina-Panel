<?php

    $version = explode('~', phpversion()); 
    $version = explode('-', $version[0]); 


    $serverName = shell_exec("hostname");
    $panelVersion = $_SESSION['settings']['version'];
    $apacheVersion = explode('/', apache_get_version());
    $apacheVersion = explode(' ', $apacheVersion[1]);
    $apacheVersion = $apacheVersion[0];
    $phpVersion = $version[0];
    
	$memUsed = shell_exec("free -m | awk 'NR==2{print $3}'");
	$memTotal = shell_exec("free -m | awk 'NR==2{print $2}'");
	$freemem = round(($memUsed / $memTotal) * 100);

	$storage = shell_exec("df -H | grep -vE '^Filesystem|tmpfs|cdrom' | awk '{ print $5}' | awk 'NR==1{print $1}'");
	$storage = explode("%", $storage);
    $storage = $storage[0];

    $homeDirectory = $_SERVER['DOCUMENT_ROOT'];

    $DB = DB::getInstance();
    $sql = "SHOW databases";
    $DB->query($sql);
    $databasesCount = $DB->rowCount();
    
    $os = shell_exec("lsb_release -a | grep Distributor | awk '{print $3}'");
    $os = $os . " " . shell_exec("lsb_release -a | grep Release | awk '{print $2}'");
    
    $uptime = explode(',', shell_exec("uptime | awk '{print $3}'"));
    $period = shell_exec("uptime | awk '{print $4}'");
    
    if(is_numeric($period)){
        $uptime = $uptime[0] . " " . shell_exec("uptime | awk '{print $4}'");    
    }else{
        $uptime = explode(':', $uptime[0]);
        $period = explode(',', $period);
        $uptime = $uptime[0] . " " . $period[0];
    }
    
    $loadAverage = shell_exec("uptime | awk '{print $12}'") * 100;
    
    $publicIP = $_SERVER['REMOTE_ADDR'];
    $valid = true;
    $i = 1;
    
    $accessLog = shell_exec("cat /var/log/apache2/access.log | grep May | awk '{print $7}'");
    
    while($valid){
        if($i > 1){
            shell_exec("gunzip /var/log/apache2/access.log.".$i.".gz");
        }
        $tmp = shell_exec("cat /var/log/apache2/access.log.".$i." | grep May | awk '{print $7}'");
        if($tmp == ""){
            $valid = false;
        }
        $accessLog .= $tmp;
        $i++;        
    }
    $bandwidth = 0;
    
    foreach(preg_split("/((\r?\n)|(\r\n?))/", $accessLog) as $line){
        if(file_exists($homeDirectory . $line)){
            $bandwidth += filesize($homeDirectory . $line);
        }
    }
    
     $bandwidth = floor($bandwidth / 1048576);

    
    
?>