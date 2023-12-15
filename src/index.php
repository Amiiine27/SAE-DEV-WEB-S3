<?php
require_once 'connexion.php';
require_once 'vue_generique.php';

session_start();

Connexion::initConnexion();

$module = isset($_GET['module']) ? $_GET['module'] : 'home';
$moduleClass = '';
$moduleFile = '';

switch ($module) {
    case 'home':
        $moduleFile = './modules/home/module_home.php';
        $moduleClass = 'ModuleHome';
        break;
    case 'map':
        $moduleFile = './modules/map/module_map.php';
        $moduleClass = 'ModuleMap';
        break;
}

if (file_exists($moduleFile)) {
    require $moduleFile;
    $moduleClass = new $moduleClass();
} else {
    echo "Erreur sur le module dans l'index";
}

$tampon = $moduleClass->displayContent();

include_once 'template.php';
