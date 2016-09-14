<?php
    $email = $_SESSION["email"];
    $Auth = Auth::getInstance();
    $DB = DB::getInstance();

    if(isset($_POST['btnSubmit'])) {

        $sql = "SELECT * from users WHERE email='" .$email. "'";
        $salt = $Auth->getSalt($email);
        $newSalt = $Auth->genSalt();
        $password = $Auth->hashPass($DB->sanatize($_POST['currentPassword']), $salt);
        
        
        if($Auth->compareHash($password)) {
            $password2 = $Auth->hashPass($DB->sanatize($_POST['newPassword']), $newSalt);
            $DB->query("UPDATE users set password='" . $password2 . "',salt='" . $newSalt . "' WHERE email='" . $email . "'");
            
           // $_SESSION['password'] = $password2;
            //$Auth->authenticate();
            echo "<div class='success'>{lang:changePassword-success}</div>";
            
            
        } else{
            echo "<div class='error'>{lang:changePassword-incorrectPassword}</div>";
        }
    }
?>