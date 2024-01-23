<?php
global 
$tampon ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../style/utilities.css">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap"
          rel="stylesheet">
    <title>Document</title>
</head>

<body>
<header class="entete bg-color">
    <nav class="navigation-bar">
        <a class="left" href="index.php"><img src="../images/logo.png" alt="Logo du site web"></a>
        <ul class="mid">
            <li class="liste"><a href="index.php?module=home&action=welcome"
                                 class="<?php echo !isset($_GET['module']) || $_GET['module'] == 'home' ? 'link_active' : '' ?>">Accueil</a>
            </li>
            <li class="liste"><a href="index.php?module=map&action=main-map"
                                 class="<?php echo isset($_GET['module']) && $_GET['module'] == 'map' ? 'link_active' : '' ?>">Map</a>
            </li>
            <li class="liste"><a href="#">Shop</a></li>
            <li class="liste"><a href="#">Equipage</a></li>
            <li class="liste"><a href="#">Encyclopédie</a></li>
            <?php
                if(isset($_SESSION['identifiant_utilisateur'])){
                    echo ' <li class="liste"><a href="#">Scores</a></li>';
                    echo ' <li class="liste"><a href="#">Mes items</a></li>';
                    echo ' <li class="liste"><a href="#">Amis</a></li>';
                    echo ' <li class="liste"><a href="#">Mon profil</a></li>';
                    echo '<div class="right">';
                    echo '<form method="post">';
                    echo '<div class="right"><button type="submit" name="logout" class="button_déconnexion">Déconnexion</button></div>';
                    echo '</form>';
                    echo '</div>';
                    echo ' <div id="onglet_connexion" style ="display:none;">
                        <a href="#" class="open-modal" onclick="openModalConnexion()">Se connecter</a>
                    </div>';
    }else{
        echo ' <div id="onglet_connexion" class="right" style="display:block;">
        <a href="#" class="open-modal" onclick="openModalConnexion()">Se connecter</a>
    </div>';
    }

    if (isset($_POST['logout'])) {
        // Détruire la session
        session_destroy();
        // Rediriger l'utilisateur vers la page de connexion ou une autre page appropriée
        header('Location: index.php?');
        exit();
    }

