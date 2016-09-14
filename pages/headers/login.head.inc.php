<?php
    $error = null;

    // Get our instances
    $Auth = Auth::getInstance();
    $DB = DB::getInstance();

    if(isset($_POST['btnSubmit'])){
        $_SESSION['email'] = $DB->sanatize($_POST['email']);
        $_SESSION['password'] = $DB->sanatize($_POST['password']);
        
        $Auth->authenticate();
        
        if(!$Auth->isAuthenticated()){
            $error .= "{lang:coreError-401}";
            echo "<div class='error'>".$error."</div>";
        }else{
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    
?>
