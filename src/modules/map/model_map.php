<?php

class ModelMap extends Connexion
{
    public function getMaps()
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM Map;');
        $sqlQuery->execute();

        return $sqlQuery->fetchAll();
    }
}