?>

        </ul>
        <!-- Modal -->
        <div id="Modal_connexion" class="modal">
            <div id="modConnexion" class="modal-content">
                <h1 class="titleMod">Connexion</h1>
                <form action='index.php?module=connexion&action=connexion' method='post'>
                    <input  name='login' type='text' maxlength='20' placeholder='nom utilisateur' required/>
                    <input  name='password' type='password' placeholder='mot de passe'/></p>
                    <a class="titleMod" id="link_mdp" href='#'>Mot de passe oublié ?</a>
                    <div class="connexion">
                        <button class ="buttonSubmit" type='submit' name='submit'>Se connecter</button>
                </form>
                        <div class="right">
                        <a href='#' class ="open-modal" onclick="openModalInscription()">S'inscrire</a>
                        </div>
                    </div>
                <span class="close" onclick="closeModalConnexion()">&times;</span>
                <!-- Contenu du modal -->
            </div>
        </div>

        <div id="Modal_inscription" class="modal">
            <div id="modInscriptions"class="modal-content" style="display: flex; align-items: center; justify-content: center; background-color: #000; height: 50%; width: 40%;">
                <h1 class="titleMod">S'inscrire</h1>
                <form action='index.php?module=connexion&action=inscription' method='post'>
                    <input  name='login' type='text' maxlength='20' placeholder='nom utilisateur' required/>
                    <input  name='password' type='password' placeholder='mot de passe'/></p>
                    <div class="connexion">
                        <button class ="buttonSubmit" type='submit' name='submit'>S'inscrire</button>
                </form>
                    </div>
                <span class="close" onclick="closeModalInscription()">&times;</span>
                <!-- Contenu du modal -->
            </div>
        </div>

        <?php

        /*

        if (isset($_SESSION['identifiant_utilisateur'])) {
          //  var_dump($_SESSION['identifiant_utilisateur']);
            // L'utilisateur est connecté, donc cacher le lien de connexion
          echo '<div id="info_profil" style="display: block;">' .
          ' <div class="tooltip-container"  style="display: block;">
          <img src="/home/etudiants/info/fbenyoussef/local_html/Sae_Dev_Web/SAE-DEV-WEB-S3/images/logo1.png" alt="Photo de profil" class="profile-image" onclick="toggleTooltip()">
                  <div class="tooltip">
                  <ul>
                      <li><a href="#">Mon profil</a></li>
                      <li><a href="#">Amis</a></li>
                      <li><a href="#">Score</a></li>
                      <li><a href="#">Mes Items</a></li>
                  </ul>
              </div>' .
      '</div>';
            echo '<div id="onglet_connexion" style="display: none;">' .
            '<a href="#" class="open-modal" onclick="openModalConnexion()">Se connecter</a>' .
            '</div>';

            if (isset($_POST['logout'])) {
                // Détruire la session
                session_destroy();
                header('Location: index.php');
                // Rediriger l'utilisateur vers la page de connexion ou une autre page appropriée
                exit();
            }
            else {
                echo '<div id="onglet_connexion"> class ="right"' .
                '<a href="#" class="open-modal" onclick="openModalConnexion()">Se connecter</a>' .
               '</div>';
            }
        } else {
           //var_dump($_SESSION['identifiant_utilisateur']);
            // L'utilisateur n'est pas connecté, afficher le lien de connexion
            echo '<div id="info_profil" style="display: none;">' .
            ' <div class="tooltip-container">
            <img src="/home/etudiants/info/fbenyoussef/local_html/Sae_Dev_Web/SAE-DEV-WEB-S3/images/logo1.png" alt="Photo de profil" class="profile-image" onclick="toggleTooltip()">
                    <div class="tooltip">
                    <ul>
                        <li><a href="#">Mon profil</a></li>
                        <li><a href="#">Amis</a></li>
                        <li><a href="#">Score</a></li>
                        <li><a href="#">Mes Items</a></li>
                    </ul>
                </div>' .
        '</div>';
    
        }
        */
    
        ?>
    
    <div id="onglet_connexion" class="right">
            <a href="#" class="open-modal" onclick="openModalConnexion()">Se connecter</a>
        </div>

    </nav>

</header>

<main>
    <?php echo $tampon; ?>
</main>

<footer>
    <p>© 2023 Red Line Defense, Inc. Tous droits réservés.</p>
</footer>

<script>

    // Fonction pour afficher le modal
    function openModalConnexion() {
        var modal = document.getElementById("Modal_connexion");
        modal.style.display = "block";
    }

    function openModalInscription() {
        var modalConnexion = document.getElementById("Modal_connexion");
        var modal = document.getElementById("Modal_connexion");
        modalConnexion.style.display = "none";
        var modalInscription = document.getElementById("Modal_inscription");
        modalInscription.style.display = "block";
    }

    function toggleTooltip() {
        const tooltip = document.querySelector('.tooltip');
        tooltip.style.display = (tooltip.style.display === 'block' ? 'none' : 'block');
    }

    document.addEventListener('click', function (event) {
        const profileImage = document.querySelector('.profile-image');
        const tooltip = document.querySelector('.tooltip');
    });

    // Fonction pour fermer le modal
    function closeModalConnexion() {
        var modal = document.getElementById("Modal_connexion");
        modal.style.display = "none";
    }

    function closeModalInscription() {
        var modal = document.getElementById("Modal_inscription");
        modal.style.display = "none";
    }

    // Ajoutez un écouteur d'événements à la balise avec la classe "open-modal"
    var openModalLink = document.querySelector(".open-modal");
    openModalLink.addEventListener("click", function (e) {
        e.preventDefault(); // Empêche le comportement par défaut du lien
        openModal(); // Appelle la fonction pour afficher le modal
    });

    // Ajoutez un écouteur d'événements pour la fermeture du modal lorsque l'utilisateur clique en dehors du modal
    window.addEventListener("click", function (e) {
        var modal = document.getElementById("myModal");
        if (e.target === modal) {
            closeModal(); // Ferme le modal si l'utilisateur clique en dehors du contenu du modal
        }
    });

</script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</html>