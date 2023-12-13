<?php

if (!defined('MY_APP')) {
    die("Accès interdit");
}
require_once 'module/mod_connexion/modele_connexion.php';
require_once 'module/mod_connexion/vue_connexion.php';
require_once 'Connexion.php';

class ContConnexion{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
    }

    public function exec(){
        $this->action = isset($_GET['action'])? $_GET['action'] : 'bievenue';
        switch($this->getAction()){
            case 'inscription':
                $this->form_inscription();
                $this->ajoutUtilisateur();
                break;

            case 'connexion': 
                $this->form_connexion();
                $this->VerifConnexion();
                break;
                case 'deconnexion': 
                    $this->deconnexionUtilisateur();
                    break;    
        }
    }

	

    public function form_inscription(){
        $this->vue->formInscription();
    }


    public function ajoutUtilisateur(){
        $this->modele->ajoutUtilisateur();
    }
    

    public function getAffichage(){
        return $this->vue->getAffichage();
    }
    

    public function form_connexion(){
        $this->vue->formConnexion();
    }


    public function VerifConnexion(){
            $this->modele->connexionUtilisateur();
    }
    

    public function deconnexionUtilisateur(){
        $this->modele->deconnexionUtilisateur();
    }

    public function getVue(){
        return $this->vue;
    }
    
    public function bienvenue(){
         echo '<p>Bienvenue sur le site</p><br>';
    }


    public function getAction(){
        return $this->action;
    }

}

?>