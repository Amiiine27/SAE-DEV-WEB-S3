<?php

include_once 'controller_profile.php';

class ModuleProfile
{
    private ControllerProfile $controller;

    public function __construct()
    {
        $this->controller = new ControllerProfile();

        switch ($this->controller->getAction()) {
            case 'main_profile':
                $this->controller->mainProfile();
                break;
        }
    }

    public function displayContent(): false|string
    {
        return $this->controller->displayContent();
    }
}