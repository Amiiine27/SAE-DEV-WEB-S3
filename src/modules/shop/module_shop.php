<?php

include_once 'controller_shop.php';

class ModuleShop
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerShop();

        switch ($this->controller->getAction()) {
            case 'acheter':
                $this->controller->acheter();
                break;
            case 'shop':
                $this->controller->afficher();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}