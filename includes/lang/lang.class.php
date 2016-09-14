<?php
///////////////////////////////////
// lang.class.php v1             //
//                               //
// Date Created: 03/09/16        //
// Last Modified: 03/17/16       //
// Contact: Blake Warrington     //
// Email: bwarring24@gmail.com   //
///////////////////////////////////

class Lang{
    private static $instance;
    private $coreError;
    private $lang;
    private $Auth;
    private $langPack;
    
    private function __construct(){
        // TODO allow users to change their language via settings
        
        $this->Auth = Auth::getInstance();

        $this->lang = $_SESSION['settings']['language'];
        
        if(file_exists("includes/lang/packs/" .$this->lang.".lang.php")){
            // Language pack exists, lets go ahead and load it.
            require_once("includes/lang/packs/" .$this->lang.".lang.php");
            $this->langPack = $langPack;
        }else{
            // Well since we do not have a language that is bad so lets die
            
            // TODO report this error to our coreError reporting mechanism
            
            // Replace error message with coreError Message
            die("Language pack not found. Unsupported language");
        }
    }
    
    // Return the language string from the language pack
    public function getLangString($subject, $description){
        return $this->langPack[$subject][$description];
    }
    
    // Parses through the document and replaces all occurences of {lang:pageName-blockDesc}
    public function replaceBlock($string){
        if (preg_match_all("/{(lang:[^{]*)}/i", $string, $array))
		{
			$array = $array[0];
			$newString = $string;
            
			foreach($array as $key => $value)
			{
				$newValue = str_replace('{', '', str_replace('}', '', str_replace('lang:', '', $value)));
				$explosion = explode('-', $newValue);
				$subject = $explosion[0];
				$option = $explosion[1];
                
                if($subject == "pageName"){
                    if(isset($_GET['p'])){
                        $subject = $_GET['p'];
                    }else{
                        if($this->Auth->isAuthenticated()){
                            $subject = "home";
                        }else{
                            $subject = "login";    
                        }
                    }
                }
				$newString = str_replace($value, $this->langPack[$subject][$option], $newString);	
			}
			
			$newString = str_replace('{lang}', $this->lang, $newString);
			
			return $newString;
		}
		else
		{
			return $string;
		}  
    }    
    
    public function changeLanguage($newLanguage){
        $this->lang = $newLanguage;
    }
    
    // Returns the instance of the class
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Lang();
        }
        
        return self::$instance;
    }
}

?>