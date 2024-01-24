<?php

require_once 'controller_encyclopedia.php';

class ModuleEncyclopedia
{
    private  $controller;

    public function __construct()
    {
        $this->controller = new ControllerEncyclopedia();

        switch ($this->controller->getAction()) {
            case 'main_encyclopedia':
                $this->controller->mainEncyclopedia();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}