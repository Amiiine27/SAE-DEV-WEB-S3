<?php


class ModelScores extends Connexion
{
    public function getScores()
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT idJoueur FROM joueur WHERE username = :username;');
        $sqlQuery->execute([
            'username' => $_SESSION['identifiant_utilisateur']
        ]);
        $idJoueur = $sqlQuery->fetchAll();

        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM partie WHERE idJoueur = :idJoueur;');
        $sqlQuery->execute([
            'idJoueur' => $idJoueur[0]['idJoueur']
        ]);
        return $sqlQuery->fetchAll();
    }

    public function getMaps()
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM map;');
        $sqlQuery->execute();
        return $sqlQuery->fetchAll();
    }
}