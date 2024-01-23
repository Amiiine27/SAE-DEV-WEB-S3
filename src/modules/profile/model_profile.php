<?php

class ModelProfile extends Connexion
{
    public function getUser($username): array
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM joueur WHERE username = :username;');
        $sqlQuery->execute([
            'username' => $username
        ]);

        return $sqlQuery->fetchAll();
    }
}