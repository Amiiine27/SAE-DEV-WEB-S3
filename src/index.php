<?php
    require_once 'connexion.php';

    session_start();

define('MY_APP', true);

if (!defined('MY_APP')) {
    die("Accès interdit");
}


Connexion::initConnexion();
include_once 'template.php';
