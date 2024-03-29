<?php

class ModelMap extends Connexion
{
    public function getAllMaps()
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM map;');
        $sqlQuery->execute();

        return $sqlQuery->fetchAll();
    }

    public function getMap()
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM map WHERE id = :id_map;');
        $sqlQuery->execute([
            'id_map' => $_GET['id_map']
        ]);

        return $sqlQuery->fetch();
    }
}