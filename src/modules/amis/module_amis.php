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
            case'supprimer_amis':
                var_dump("je suis dans le case supprimer ami",$this->controleur->getAction());
                $this->controleur->supprimerAmis();
                break;
        }
    } 
    
    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>