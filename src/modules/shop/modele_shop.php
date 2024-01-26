<?php

require_once 'connexion.php';

class ModeleShop extends Connexion{

    public function acheter($id_item)
    {
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM Shop WHERE idItem=:id_item;');
        $sqlQuery->bindParam(':id_item', $id_item);
        $sqlQuery->execute();
        $arrayItem = $sqlQuery->fetchAll();
        var_dump($arrayItem);
        $sqlQuery = Connexion::$bdd->prepare('INSERT into Transaction(prix) VALUES (:prix_item);');
        $sqlQuery->execute([
            "prix_item" => $arrayItem[0]["prix"]
        ]);

        return $sqlQuery->fetchAll();
    }

    public function getItem(){
        $sqlQuery = Connexion::$bdd->prepare('SELECT * FROM Shop;');
        $sqlQuery->execute();
        return $sqlQuery->fetchAll();
    }

}

    

?>