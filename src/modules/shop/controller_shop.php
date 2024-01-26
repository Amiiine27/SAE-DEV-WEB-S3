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
        $this->action = $_GET['action'] ?? 'shop';
    }

    public function getItem(){
        $id_item = $_GET["id_item"];
        return $id_item;
    }

    public function afficher(){
        $this->vue->welcome($this->modele->getItem());
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
        $this->modele->acheter($this->getItem());
        $this->vue->acheter();
    }

}

?>