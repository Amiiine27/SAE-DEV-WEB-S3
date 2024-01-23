<?php

class ModelEncyclopedia extends Connexion
{
    public function getEncyclopedia(): array
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM encyclopedie;');
        $sqlQuery->execute();

        return $sqlQuery->fetchAll();
    }

    public function getItem(): array
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM encyclopedie WHERE id = :id_item;');
        $sqlQuery->execute([
            'id_item' => $_GET['id_item']
        ]);

        return $sqlQuery->fetch();
    }
}