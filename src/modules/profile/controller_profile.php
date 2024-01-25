<?php

require_once 'vue_profile.php';
require_once 'model_profile.php';

class ControllerProfile
{
    private $action;
    private $vue;
    private $model;

    public function __construct()
    {
        $this->vue = new VueProfile();
        $this->model = new ModelProfile();
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

    public function mainProfile(): void
    {
        $this->vue->mainProfile($this->model->getUser($_SESSION['identifiant_utilisateur']));
    }

    public function changeProfile()
    {
        $error = $this->model->changeProfile();
        if ($error) {
            $this->vue->changeProfileError();
        } else {
            $this->vue->changeProfile();
        }
    }

    public function changePassword()
    {
        $this->vue->changePassword();
    }

    public function submitPassword()
    {
        $this->model->submitPassword();
    }

    public function actualPasswordError()
    {
        $this->vue->actualPasswordError();
    }

    public function passwordConfirmError()
    {
        $this->vue->passwordConfirmError();
    }

    public function passwordChangeSuccess()
    {
        $this->vue->passwordChangeSuccess();
    }
}