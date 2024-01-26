<?php

include_once 'vue_equipage.php';
include_once 'modele_equipage.php';


class ControllerEquipage
{
    private $action;
    private $vue;
    private $modele;
    private $connexion;

    public function __construct()
    {
        $this->action = isset($_GET['action']) ? $_GET['action'] : "equipage";
        $this->vue = new VueEquipage();
        $this->modele = new ModeleEquipage();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function list(){
        if($_SESSION['identifiant_utilisateur']!=null){
        //var_dump($this->modele->getList());
        $this->vue->equipage_rejoindre($this->modele->getList());
        }
        else{
            echo "<script>alert(\"VEUILLEZ VOUS CONNECTER POUR ACCÉDER À CETTE PAGE\")</script>";
            $this->vue->equipage_base();
        }
    }

    public function affiche()
    {
        if($_SESSION['identifiant_utilisateur']!=null){
            $idJoueur = $this->modele->getId($_SESSION['identifiant_utilisateur']);
            $idClan = $this->modele->getIdClan($_SESSION['identifiant_utilisateur']);
            $idC = $idClan[0]["idClan"];
            

            if($idC!=null){
                $idC = $idClan[0]["idClan"];
                $idJ = $idJoueur[0]["idJoueur"];
                $this->vue->myClan($this->modele->getInfosClan($idC));
            }

            else{
                $this->vue->equipage_base();
            }
            
        }
        else{
            $this->vue->equipage_base();
        }
        
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

    public function quit()
    {
        $idJoueur = $this->modele->getId($_SESSION['identifiant_utilisateur']);
        $idJ = $idJoueur[0]["idJoueur"];
        $idClan = $this->modele->getIdClan($_SESSION['identifiant_utilisateur']);
        $idC = $idClan[0]["idClan"];
        
        $this->modele->quitClan($idJ);
        $this->modele->updateClan($idC);
        $this->vue->quitOk();
    }

    public function ajoutBD()
    { 
        
        $idJoueur = $this->modele->getId($_SESSION['identifiant_utilisateur']);
        $idJ = $idJoueur[0]["idJoueur"];
        $this->modele->ajout($idJ);
        $this->vue->creationOk();
        
    }

    public function creer()
    {
        if($_SESSION['identifiant_utilisateur']!=null){
            
            $this->vue->equipage_creer();
            
        }
        else{
            echo "<script>alert(\"VEUILLEZ VOUS CONNECTER POUR ACCÉDER À CETTE PAGE\")</script>";
            $this->vue->equipage_base();
        }
    }

    public function detailsAmis(){
        $idJoueur = $this->modele->getId($_SESSION['identifiant_utilisateur']);
        $this->vue->detailsAmis($infosAmisArray);
    }

    public function joinclan(){
        
        $idJoueur = $this->modele->getId($_SESSION['identifiant_utilisateur']);
        $idJ = $idJoueur[0]["idJoueur"];
        
        $this->modele->joinClan($idJ, $_GET['id']);
        $this->vue->joinOk();
    }
    
}