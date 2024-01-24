<?php


require_once 'modele_amis.php';
require_once 'vue_amis.php';
require_once 'connexion.php';

class ContAmis{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleAmis();
        $this->vue = new VueAmis();
        $this->action = isset($_GET['action'])?? 'mes_amis';
    }
    
    public function getVue(){
        return $this->vue;
    }

   public function supprimerAmis(){
    if (isset($_POST['submit']) && isset($_POST['ami_id'])) {
        // Récupère l'ID de l'ami depuis le formulaire
        $idAmi = $_POST['ami_id'];
        
        // Récupère l'ID du joueur
        $idJoueur = $this->modele->getId($_SESSION['identifiant_utilisateur']);
        
        // Appelle la méthode supprimerAmis dans le modèle
        $this->modele->supprimerAmis($idJoueur, $idAmi);
    }
}

    public function detailsAmis(){
            $idJoueur = $this->modele->getId($_SESSION['identifiant_utilisateur']);
            $idAmis = $this->modele->getIdAmis($idJoueur);
            $infosAmisArray = array();
            foreach ($idAmis as $ami) {
                $idAmi = $ami["idAmi"];
                $infosAmi = $this->modele->getInfosAmis($idAmi);

                // Ajouter les informations dans le tableau associatif
                $infosAmisArray[$idAmi] = $infosAmi;
            }
            $this->vue->detailsAmis($infosAmisArray);
            
        }
    
    
    public function getAction(){
        return $this->action;
    }

    public function displayContent() 
    {
        return $this->vue->getAffichage();
    }

}

?>