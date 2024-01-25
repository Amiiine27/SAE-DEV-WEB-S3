<?php

class ModelEncyclopedia extends Connexion
{
    public function getEncyclopedia()
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM encyclopedie;');
        $sqlQuery->execute();

        return $sqlQuery->fetchAll();
    }

    public function getItem()
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM encyclopedie WHERE id = :id_item;');
        $sqlQuery->execute([
            'id_item' => $_GET['id_item']
        ]);

        return $sqlQuery->fetch();
    }
}