<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/utilities.css">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">    <title>Document</title>
</head>

<body>
    <header class="entete bg-color">
        <nav class="navbar">
            <a class="left" href="index.php"><img src="../images/logo.png" alt="Logo du site web"></a>
            <ul class="mid">
                <li class="liste"><a href="#">Accueil</a></li>
                <li class="liste"><a href="#">Map</a></li>
                <li class="liste"><a href="#">Shop</a></li>
                <li class="liste"><a href="#">Equipage</a></li>
                <li class="liste"><a href="#">Encyclopédie</a></li>
                <li class="liste"><a href="#">Accueil</a></li>
            </ul>
            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <!-- Contenu du modal -->
                    <h1>Connexion</h1>
                </div>
            </div>
            
            <!-- Balise "Se connecter" -->
            <div class="right">
                <a href="#" class="open-modal"><img src="../images/connexion-logo.svg" alt="Connexion">Se connecter</a>
            </div>
        </nav>
    </header>


    <footer>
        <p>© 2023 Red Line Defense, Inc. Tous droits réservés.</p>
    </footer>
</body>

<script>
    // Fonction pour afficher le modal
    function openModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    // Fonction pour fermer le modal
    function closeModal() {
        var modal = document.getElementById("myModal");
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

</html>