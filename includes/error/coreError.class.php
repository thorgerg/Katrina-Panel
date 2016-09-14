<?php
///////////////////////////////////
// coreError.class.php v1        //
//                               //
// Date Created: 03/09/16        //
// Last Modified: 03/09/16       //
// Contact: Blake Warrington     //
// Email: bwarring24@gmail.com   //
///////////////////////////////////

    class coreError{
        private static $instance;
        
        private function __construct(){
            
        }
        
        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new coreError();
            }
            
            return self::$instance;
        }
    }
?>