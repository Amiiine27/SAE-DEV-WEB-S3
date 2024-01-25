<?php
require_once 'connexion.php';
require_once 'vue_generique.php';

session_start();

Connexion::initConnexion();

$module = $_GET['module'] ?? 'home';
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
    case 'connexion':
        $moduleFile = './modules/connexion/module_connexion.php';
        $moduleClass = 'ModConnexion';
        break;
    case 'encyclopedia':
        $moduleFile = './modules/encyclopedia/module_encyclopedia.php';
        $moduleClass = 'ModuleEncyclopedia';
        break;
    case 'profile':
        $moduleFile = './modules/profile/module_profile.php';
        $moduleClass = 'ModuleProfile';
        break;
    case 'apropos':
        $moduleFile = './modules/aPropos/module_aPropos.php';
        $moduleClass = 'ModuleApropos';
        break;
    case 'equipage':
        $moduleFile = './modules/equipage/module_equipage.php';
        $moduleClass = 'ModuleEquipage';
        break;
    case 'amis':
        $moduleFile = './modules/amis/module_amis.php';
        $moduleClass = 'ModAmis';
        break;
    case 'scores':
        $moduleFile = './modules/scores/module_scores.php';
        $moduleClass = 'ModuleScores';
        break;
}

if (file_exists($moduleFile)) {
    require $moduleFile;
    $moduleClass = new $moduleClass();
} else {
    var_dump($moduleFile);
    var_dump($moduleClass);
    echo "Erreur sur le module dans l'index";
}

$tampon = $moduleClass->displayContent();

include_once 'template.php';
