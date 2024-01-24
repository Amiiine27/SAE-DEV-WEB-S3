<?php
require_once 'connexion.php';


class ModeleEquipage extends Connexion{

    

    public function ajout(){
      
        if (isset($_POST['submit'])&&isset($_POST['description'])&& isset($_POST['devise']) && isset($_POST['nom'])  && isset($_FILES['embleme_clan'])) {
            $nom = $_POST['nom'];
            $devise = $_POST['devise'];
            $description = $_POST['description'];
            $embleme_clan = null;
            var_dump($embleme_clan);
    
            // Traitement du logo
            $dossierLogos = "./images/"; // Chemin du dossier de logos
            $extension = pathinfo($_FILES['embleme_clan']['name'], PATHINFO_EXTENSION); // Extraction de l'extension du fichier // Che
    
            // Déplacez le fichier temporaire vers le dossier de logos avec le nouveau nom
                // Insertion des données dans la base de données
                $sql = Connexion::getBdd()->prepare('INSERT INTO Clan(description, devise, nom, embleme_clan)  VALUES (:description, :devise, :nom, :embleme_clan)');
                $sql->bindParam(':description', $description);
                $sql->bindParam(':devise', $devise);
                $sql->bindParam(':nom', $nom);
                $sql->bindParam(':embleme_clan', $embleme_clan);
                

                if ($sql->execute()) {
                    $idClan = self::$bdd->lastInsertId();// Remplacez 123 par l'ID de l'équipe (récupérez-le depuis votre modèle)
    
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
                echo 'Erreur lors du téléchargement du logo.';
            }
    }



    public function getList(){

        $sth = Connexion::$bdd->prepare("SELECT * from Clan");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result; 
    }
}

?>