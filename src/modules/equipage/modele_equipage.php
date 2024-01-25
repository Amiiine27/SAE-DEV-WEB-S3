<?php
require_once 'connexion.php';


class ModeleEquipage extends Connexion
{


    public function ajout($idJ){
      
        if (isset($_POST['submit'])&&isset($_POST['description'])&& isset($_POST['devise']) && isset($_POST['nom'])  && isset($_FILES['embleme_clan'])) {
            $nom = $_POST['nom'];
            $devise = $_POST['devise'];
            $description = $_POST['description'];
            $embleme_clan = null;
            
    
            // Traitement du logo
            $dossierLogos = "./images/"; // Chemin du dossier de logos
            $extension = pathinfo($_FILES['embleme_clan']['name'], PATHINFO_EXTENSION); // Extraction de l'extension du fichier // Che

            // Déplacez le fichier temporaire vers le dossier de logos avec le nouveau nom
                // Insertion des données dans la base de données
                $sql = Connexion::getBdd()->prepare('INSERT IGNORE INTO Clan(description, devise, nom, embleme_clan, idJoueur)  VALUES (:description, :devise, :nom, :embleme_clan, :idJ)');
                $sql->bindParam(':description', $description);
                $sql->bindParam(':devise', $devise);
                $sql->bindParam(':nom', $nom);
                $sql->bindParam(':embleme_clan', $embleme_clan);
                $sql->bindParam(':idJ', $idJ);


                
                

                if ($sql->execute()) {
                    $idClan = self::$bdd->lastInsertId();// Remplacez 123 par l'ID de l'équipe (récupérez-le depuis votre modèle)
    
                    $sth = Connexion::$bdd->prepare('UPDATE joueur SET idClan = :idClan WHERE idJoueur = :idJ');
                    $sth->bindParam(':idJ', $idJ, PDO::PARAM_INT);
                    $sth->bindParam(':idClan', $idClan, PDO::PARAM_INT);
                    $sth->execute();

                    var_dump('clan ', $idClan);
                    // Construisez un nom de fichier unique en utilisant l'ID de l'équipe
                    $nomFichierUnique = $idClan . "." . $extension;
            
                    $nouveaulogo = $dossierLogos. $nomFichierUnique;
                    move_uploaded_file($_FILES['embleme_clan']['tmp_name'], $dossierLogos . $nomFichierUnique);
    
                    

                    $sql = Connexion::getBdd()->prepare('UPDATE Clan SET embleme_clan = :nouveauLogo WHERE idClan = :idClan');
                    $sql->bindParam(':nouveauLogo', $nouveaulogo);
                    $sql->bindParam(':idClan', $idClan, PDO::PARAM_INT); 
                    $sql->execute();
                    echo 'Insertion réussie';
    
                } else {
                    echo 'Erreur lors de l\'insertion dans la base de données.';
                }
            } else {
                echo 'Erreur lors de l\'insertion dans la base de données.';
            }
        } 
    
    


    public function getList()
    {

        $sth = Connexion::$bdd->prepare("SELECT * from Clan");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function getInfosClan($id){
        $sth = Connexion::$bdd->prepare("SELECT * from Clan where idClan = :id");
        $sth->bindParam(':id', $id, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        $sth2 = Connexion::$bdd->prepare("SELECT * from joueur inner join Clan using(idJoueur) where Clan.idClan = :id");
        $sth2->bindParam(':id', $id, PDO::PARAM_STR);
        $sth2->execute();
        $result2 = $sth2->fetchAll(PDO::FETCH_ASSOC);
        
        

        $stmt2 = Connexion::$bdd->prepare("SELECT * FROM joueur WHERE idClan = :id");
        $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt2->execute();
        $membresClan = $stmt2->fetchAll(PDO::FETCH_ASSOC);


        return [
        'clanInfo' => $result,
        'membresClan' => $membresClan,
        'chef' => $result2
    ];
    }

    public function getMembers($id){
        $sth = Connexion::$bdd->prepare("SELECT * from Joueur where idClan = :id");
        $sth->bindParam(':id', $id, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result; 
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

    public function getIdClan($username){
        // Préparez la requête SQL en utilisant un paramètre nommé :id
        $this->sql = Connexion::getBdd()->prepare('SELECT idClan FROM joueur WHERE username = :username');
    
        // Liez la variable $id au paramètre nommé :id dans la requête
        $this->sql->bindParam(':username', $username, PDO::PARAM_STR);
    
        // Exécutez la requête
        $this->sql->execute();
    
        // Récupérez les résultats sous forme de tableau associatif
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function joinClan($idJoueur, $idClan){
        $sth = Connexion::$bdd->prepare('UPDATE joueur SET idClan = :idClan WHERE idJoueur = :idJoueur');
        $sth->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
        $sth->bindParam(':idClan', $idClan, PDO::PARAM_INT);
        $sth->execute();
        return  $sth->rowCount();

    }

    public function updateClan($idClan){
        $sth = Connexion::$bdd->prepare('SELECT joueur.username FROM joueur INNER JOIN Clan ON joueur.idClan = Clan.idClan WHERE Clan.idClan = :idClan');
        $sth->bindParam(':idClan', $idClan, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        var_dump($result);
        if(empty($result[0]['username'])){
            $sth2 = Connexion::$bdd->prepare('DELETE FROM Clan Where Clan.idClan = :idClan');
            $sth2->bindParam(':idClan', $idClan, PDO::PARAM_INT);
            $sth2->execute();
        }
        return  $sth->rowCount();

    }


    public function quitClan($idJoueur){
        $sth = Connexion::$bdd->prepare('UPDATE joueur SET idClan = null WHERE idJoueur = :idJoueur');
        $sth->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
        $sth->execute();
        return  $sth->rowCount();

    }

}

?>