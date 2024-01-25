<?php

require_once 'vue_scores.php';
require_once 'model_scores.php';

class ControllerScores
{
    private $action;
    private $vue;
    private $model;

    public function __construct()
    {
        $this->vue = new VueScores();
        $this->model = new ModelScores();
        $this->action = $_GET['action'] ?? 'main_profile';
    }

    public function getAction()
    {
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

    public function mainScores()
    {
        $this->vue->mainScores();
    }
}