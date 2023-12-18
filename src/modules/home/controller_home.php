<?php

include_once 'vue_home.php';

class ControllerHome
{
    private $action;
    private $vue;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "welcome";
        $this->vue = new VueHome();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function welcome()
    {
        $this->vue->welcome();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}