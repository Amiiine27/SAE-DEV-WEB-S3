<?php

include_once 'vue_equipage.php';
include_once 'modele_equipage.php';

class ControllerEquipage
{
    private $action;
    private $vue;
    private $modele;

    public function __construct()
    {
        $this->action = isset($_GET['action']) ? $_GET['action'] : "equipage";
        $this->vue = new VueEquipage();
        $this->modele = new ModeleEquipage();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function list(){
        $this->vue->equipage_rejoindre($this->modele->getList());
    }

    public function affiche()
    {
        $this->vue->equipage_base();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

    public function ajoutBD()
    {
        $this->modele->ajout();
        $this->vue->creationOk();
    }

    public function creer()
    {
        $this->vue->equipage_creer();
    }
}