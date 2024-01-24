<?php

include_once 'controller_aPropos.php';

class ModuleApropos
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerApropos();

        switch ($this->controller->getAction()) {
            case 'apropos':
                $this->controller->affiche();
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}