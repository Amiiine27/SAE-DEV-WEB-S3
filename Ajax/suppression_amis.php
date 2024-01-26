<?php

require_once '../src/connexion.php'; 
session_start();

class SuppressionAmis extends Connexion{

    public function suppression(){
      
        header('content-type: application/json;charset=utf-8');

        // Instanciation de la classe Connexion
        $connexion = new Connexion();

        $data = json_decode(file_get_contents("php://input"), true);

        $username = $_SESSION['identifiant_utilisateur'];
        $sql = $connexion->getBdd()->prepare('SELECT idJoueur FROM joueur WHERE username = :username');
        $sql->bindParam(':username', $username, PDO::PARAM_STR);
        $sql->execute();
        $idJoueur = $sql->fetchColumn();

        $idAmi = $data['ami_id'];

        // Supprime l'ami de la base de données
        $sql = $connexion->getBdd()->prepare('DELETE FROM estAmi WHERE (idAmi = :idAmi AND idJoueur = :idJoueur) OR (idAmi = :idJoueur AND idJoueur = :idAmi)');
        $sql->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
        $sql->bindParam(':idAmi', $idAmi, PDO::PARAM_INT);
        $sql->execute();

        if ($sql->rowCount() >= 1) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'La suppression a échoué. Veuillez réessayer plus tard.']);
        }
    }
}

$suppression = new SuppressionAmis();
$supprimerAmis = $suppression->suppression();

?>
