<?php

include_once 'controller_scores.php';

class ModuleScores
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerScores();

        switch ($this->controller->getAction()) {
            case 'main_scores':
                $this->controller->mainScores();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}