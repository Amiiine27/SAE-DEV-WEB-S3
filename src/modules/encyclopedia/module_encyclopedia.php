<?php

require_once 'controller_encyclopedia.php';

class ModuleEncyclopedia
{
    private ControllerEncyclopedia $controller;

    public function __construct()
    {
        $this->controller = new ControllerEncyclopedia();

        switch ($this->controller->getAction()) {
            case 'main_encyclopedia':
                $this->controller->mainEncyclopedia();
                break;
        }
    }

    public function displayContent(): false|string
    {
        return $this->controller->displayContent();
    }
}