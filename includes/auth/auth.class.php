<?php

class Auth{
    private static $instance;
    
	private $email = NULL;
	private $password = NULL;
    private $language = NULL;
	private $authenticated = false;
	private $DB = NULL;
    private $User= NULL;
    
    public function __construct(){
        $this->DB = new DB();
        $this->User = User::getInstance();

        $this->authenticate();
    }
    
    public function authenticate(){
        if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
            // User is not yet logged in so don't do anything
        }else{
            $this->email = $_SESSION['email'];
            $this->password = $this->hashPass($_SESSION['password'], $this->getSalt($this->email));
            
            $sql = "SELECT * FROM users WHERE email='".$this->email."'";
            
            $this->DB->query($sql);
            $row = $this->DB->singleRecord();
            $this->authenticated = $this->compareHash($row['password']);
            //setcookie("authenticated", "1", (time() + 3600), "/phase4/Katrina-Panel/");
            setcookie("authenticated", "1", (time() + 3600), "/");
            $_SESSION['authenticated'] = $this->authenticated;

            if($this->isAuthenticated()){
                $this->User->updateInfo($row);
                //unset($_SESSION['password']);
            }

            $this->DB->close();
        }
    }
    
    public function updateIP(){
        if($this->authenticated){
            $sql = "UPDATE users SET lastIP='".$_SERVER['REMOTE_ADDR']."' WHERE email='".$this->email."'";
            $this->DB->query($sql);
        }
    }
    
    public function updateLoginDate(){
        if($this->authenticated){
            $sql = "UPDATE users SET lastLogin='".date('Y/m/d', time())."' WHERE email='".$this->email."'";
            $this->DB->query($sql);
        }
    }
    
    // Generates the hash for the given input
    public function hashPass($pass, $salt){
        return crypt($pass, '$6$rounds=5000$'.$salt.'$');
    }
    
    // Pulls the hash for the user from the database
    public function getHash($email){
        $sql = "SELECT * FROM users WHERE email='".$email."'";
        
        $this->DB->query($sql);
        $row = $this->DB->singleRecord();
        return $row['password'];
        
    }
    
    public function getSalt($email){
        $sql = "SELECT * FROM users WHERE email='".$email."'";
        
        $this->DB->query($sql);
        $row = $this->DB->singleRecord();
        return $row['salt'];
    }
    
    // Compares the two hashes
    // return true or false
    public function compareHash($password){
        if($this->password == $password){
            return true;
        }
        
        return false;
    }
    
    // Create a 16 character random salt
    public function genSalt(){
        return mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
    }
    
    // Returns true if authenticated or false if not authenticated
    public function isAuthenticated(){
        return $this->authenticated;
    }
    
    // Revoke authorization from the user's sesion
    public function deAuth(){
        $this->updateIP();
        $this->updateLoginDate();
        $this->authenticated = false;
        unset($_COOKIE['authenticated']);
        setcookie("authenticated", "", time()-3600, "/");
        session_destroy();
    }
    
    // Gets the current instance of the class
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Auth();
        }
        
        return self::$instance;
    }
    
}

?>