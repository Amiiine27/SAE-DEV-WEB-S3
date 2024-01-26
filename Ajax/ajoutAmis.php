<?php

require_once '../src/connexion.php'; 
session_start();

class AjoutAmis extends Connexion{

    public function ajout(){
      
        header('content-type: application/json;charset=utf-8');

        // Instanciation de la classe Connexion
        $connexion = new Connexion();
        $data = json_decode(file_get_contents("php://input"), true);
        $annee = 2024;
        $dateAjout = date('Y-m-d H:i:s');

        // Supprime l'ami de la base de données
        $sql = $connexion->getBdd()->prepare('INSERT INTO amis (dateAjout, annee_Amitie) VALUES (:date_a, :annee)');
        $sql->bindParam(':annee', $annee, PDO::PARAM_INT);
        $sql->bindParam(':dateAjout', $dateAjout, PDO::PARAM_STR);

        $sql->execute();

        if ($sql->rowCount() >= 1) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'La suppression a échoué. Veuillez réessayer plus tard.']);
        }
    }
}

$ajout = new AjoutAmis();
$ajoutAmis = $ajout->ajout();

?>
