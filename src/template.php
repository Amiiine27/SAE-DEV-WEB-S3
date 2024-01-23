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
            <li class="liste"><a href="#">Shop</a></li>
            <li class="liste"><a href="#">Equipage</a></li>
            <li class="liste"><a href="index.php?module=encyclopedia&action=main_encyclopedia"
                                 class="<?php echo isset($_GET['module']) && $_GET['module'] == 'encyclopedia' ? 'link_active' : '' ?>">Encyclopedie</a>
            </li>
        </ul>
        <!-- Modal -->
        <div id="Modal_connexion" class="modal">
            <div id="modConnexion" class="modal-content">
                <h1 class="titleMod">Connexion</h1>
                <form action='index.php?module=connexion&action=connexion' method='post'>
                    <input name='login' type='text' maxlength='20' placeholder='nom utilisateur' required />
                    <input name='password' type='password' placeholder='mot de passe' /></p>
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
        </div>


        <!-- Balise "Se connecter" -->
        <div class="right">
            <a href="#" class="open-modal"><img src="../assets/connexion-logo.svg" alt="Connexion">Se connecter</a>

            <div class="hamburger-menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
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
</body>

<script>

    //      // Fonction pour ouvrir la modal et charger le contenu
    //      function openModal(url) {
    //     console.log("ancienne url", url);
    //     var modal = document.getElementById("myModal");
    //     var modalContent = modal.querySelector(".modal-content");

    //     // Extraire les paramètres module et action de l'URL
    //     var urlParts = url.split("?");
    //     if (urlParts.length === 2) {
    //         var params = urlParts[1].split("&");
    //         var module = null;
    //         var action = null;

    //         params.forEach(function(param) {
    //             var keyValue = param.split("=");
    //             if (keyValue.length === 2) {
    //                 if (keyValue[0] === "module") {
    //                     module = keyValue[1];
    //                 } else if (keyValue[0] === "action") {
    //                     action = keyValue[1];
    //                 }
    //             }
    //         });

    //         // Faire une requête AJAX pour récupérer le contenu de la page
    //         var xhr = new XMLHttpRequest();
    //         xhr.onreadystatechange = function() {
    //             if (xhr.readyState == 4 && xhr.status == 200) {
    //                 modalContent.innerHTML = xhr.responseText;
    //                 modal.style.display = "block";
    //             }
    //         };

    //         // Utiliser les paramètres module et action pour former la nouvelle URL
    //         var newUrl = 'index.php?module=' + module + '&action=' + action;
    //         console.log("new Url", newUrl);
    //         xhr.open("GET", newUrl, true);
    //         xhr.send();
    //     }
    // }


    //     function closeModal() {
    //         var modal = document.getElementById("myModal");
    //         modal.style.display = "none";
    //     }

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="../js/animations.js"></script>
<script src="../js/navbar.js"></script>
</html>