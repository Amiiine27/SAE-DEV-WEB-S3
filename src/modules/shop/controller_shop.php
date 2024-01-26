<?php


require_once 'modele_shop.php';
require_once 'vue_shop.php';
require_once 'connexion.php';

class ControllerShop{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleShop();
        $this->vue = new VueShop();
        $this->action = isset($_GET['action'])?? 'mesItems';
    }

    public function afficher(){
        $this->vue->welcome();
    }

    
    public function getAction(){
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

    public function acheter()
    {
        $this->modele->acheter();
        $this->vue->acheter();
    }

}

?>