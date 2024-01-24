<?php

include_once 'vue_aPropos.php';

class ControllerApropos
{
    private $action;
    private $vue;

    public function __construct()
    {
        $this->action = isset($_GET['action']) ? $_GET['action'] : "apropos";
        $this->vue = new VueApropos();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function affiche()
    {
        $this->vue->affiche();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}