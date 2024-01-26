<?php

include_once 'controller_items.php';

class ModuleItems
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerItems();

        switch ($this->controller->getAction()) {
            case 'mesItems':
                $this->controller->afficher();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}