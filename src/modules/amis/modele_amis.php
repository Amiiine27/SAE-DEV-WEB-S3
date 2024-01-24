<?php

require_once 'connexion.php';

class ModeleAmis extends Connexion{
  private $sql;  
    public function __construct(){
    }

    public function getId($username){
      // Préparez la requête SQL en utilisant un paramètre nommé :id
      $this->sql = Connexion::getBdd()->prepare('SELECT idJoueur FROM joueur WHERE username = :username');
  
      // Liez la variable $id au paramètre nommé :id dans la requête
      $this->sql->bindParam(':username', $username, PDO::PARAM_STR);
  
      // Exécutez la requête
      $this->sql->execute();
  
      // Récupérez les résultats sous forme de tableau associatif
      return $this->sql->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getIdAmis($idJoueur){
    // Préparez la requête SQL en utilisant un paramètre nommé :id
    $this->sql = Connexion::getBdd()->prepare('SELECT idAmi FROM estAmi WHERE idJoueur = :idJoueur');

    // Liez la variable $idJoueur au paramètre nommé :idJoueur dans la requête
    $this->sql->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);

    // Exécutez la requête
    $this->sql->execute();

    // Récupérez les résultats sous forme de tableau associatif
    return $this->sql->fetchAll(PDO::FETCH_ASSOC);
}



public function getInfosAmis($idAmi){
  // Préparez la requête SQL en utilisant un paramètre nommé :id
  $this->sql = Connexion::getBdd()->prepare('SELECT username,money,img_profil,online FROM joueur WHERE idJoueur = :idAmis');

  // Liez la variable $id au paramètre nommé :id dans la requête
  $this->sql->bindParam(':idAmis', $idAmi, PDO::PARAM_INT);

  // Exécutez la requête
  $this->sql->execute();

  // Récupérez les résultats sous forme de tableau associatif
  return $this->sql->fetchAll(PDO::FETCH_ASSOC);
}

public function supprimerAmis($idJoueur, $idAmi){
  // Supprime l'ami de la base de données
  $sql = Connexion::getBdd()->prepare('DELETE FROM estAmi WHERE idAmi = :idAmi AND idJoueur = :idJoueur');
  $sql->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
  $sql->bindParam(':idAmi', $idAmi, PDO::PARAM_INT);

  if ($sql->execute()) {
      return true; // Suppression réussie
  } else {
      return false; // Suppression échouée
  }
}




}

    

?>