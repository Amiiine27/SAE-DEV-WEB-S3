<?php


include_once 'controller_amis.php';

class ModAmis{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContAmis();
        switch($this->controleur->getAction()){
            case 'mes_amis':
                $this->controleur->detailsAmis();
                break;
        }
    } 
    
    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>