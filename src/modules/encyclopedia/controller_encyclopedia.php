<?php

require_once 'vue_encyclopedia.php';
require_once 'model_encyclopedia.php';

class ControllerEncyclopedia
{
    private  $action;
    private  $vue;
    private  $model;

    public function __construct()
    {
        $this->vue = new VueEncyclopedia();
        $this->model = new ModelEncyclopedia();
        $this->action = $_GET['action'] ?? 'main_encyclopedia';
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

    public function mainEncyclopedia(): void
    {
        $encyclopediaArray = $this->model->getEncyclopedia();
        $this->vue->mainEncyclopedia($encyclopediaArray);
    }

    public function showMore(): void
    {
        $this->vue->showMore($this->model->getEncyclopedia());
    }
}

