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

    public function sameAvatar() {

    }

    public function changeProfile() {
        $avatarSet = true;
        if($_FILES['avatar']['name'] == "") {
            $avatarSet = false;
        }

        $sqlQuery = Connexion::$bdd->prepare('SELECT img_profil FROM joueur WHERE username = :username;');
        $sqlQuery->execute([
            'username' => $_SESSION['identifiant_utilisateur']
        ]);

        $img_profil_db = $sqlQuery->fetchAll();

        if($avatarSet) {
            if($_FILES['avatar']['name'] != $img_profil_db[0]) {
                unlink("../images/profile/avatars/" . $img_profil_db[0]['img_profil']);
            }
    
            move_uploaded_file($_FILES['avatar']['tmp_name'], "../images/profile/avatars/" . $_FILES['avatar']['name']);
        }
        
        $sqlQuery = Connexion::$bdd->prepare('SELECT username FROM joueur;');
        $sqlQuery->execute();
        $usernameArray = $sqlQuery->fetchAll();

        $isSameUsername = false;

        foreach($usernameArray as $username_db) {
            if($_POST['username'] == $username_db['username'] && $username_db['username'] != $_SESSION['identifiant_utilisateur']) {
                $isSameUsername = true;
            }
        }

        if($isSameUsername == false) {
            $sqlQuery = Connexion::$bdd->prepare('UPDATE joueur SET username = :username WHERE username = :old_username;');
            $sqlQuery->execute([
                'username' => $_POST['username'],
                'old_username' => $_SESSION['identifiant_utilisateur']
            ]);
    
            $_SESSION['identifiant_utilisateur'] = $_POST['username'];

            if($avatarSet) {
                $sqlQuery = Connexion::$bdd->prepare('UPDATE joueur SET img_profil = :avatar WHERE username = :old_username;');
                $sqlQuery->execute([
                    'avatar' => $_FILES['avatar']['name'],
                    'old_username' => $_SESSION['identifiant_utilisateur']
                ]);
            }

            return false;
        }
        else {
            return true;
        }
    }
}