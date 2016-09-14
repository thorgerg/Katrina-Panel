<?php
    $validated = true;

    if (isset($_POST['btnSubmit'])) {
        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['email'] = $_POST['email'];
        
        
        $error = null;

        if (empty($_POST["firstName"])) {
            $error .= "{lang:register-firstNameRequired}\n";
        } else {
            $name = $_POST["firstName"];
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $error .= "{lang:coreError-100}\n";
            }
        }

        if (empty($_POST["lastName"])) {
            $error .= "{lang:register-lastNameRequired}\n";
        } else {
            $name = $_POST["lastName"];
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $error .= "{lang:coreError-100}\n";
            }
        }

        if (empty($_POST["email"])) {
            $error .= "{lang:register-emailRequired}\n";
        } else {
            $email = $_POST["email"];
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error .= "{lang:coreError-101}\n";
            }
        }

        if (empty($_POST["password"])) {
            $error .= "{lang:register-passRequired}\n";
        } else {
            $pass = $_POST["password"];
            if (!preg_match("/^([a-zA-Z0-9_+-,.:\/!@&#$%\^*();\\|<>'?=-])+$/", $pass)) {
                $error .= "{lang:coreError-102}\n";
            }
        }

        if (empty($_POST["password2"])) {
            $error .= "{lang:register-passRetype}\n";
        } else {
            $pass = $_POST["password"];
            $pass2 = $_POST["password2"];
            if($pass != $pass2){
                $error .= "{lang:register-passDoesNotMatch}\n";
            }
        }

        // Lets invoke our two class instances since we will need them later
        $Auth = Auth::getInstance();
        $DB = DB::getInstance();


        $salt = $Auth->genSalt();
        $firstName = $DB->sanatize($_POST['firstName']);
        $lastName = $DB->sanatize($_POST['lastName']);
        $password = $Auth->hashPass($DB->sanatize($_POST['password']), $salt);
        $password2 = $Auth->hashPass($DB->sanatize($_POST['password']), $salt);
        $email = $DB->sanatize($_POST['email']);
        $date = date('Y-m-d');

        $sql = "SELECT * FROM users WHERE email='".$email."'";
        $DB->query($sql);

        if($DB->rowCount() >= 1){
            $validated = false;
            $error .= "{lang:register-userExists}\n";
        }

        // Check to see if an errors were reported
        if(!empty($error)){
            $validated = false;
            echo "<div class='error'>".$error."</div>";
        }

        // If validated is true we can continue and add the user into the database
        if($validated){
            $sql = "INSERT INTO users (email, firstName, lastName, password, salt, language, sessionID, lastIP, lastLogin, creationDate) VALUES ('$email', '$firstName', '$lastName','$password', '$salt', 'en', '', '', '', '$date')";

            if ($DB->query($sql)) {
                echo "<div class='success'>{lang:register-success}</div>";
            } else {
                echo "<div class='error'>{lang:register-mysqlError}</div>";
            }
        }

        // Close our database connection to keep things tidey
        $DB->close();
    }
?>
