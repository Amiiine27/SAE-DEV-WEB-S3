<?php

include_once 'controller_home.php';

class ModHome
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerHome();

        switch ($this->controller->getAction()) {
            case 'welcome':
                $this->controller->welcome();
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}