<?php

require_once 'vue_map.php';
require_once 'model_map.php';

class ControllerMap
{
    private string $action;
    private VueMap $vue;
    private ModelMap $model;

    public function __construct()
    {
        $this->vue = new VueMap();
        $this->model = new ModelMap();
        $this->action = $_GET['action'] ?? 'main-map';
    }

    public function getAction()
    {
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

    public function mainMap(): void
    {
        $this->vue->mainMap($this->getMaps());
    }

    public function getMaps(): array
    {
        return $this->model->getMaps();
    }
}