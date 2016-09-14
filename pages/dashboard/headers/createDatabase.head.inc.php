<?php
    $DB = DB::getInstance();
    
    if(isset($_POST['btnSubmit'])){
        $dbName = $_POST['databaseName'];
        $userName = $_POST['databaseUserName'];
        $pass = $_POST['userPassword'];
        $pass2 = $_POST['userPassword2'];
        $valid = true;
        
        if($pass != $pass2){
            $error .= "{lang:createDatabase-passDoesNotMatch}\n";
        }
        
        if(!empty($error)){
            $valid = false;
            $error = "<div class='error'>".$error."</div>";
        }
        
        if($valid){
            // Create database
            $sql = "CREATE DATABASE ".$dbName."  DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci";
            if($DB->query($sql)){
                $msg .= "<div class='success'>{lang:createDatabase-successfulyCreatedDatabase}</div>";
            }
            
            // Create User
            $sql = "CREATE USER '".$userName."'@'%' IDENTIFIED BY '".$pass."'";
            $DB->query($sql);
            
            // Grant permissions to our new database
            $sql = "GRANT ALL PRIVILEGES ON ".$dbName.".* TO '".$userName."'@'%'";
            $DB->query($sql);
            
            // Grant permissions to our new database
            $sql = "GRANT ALL PRIVILEGES ON ".$dbName.".* TO 'gthorson'@'%'";
            $DB->query($sql);
            
            // Flush privileges so things are updated
            $sql = "FLUSH PRIVILEGES";
            $DB->query($sql);
            
            $DB->close();
        }
    }

?>