<?php

include_once 'controller_profile.php';

class ModuleProfile
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerProfile();

        switch ($this->controller->getAction()) {
            case 'main_profile':
                $this->controller->mainProfile();
                break;
            case 'change_profile':
                $this->controller->changeProfile();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}