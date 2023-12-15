<?php

include_once 'vue_map.php';

class ControllerMap
{
    private $action;
    private $vue;

    public function __construct()
    {
        $this->vue = new VueMap();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'main-map';
    }

    public function getAction()
    {
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

    public function mainMap()
    {
        $this->vue->mainMap();
    }
}