<?php

class VueShop extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function acheter(){
        ?>
            <div class="shop_acheter">
                <h1> Vous avez acheté l'item <h2>
            </div>
        <?php
    }

    public function welcome()
    {
        ?>
        <div class="page">
            <h1 class="title"> ACHETEZ VOS SKINS ICI ! </h1>
            <section id="fond">
                <section id="interieur">


                    <section id="param">
                        <div class="cliquable">
                            <button id="filtrer" class="boutonParam"> Filtrer</button>
                            <p class="text">|</p>
                            <button id="trier" class="boutonParam">Trier</button>
                        </div>
                        <div id="checkboxes">
                            <input type="checkbox" id="hommeCheckbox" class="filterCheckbox" data-target="homme" checked>
                            <label for="hommeCheckbox">Homme</label>
                            <br>
                            <input type="checkbox" id="femmeCheckbox" class="filterCheckbox" data-target="femme" checked>
                            <label for="femmeCheckbox">Femme</label>
                        </div>

                        <div id="triOptions">
                            <input type="radio" id="croissant" name="tri" value="croissant">
                            <label for="croissant">Croissant</label><br>
                            <input type="radio" id="decroissant" name="tri" value="decroissant">
                            <label for="decroissant">Décroissant</label><br>
                            <input type="radio" id="az" name="tri" value="az">
                            <label for="az">A-Z</label><br>
                            <input type="radio" id="za" name="tri" value="za">
                            <label for="za">Z-A</label><br>
                        </div>
                    </section>


                    <section id="shop">
                        <div class="itemCard homme">
                            <img src="../../../images/shop/luffyDEV.gif">
                            <div class="menu">
                                TODO recuperer le prix dans la bd et juste l'afficher ici pour chaque item
                                <a href="index.php?module=shop&action=acheter&id_item=1"> ACHETER </a>
                            </div>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/zoroDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=2"> ACHETER </a>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/sanjiDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=3"> ACHETER </a>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/jimbeDev.webp">
                            <a href="index.php?module=shop&action=acheter&id_item=4"> ACHETER </a>
                        </div>
                        <div class="itemCard femme">
                            <img src="../../../images/shop/namiDev.webp">
                            <a href="index.php?module=shop&action=acheter&id_item=5"> ACHETER </a>
                        </div>
                        <div class="itemCard femme">
                            <img src="../../../images/shop/robinDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=6"> ACHETER </a>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/usoppDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=7"> ACHETER </a>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/frankyDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=8"> ACHETER  </a>
                        </div>

                    </section>
                </section>
            </section>
        </div>

        <script>
            // Sélection du bouton "Filtrer"
            var filtrerBtn = document.getElementById("filtrer");

            // Sélection de la section contenant les cases à cocher
            var checkboxesSection = document.getElementById("checkboxes");

            // Ajout d'un écouteur d'événements pour le clic sur le bouton "Filtrer"
            filtrerBtn.addEventListener("click", function() {
                // Afficher ou masquer les cases à cocher en fonction de leur état actuel
                if (checkboxesSection.style.display === "none") {
                    checkboxesSection.style.display = "block";
                } else {
                    checkboxesSection.style.display = "none";
                }
            });

            // Gestion des checkbox du filtre

            document.addEventListener("DOMContentLoaded", function() {
                var hommeCheckbox = document.getElementById("hommeCheckbox");
                var femmeCheckbox = document.getElementById("femmeCheckbox");

                var filterCheckboxes = document.querySelectorAll(".filterCheckbox");

                // Ajout d'un écouteur d'événements pour chaque case à cocher de filtre
                filterCheckboxes.forEach(function(checkbox) {
                    checkbox.addEventListener("change", function() {
                        filterCards();
                    });
                });

                // Fonction pour filtrer les cartes
                function filterCards() {
                    var hommeChecked = hommeCheckbox.checked;
                    var femmeChecked = femmeCheckbox.checked;

                    var cards = document.querySelectorAll(".itemCard");

                    cards.forEach(function(card) {
                        var isHomme = card.classList.contains("homme");
                        var isFemme = card.classList.contains("femme");

                        if ((hommeChecked && isHomme) || (femmeChecked && isFemme)) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    });
                }
            });

            // Gestion des tris des skins
            document.addEventListener("DOMContentLoaded", function() {
                var trierBtn = document.getElementById("trier");
                var triOptions = document.getElementById("triOptions");

                trierBtn.addEventListener("click", function() {
                    if (triOptions.style.display === "none") {
                        triOptions.style.display = "block";
                    } else {
                        triOptions.style.display = "none";
                    }
                });
            });

            // affichage des menus
            document.addEventListener("DOMContentLoaded", function() {
                var hommeCheckbox = document.getElementById("hommeCheckbox");
                var femmeCheckbox = document.getElementById("femmeCheckbox");

                var filterCheckboxes = document.querySelectorAll(".filterCheckbox");

                // Ajout d'un écouteur d'événements pour chaque case à cocher de filtre
                filterCheckboxes.forEach(function(checkbox) {
                    checkbox.addEventListener("change", function() {
                        filterCards();
                    });
                });

                // Fonction pour filtrer les cartes
                function filterCards() {
                    var hommeChecked = hommeCheckbox.checked;
                    var femmeChecked = femmeCheckbox.checked;

                    var cards = document.querySelectorAll(".itemCard");

                    cards.forEach(function(card) {
                        var isHomme = card.classList.contains("homme");
                        var isFemme = card.classList.contains("femme");

                        if ((hommeChecked && isHomme) || (femmeChecked && isFemme)) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    });
                }
            });

        </script>
        <!--
        <div class="page">
            <h1 class="title"> ACHETEZ VOS SKINS ICI ! </h1>
            <section id="fond">
                <section id="interieur">


                    <section id="param">
                        <div class="cliquable">
                            <button id="filtrer" class="boutonParam"> Filtrer</button>
                            <p class="text">|</p>
                            <button id="trier" class="boutonParam">Trier</button>
                        </div>
                        <div id="checkboxes">
                            <input type="checkbox" id="hommeCheckbox" class="filterCheckbox" data-target="homme" checked>
                            <label for="hommeCheckbox">Homme</label>
                            <br>
                            <input type="checkbox" id="femmeCheckbox" class="filterCheckbox" data-target="femme" checked>
                            <label for="femmeCheckbox">Femme</label>
                        </div>

                        <div id="triOptions">
                            <input type="radio" id="croissant" name="tri" value="croissant">
                            <label for="croissant">Croissant</label><br>
                            <input type="radio" id="decroissant" name="tri" value="decroissant">
                            <label for="decroissant">Décroissant</label><br>
                            <input type="radio" id="az" name="tri" value="az">
                            <label for="az">A-Z</label><br>
                            <input type="radio" id="za" name="tri" value="za">
                            <label for="za">Z-A</label><br>
                        </div>
                    </section>


                    <section id="shop">
                        <div class="itemCard homme">
                            <img src="../../../images/shop/luffyDEV.gif">
                            <div class="menu">
                                TODO recuperer le prix dans la bd et juste l'afficher ici pour chaque item
                                <a href="index.php?module=shop&action=acheter&id_item=1"> ACHETER </a>
                            </div>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/zoroDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=2"> ACHETER </a>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/sanjiDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=3"> ACHETER </a>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/jimbeDev.webp">
                            <a href="index.php?module=shop&action=acheter&id_item=4"> ACHETER </a>
                        </div>
                        <div class="itemCard femme">
                            <img src="../../../images/shop/namiDev.webp">
                            <a href="index.php?module=shop&action=acheter&id_item=5"> ACHETER </a>
                        </div>
                        <div class="itemCard femme">
                            <img src="../../../images/shop/robinDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=6"> ACHETER </a>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/usoppDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=7"> ACHETER </a>
                        </div>
                        <div class="itemCard homme">
                            <img src="../../../images/shop/frankyDev.gif">
                            <a href="index.php?module=shop&action=acheter&id_item=8"> ACHETER  </a>
                        </div>

                    </section>
                </section>
            </section>
        </div>

        <script>
            // Sélection du bouton "Filtrer"
            var filtrerBtn = document.getElementById("filtrer");

            // Sélection de la section contenant les cases à cocher
            var checkboxesSection = document.getElementById("checkboxes");

            // Ajout d'un écouteur d'événements pour le clic sur le bouton "Filtrer"
            filtrerBtn.addEventListener("click", function() {
                // Afficher ou masquer les cases à cocher en fonction de leur état actuel
                if (checkboxesSection.style.display === "none") {
                    checkboxesSection.style.display = "block";
                } else {
                    checkboxesSection.style.display = "none";
                }
            });

            // Gestion des checkbox du filtre

            document.addEventListener("DOMContentLoaded", function() {
                var hommeCheckbox = document.getElementById("hommeCheckbox");
                var femmeCheckbox = document.getElementById("femmeCheckbox");

                var filterCheckboxes = document.querySelectorAll(".filterCheckbox");

                // Ajout d'un écouteur d'événements pour chaque case à cocher de filtre
                filterCheckboxes.forEach(function(checkbox) {
                    checkbox.addEventListener("change", function() {
                        filterCards();
                    });
                });

                // Fonction pour filtrer les cartes
                function filterCards() {
                    var hommeChecked = hommeCheckbox.checked;
                    var femmeChecked = femmeCheckbox.checked;

                    var cards = document.querySelectorAll(".itemCard");

                    cards.forEach(function(card) {
                        var isHomme = card.classList.contains("homme");
                        var isFemme = card.classList.contains("femme");

                        if ((hommeChecked && isHomme) || (femmeChecked && isFemme)) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    });
                }
            });

            // Gestion des tris des skins
            document.addEventListener("DOMContentLoaded", function() {
                var trierBtn = document.getElementById("trier");
                var triOptions = document.getElementById("triOptions");

                trierBtn.addEventListener("click", function() {
                    if (triOptions.style.display === "none") {
                        triOptions.style.display = "block";
                    } else {
                        triOptions.style.display = "none";
                    }
                });
            });

            // affichage des menus
            document.addEventListener("DOMContentLoaded", function() {
                var hommeCheckbox = document.getElementById("hommeCheckbox");
                var femmeCheckbox = document.getElementById("femmeCheckbox");

                var filterCheckboxes = document.querySelectorAll(".filterCheckbox");

                // Ajout d'un écouteur d'événements pour chaque case à cocher de filtre
                filterCheckboxes.forEach(function(checkbox) {
                    checkbox.addEventListener("change", function() {
                        filterCards();
                    });
                });

                // Fonction pour filtrer les cartes
                function filterCards() {
                    var hommeChecked = hommeCheckbox.checked;
                    var femmeChecked = femmeCheckbox.checked;

                    var cards = document.querySelectorAll(".itemCard");

                    cards.forEach(function(card) {
                        var isHomme = card.classList.contains("homme");
                        var isFemme = card.classList.contains("femme");

                        if ((hommeChecked && isHomme) || (femmeChecked && isFemme)) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    });
                }
            });

        </script>

        -->
        <?php
    }
}