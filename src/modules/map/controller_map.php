<?php

require_once 'vue_map.php';
require_once 'model_map.php';

class ControllerMap
{
    private $action;
    private $vue;
    private $model;

    public function __construct()
    {
        $this->vue = new VueMap();
        $this->model = new ModelMap();
        $this->action = $_GET['action'] ?? 'main-map';
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

    public function mainMap(): void
    {
        $this->vue->mainMap($this->model->getAllMaps());
    }

    public function showMore(): void
    {
        $this->vue->showMore($this->model->getMap());
    }
}