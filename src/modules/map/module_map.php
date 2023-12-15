<?php

include_once 'controller_map.php';

class ModuleMap
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerMap();

        switch ($this->controller->getAction()) {
            case 'main-map':
                $this->controller->mainMap();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}