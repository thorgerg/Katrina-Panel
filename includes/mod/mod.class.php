<?php
///////////////////////////////////
// mod.class.php v1             //
//                               //
// Date Created: 04/28/16        //
// Last Modified: 04/28/16       //
// Contact: Blake Warrington     //
// Email: bwarring24@gmail.com   //
///////////////////////////////////

class Mod{
    private static $instance;

    private $Auth;
    
    private function __construct(){
        $this->Auth = Auth::getInstance();
    }
    
    // Parses through the document and replaces all occurences of {mod:moduleName}
    public function replaceBlock($string){
        if (preg_match_all("/{(mod:[^{]*)}/i", $string, $array))
		{
            $array = $array[0];
			$newString = $string;
            $moduleName = "";
        
			foreach($array as $key => $value)
			{               
                $newValue = str_replace('{', '', str_replace('}', '', str_replace('mod:', '', $value)));
                $moduleName = $newValue;
                if(file_exists("includes/mod/modules/".$moduleName.".mod.php")){
                    ob_start();                    
                    include "includes/mod/modules/".$moduleName.".mod.php";
                    $output = ob_get_clean();
                    
                    $contents = file_get_contents("includes/mod/modules/".$moduleName.".mod.php");
                   // include("includes/mod/modules/".$moduleName.".mod.php");
                     $newString = str_replace($value, $output, $newString);
                }else{
                    $newString = str_replace($value, "Module " . $newValue. " is missing.", $newString);
                }
			}
           
            $newString = str_replace('{mod}', "", $newString);

            return $newString;
		}
		else
		{
			return $string;
		}  
    }   

    // Returns the instance of the class
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Mod();
        }
        
        return self::$instance;
    }
}

?>