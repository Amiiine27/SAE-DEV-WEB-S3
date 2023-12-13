<?php

if (!defined('MY_APP')) {
  die("Accès interdit");
}

require_once 'Connexion.php';

class ModeleConnexion extends Connexion{
    private $sql;  
    public function __construct(){
    }

    /*
    public function getListe(){
        $this->sql = Connexion::getBdd()->prepare('SELECT id, nom,annee_creation,description,pays,logo FROM Equipes');
        $this->sql->execute();
        return $this->sql->fetchAll();
    }
    */

    public function ajoutUtilisateur(){
        // Vérifier si le formulaire est soumis 
        if (isset( $_POST['submit']) && isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $sql = Connexion::getBdd()->prepare('SELECT * FROM utilisateur WHERE login = :login');
            $sql->bindParam(':login', $login, PDO::PARAM_STR); // Assurez-vous de lier le paramètre :login avec une valeur $login
            $sql->execute();
            if($sql->rowCount() >= 1) {
                echo'Ce login existe déjà' . '</br>';
                return;
            }
            else{
                $hashMotDePasse = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $password = $hashMotDePasse;
                $sql =  Connexion::getBdd()->prepare('INSERT INTO utilisateur (login,password) VALUES (:login,:password)');
                $sql->bindParam(':login', $login);
                $sql->bindParam(':password', $password);
                    // insert one row
                    $sql->execute();
                    echo'Inscription validé' . '</br>'; 
            }  
      }
    }


public function connexionUtilisateur() {
  if (isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['password'])) {
    if(isset($_SESSION['identifiant_utilisateur']) && $_SESSION['identifiant_utilisateur'] == $_POST['login']) {
      echo 'Vous êtes déjà connecté sous l\'identifiant : ' . $_SESSION['identifiant_utilisateur'] . '<br>';
      return ;
    }
    else{
      $login = $_POST['login'];
      $password = $_POST['password'];
      
      $sql = Connexion::getBdd()->prepare('SELECT * FROM utilisateur WHERE login = :login');
      $sql->bindParam(':login', $login, PDO::PARAM_STR);
      $sql->execute();

      if ($sql->rowCount() == 1) {
          $row = $sql->fetch(PDO::FETCH_ASSOC); // permet de récupérer les données de la requete
          if (password_verify($password, $row['password'])) {
              $_SESSION['identifiant_utilisateur'] = $login;
              echo 'variable session : ' . $_SESSION['identifiant_utilisateur'] .'<br>';
              echo 'Connexion validée' . '</br>';
          } else {
              echo 'Login ou mot de passe incorrect' .'<br>';
          }
      } else {
          echo 'Login ou mot de passe incorrect' ;
      }
      return;
    }
  }
}

  public function deconnexionUtilisateur() {
    if(isset($_SESSION['identifiant_utilisateur'])) {
      echo 'Déconnexion réussie, identifiant :' . $_SESSION['identifiant_utilisateur'] .'<br>';
      unset($_SESSION['identifiant_utilisateur']);
    }
    else{
      echo"Vous n'êtes pas connecté\n". '<br>';
    }
  }


}

    

?>