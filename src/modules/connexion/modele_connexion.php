<?php

require_once 'connexion.php';

class ModeleConnexion extends Connexion
{
    public function __construct()
    {
    }


    public function ajoutUtilisateur()
    {
        // Vérifier si le formulaire est soumis 
        if (isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $sql = Connexion::getBdd()->prepare('SELECT * FROM joueur WHERE username = :login');
            $sql->bindParam(':login', $login, PDO::PARAM_STR); // Assurez-vous de lier le paramètre :login avec une valeur $login
            $sql->execute();
            if ($sql->rowCount() >= 1) {
                echo 'Ce login existe déjà' . '</br>';
                return;
            } else {
                $hashMotDePasse = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $password = $hashMotDePasse;
                $sql = Connexion::getBdd()->prepare('INSERT INTO joueur (username,password,money,img_profil,online) VALUES (:login,:password,0,null,true)');
                $sql->bindParam(':login', $login);
                $sql->bindParam(':password', $password);
                // insert one row
                $sql->execute();
                echo 'Inscription validé' . '</br>';
            }
        }
    }


    public function connexionUtilisateur()
    {
        if (isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['password'])) {
            if (isset($_SESSION['identifiant_utilisateur']) && $_SESSION['identifiant_utilisateur'] == $_POST['login']) {
                echo 'Vous êtes déjà connecté sous l\'identifiant : ' . $_SESSION['identifiant_utilisateur'] . '<br>';
                return;
            } else {
                $login = $_POST['login'];
                $password = $_POST['password'];

                $sql = Connexion::getBdd()->prepare('SELECT * FROM joueur WHERE username = :login');
                $sql->bindParam(':login', $login, PDO::PARAM_STR);
                $sql->execute();

                if ($sql->rowCount() == 1) {
                    $row = $sql->fetch(PDO::FETCH_ASSOC); // permet de récupérer les données de la requete
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['identifiant_utilisateur'] = $login;
                        header('Location: index.php');
//              echo 'variable session : ' . $_SESSION['identifiant_utilisateur'] .'<br>';
//              echo 'Connexion validée' . '</br>';
                    } else {
                        echo 'Login ou mot de passe incorrect' . '<br>';
                    }
                } else {
                    echo 'Login ou mot de passe incorrect';
                }
                return;
            }
        }
    }

    public function deconnexionUtilisateur()
    {
        if (isset($_SESSION['identifiant_utilisateur'])) {
            echo 'Déconnexion réussie, identifiant :' . $_SESSION['identifiant_utilisateur'] . '<br>';
            unset($_SESSION['identifiant_utilisateur']);
        } else {
            echo "Vous n'êtes pas connecté\n" . '<br>';
        }
    }


}


?>