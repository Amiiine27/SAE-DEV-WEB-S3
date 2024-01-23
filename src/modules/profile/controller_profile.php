<?php

require_once 'vue_profile.php';
require_once 'model_profile.php';

class ControllerProfile
{
    private string $action;
    private VueProfile $vue;
    private ModelProfile $model;

    public function __construct()
    {
        $this->vue = new VueProfile();
        $this->model = new ModelProfile();
        $this->action = $_GET['action'] ?? 'main_profile';
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function displayContent(): false|string
    {
        return $this->vue->getAffichage();
    }

    public function mainProfile(): void
    {
        $this->vue->mainProfile($this->model->getUser($_SESSION['identifiant_utilisateur']));
    }
}