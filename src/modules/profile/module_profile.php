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
            case 'change_password':
                $this->controller->changePassword();
                break;
            case 'submit_password':
                $this->controller->submitPassword();
                break;
            case 'actual_password_error':
                $this->controller->actualPasswordError();
                break;
            case 'password_confirm_error':
                $this->controller->passwordConfirmError();
                break;
            case 'password_change_success':
                $this->controller->passwordChangeSuccess();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}