<?php
///////////////////////////////////
// page.class.php v1             //
//                               //
// Date Created: 03/15/16        //
// Last Modified: 03/15/16       //
// Contact: Blake Warrington     //
// Email: bwarring24@gmail.com   //
///////////////////////////////////

class Page{
    private static $instance;
    
    private $Lang, $Auth, $User, $Mod;
    private $page = null;
    private $pageFullPath = null;
    private $pageHeaderFullPath = null;
    private $module = null;
    private $pageContents = null;
    
    
    function __construct(){
        $this->Lang = Lang::getInstance();
        $this->Auth = Auth::getInstance();
        $this->Mod = Mod::getInstance();
        $authenticated = null;
        
        if($_COOKIE['authenticated'] == true){
            $authenticated = true;
        }else{
            $authenticated = false;
        }

        if($authenticated){
            // User is logged in
            if(isset($_GET['p'])){
                $page = $_GET['p'];
                    
                if(file_exists("pages/dashboard/" .$page. ".pg.php")){
                    // Now lets check to see if there is a header
                    if(file_exists("pages/dashboard/headers/" .$page. ".head.inc.php")){
                        $this->pageHeaderFullPath = "pages/dashboard/headers/" .$page. ".head.inc.php";
                    }
                    
                    // Page exists so we can set the class var now
                    $this->page = $page;
                    $this->pageFullPath = "pages/dashboard/" .$page. ".pg.php";
                }else{
                    // Page doesnt exist redirect to the home page
                    if(file_exists("pages/dashboard/headers/home.head.inc.php")){
                        $this->pageHeaderFullPath = "pages/dashboard/headers/home.head.inc.php";
                    }
                
                    
                    $this->page = "home";
                    $this->pageFullPath = "pages/dashboard/home.pg.php";
                }
            }else{
                // No page was specified. Default to home page
                // Now lets check to see if there is a header
                if(file_exists("pages/dashboard/headers/home.head.inc.php")){
                    $this->pageHeaderFullPath = "pages/dashboard/headers/home.head.inc.php";
                }
                
                $this->page = "home";
                $this->pageFullPath = "pages/dashboard/home.pg.php";
            }
        }else{
            // User isn't logged in
            
            if(isset($_GET['p'])){
                $page = $_GET['p'];
                
                if(file_exists("pages/" .$page. ".pg.php")){
                    // Now lets check to see if there is a header
                    if(file_exists("pages/headers/" .$page. ".head.inc.php")){
                        $this->pageHeaderFullPath = "pages/headers/" .$page. ".head.inc.php";
                    }
                    
                    // Page exists so we can set the class var now
                    $this->page = $page;
                    $this->pageFullPath = "pages/" .$page. ".pg.php";
                }else{
                    // Page doesnt exist redirect to login
                    if(file_exists("pages/headers/login.head.inc.php")){
                        $this->pageHeaderFullPath = "pages/headers/login.head.inc.php";
                    }
                
                    $this->page = "login";
                    $this->pageFullPath = "pages/login.pg.php";
                }
            }else{
                // No page request specified so lets default to the login page
                $this->page = "login";
                $this->pageFullPath = "pages/login.pg.php";
                
                // Now lets check to see if there is a header
                if(file_exists("pages/headers/" .$this->page. ".head.inc.php")){
                    $this->pageHeaderFullPath = "pages/headers/" .$this->page. ".head.inc.php";
                }
            }
        }       
    }
    
    // Create our page
    public function execPage()
	{
		$oldOutput = ob_get_clean();
		ob_start();
        if(!$this->pageHeaderFullPath == null){
            include $this->pageHeaderFullPath;
        }
		include $this->pageFullPath;
        
		$myContent = ob_get_clean();
		ob_start();
        $myContent = $this->Mod->replaceBlock($myContent);             
		$myContent = $this->Lang->replaceBlock($myContent);
		echo $oldOutput;
		return $myContent;
	}
    
    // Returns the current page
    public function getPage(){
        return $this->page;
    }
    
    // Returns the instance of the class
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Page();
        }
        
        return self::$instance;
    }
}

?>