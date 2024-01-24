<?php

include_once 'controller_equipage.php';

class ModuleEquipage
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerEquipage();

        switch ($this->controller->getAction()) {
            case 'equipage':
                $this->controller->affiche();
                break;
            case "ajoutBD":
                $this->controller->ajoutBD();
                break;
            case "creer":
                $this->controller->creer();
                break;
            case "liste":
                $this->controller->list();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}