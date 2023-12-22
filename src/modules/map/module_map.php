<?php

include_once 'controller_map.php';

class ModuleMap
{
    private ControllerMap $controller;

    public function __construct()
    {
        $this->controller = new ControllerMap();

        switch ($this->controller->getAction()) {
            case 'main_map':
                $this->controller->mainMap();
                break;
            case 'show_more':
                $this->controller->showMore();
                break;
        }
    }

    public function displayContent(): false|string
    {
        return $this->controller->displayContent();
    }
}