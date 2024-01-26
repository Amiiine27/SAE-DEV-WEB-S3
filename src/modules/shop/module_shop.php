<?php

include_once 'controller_shop.php';

class ModuleShop
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerShop();

        switch ($this->controller->getAction()) {
            case 'mesItems':
                $this->controller->afficher();
                break;
            case 'acheter':
                $this->controller->acheter();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}