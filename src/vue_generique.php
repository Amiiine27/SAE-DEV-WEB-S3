<?php

if (!defined('MY_APP')) {
    die("Accès interdit");
}

Class VueGenerique{
    public function __construct(){
        ob_start(); 
    }

    public static function getAffichage(){
        return ob_get_clean();
    }
}

?>
