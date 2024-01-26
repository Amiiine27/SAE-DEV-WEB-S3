<?php

require_once 'connexion.php';

class ModeleShop extends Connexion{

    public function acheter()
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM Shop WHERE idItem=:id_item;');
        $sqlQuery->execute([
            "id_item" => $_GET['id_item']
        ]);
        $arrayItem = $sqlQuery->fetchAll();
        $sqlQuery = Connexion::$bdd->prepare('INSERT into Transaction(prix) VALUES (:prix_item);');
        $sqlQuery->execute([
            "prix_item" => $arrayItem[0]["prix"]
        ]);

        return $sqlQuery->fetchAll();
    }

}

    

?>