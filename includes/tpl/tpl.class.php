<?php
///////////////////////////////////
// tpl.class.php v1             //
//                               //
// Date Created: 03/15/16        //
// Last Modified: 03/15/16       //
// Contact: Blake Warrington     //
// Email: bwarring24@gmail.com   //
///////////////////////////////////

class Tpl{
    private static $instance;
    
    private $Auth, $Lang, $Page;
    private $template = null;
    private $contents = null;
    
    function __construct(){
        $this->Lang = Lang::getInstance();
        $this->Page = Page::getInstance();
        $this->Auth = Auth::getInstance();
        
         $authenticated = null;

        if($_COOKIE['authenticated'] == true){
            $authenticated = true;
        }else{
            $authenticated = false;
        }

        if($authenticated){
            // User is logged in so we can load the template for the logged in pages
            if(file_exists("theme/default/main/template.tpl")){
                $fp = fopen("theme/default/main/template.tpl", "r");
                $contents = fread($fp, filesize("theme/default/main/template.tpl")+1);
                fclose($fp);
                
                $this->template = explode("{page}", $this->Lang->replaceBlock($contents));
            }else{
                // Logged in page template doesn't exist. Throw error and report to coreError service
            }
        }else{
            // User is not logged in.
            
            if(isset($_GET['p'])){
                // Specific page is requested
                if(file_exists("theme/default/" .$_GET['p']. "/template.tpl")){
                    $fp = fopen("theme/default/" .$_GET['p']. "/template.tpl", "r");
                    $contents = fread($fp, filesize("theme/default/" .$_GET['p']. "/template.tpl")+1);
                    fclose($fp);
                    
                    $this->template = explode("{page}", $this->Lang->replaceBlock($contents));
                }else{
                    // default to login theme
                    $fp = fopen("theme/default/login/template.tpl", "r");
                    $contents = fread($fp, filesize("theme/default/login/template.tpl")+1);
                    fclose($fp);
                    
                    $this->template = explode("{page}", $this->Lang->replaceBlock($contents));
                }
            }elseif(file_exists("theme/default/login/template.tpl")){
                $fp = fopen("theme/default/login/template.tpl", "r");
                $contents = fread($fp, filesize("theme/default/login/template.tpl")+1);
                fclose($fp);
                
                $this->template = explode("{page}", $this->Lang->replaceBlock($contents));
            }else{
                // Login page template doesn't exist. Throw error and report to coreError service.
                die("Template not found.");
            }
        }
        
    }
    
    // Load our page where {page} exists in our template
    public function display(){
        echo $this->template[0];
        echo $this->Page->execPage();
        echo $this->template[1];
    }
    
    // Gets current instance of the class
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Tpl();
        }
        
        return self::$instance;
    }
}

?>