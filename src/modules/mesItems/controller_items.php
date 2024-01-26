<?php


require_once 'modele_items.php';
require_once 'vue_items.php';
require_once 'connexion.php';

class ControllerItems{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleItems();
        $this->vue = new VueItems();
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

}

?>