<?php global $tampon ?>
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
    <link rel="shortcut icon" href="../assets/Red_Line_Defense_Icone.ico" type="image/x-icon">
    <title>Red Line Defense</title>
    <script src="../js/suppression_amis.js"></script>
    <script src="../js/ajoutAmis.js"></script>
</head>

<body>
<header class="entete bg-color">
    <nav class="navigation-bar">
        <a class="left" href="index.php"><img src="../assets/logo.png" alt="Logo du site web"></a>
        <ul class="mid">
            <li class="liste"><a href="index.php?module=home&action=welcome"
                                 class="<?php echo !isset($_GET['module']) || $_GET['module'] == 'home' ? 'link_active' : '' ?>">Accueil</a>
            </li>
            <li class="liste"><a href="index.php?module=map&action=main_map"
                                 class="<?php echo isset($_GET['module']) && $_GET['module'] == 'map' ? 'link_active' : '' ?>">Map</a>
            </li>
            <li class="liste"><a href="index.php?module=shop&action=shop"
                                 class="<?php echo isset($_GET['module']) && $_GET['module'] == 'shop' ? 'link_active' : '' ?>">Shop</a>
            <li class="liste"><a href="index.php?module=equipage&action=equipage"
                                class="<?php echo isset($_GET['module']) && $_GET['module'] == 'equipage' ? 'link_active' : '' ?>">Equipage</a>
            </li>
                                 class="<?php echo isset($_GET['module']) && $_GET['module'] == 'equipage' ? 'link_active' : '' ?>">Equipage</a>

            </li>
            <li class="liste"><a href="index.php?module=apropos&action=apropos"
                                 class="<?php echo isset($_GET['module']) && $_GET['module'] == 'apropos' ? 'link_active' : '' ?>">A
                    Propos</a>
            </li>
            <li class="liste"><a href="index.php?module=encyclopedia&action=main_encyclopedia"
                                 class="<?php echo isset($_GET['module']) && $_GET['module'] == 'encyclopedia' ? 'link_active' : '' ?>">Encyclopedie</a>
            </li>
            <?php
            if (isset($_SESSION['identifiant_utilisateur'])) {
                ?>
                <li class="liste"><a href="index.php?module=scores&action=main_scores"
                                     class="<?php echo isset($_GET['module']) && $_GET['module'] == 'scores' ? 'link_active' : '' ?>">Scores</a>
                </li>
                <?php
                echo ' <li class="liste"><a href="#">Mes items</a></li>';
                echo ' <li class="liste"><a href="index.php?module=amis&action=mes_amis">Amis</a></li>';
                ?>
                <li class="liste"><a href="index.php?module=profile&action=main_profile"
                                     class="<?php echo isset($_GET['module']) && $_GET['module'] == 'profile' ? 'link_active' : '' ?>">Mon
                        profil</a>
                </li>
                <?php
                echo ' </ul> ';
                echo '<form method="post" class="right">';
                ?>
                <button type="submit" name="logout" class="button_déconnexion">Déconnexion</button>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>

                <?php
                echo '</form>';
                echo ' <div id="onglet_connexion" style ="display:none;">
                        <a href="#" class="open-modal" onclick="openModalConnexion()">Se connecter</a>
                    </div>';
            } else {
            ?>
        </ul>
        <div class="right" id="onglet_connexion">
            <div class="hamburger-menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>

            <a href="#" class="open-modal" onclick="openModalConnexion()"><img src="../assets/connexion-logo.svg"
                                                                               alt="Connexion">Se connecter</a>
        </div>
        <?php

        echo ' ';
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
                    <input class="modal_form" name='login' type='text' maxlength='20' placeholder='nom utilisateur'
                           required />
                    <input class="modal_form" name='password' type='password' placeholder='mot de passe' /></p>
                    <a class="titleMod" id="link_mdp" href='#'>Mot de passe oublié ?</a>
                    <div class="connexion">
                        <button class="buttonSubmit" type='submit' name='submit'>Se connecter</button>
                </form>
                <div class="right">
                    <a href='#' class="open-modal" onclick="openModalInscription()">S'inscrire</a>
                </div>
            </div>
            <span class="close" onclick="closeModalConnexion()">&times;</span>
            <!-- Contenu du modal -->
        </div>
        </div>

        <div id="Modal_inscription" class="modal">
            <div id="modInscriptions" class="modal-content"
                 style="display: flex; align-items: center; justify-content: center; background-color: #000; height: 50%; width: 40%;">
                <h1 class="titleMod">S'inscrire</h1>
                <form action='index.php?module=connexion&action=inscription' method='post'>
                    <input name='login' type='text' maxlength='20' placeholder='nom utilisateur' required />
                    <input name='password' type='password' placeholder='mot de passe' /></p>
                    <div class="connexion">
                        <button class="buttonSubmit" type='submit' name='submit'>S'inscrire</button>
                </form>
            </div>
            <span class="close" onclick="closeModalInscription()">&times;</span>
            <!-- Contenu du modal -->
        </div>


        <div id="onglet_connexion" class="right">
            <a href="#" class="open-modal" onclick="openModalConnexion()"><img src="../assets/connexion-logo.svg"
                                                                               alt="Connexion">Se connecter</a>


            <div id="onglet_connexion" class="right">
                <a href="#" class="open-modal" onclick="openModalConnexion()"><img src="../assets/connexion-logo.svg"
                                                                                   alt="Connexion">Se connecter</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"
        integrity="sha512-EZI2cBcGPnmR89wTgVnN3602Yyi7muWo8y1B3a8WmIv1J9tYG+udH4LvmYjLiGp37yHB7FfaPBo8ly178m9g4Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="../js/animations.js"></script>
<script src="../js/navbar.js"></script>
</html>