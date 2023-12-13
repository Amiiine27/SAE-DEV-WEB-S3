<?php
    require_once 'connexion.php';

    session_start();

    Connexion::initConnexion();

    include_once 'template.php';
