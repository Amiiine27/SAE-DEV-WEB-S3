<?php

class VueItems extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function welcome()
    {
        ?>
        <div class="page">
            <h1 class="title"> RETROUVEZ VOS ITEMS ICI ! </h1>
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
                            <input type="radio" id="az" name="tri" value="az" checked>
                            <label for="az">A-Z</label><br>
                            <input type="radio" id="za" name="tri" value="za">
                            <label for="za">Z-A</label><br>
                        </div>
                    </section>


                    <section id="items">
                        <div class="itemCardLoot homme">
                            <img src="../../../images/shop/luffyDEV.gif">
                            <div class="menu">
                                <!-- TODO recuperer le nom dans la bd et juste l'afficher ici pour chaque item-->
                                <p> Luffy </p>
                            </div>
                        </div>
                        <div class="itemCardLoot homme">
                            <img src="../../../images/shop/zoroDev.gif">
                            <p> Zoro </p>
                        </div>
                        <div class="itemCardLoot homme">
                            <img src="../../../images/shop/sanjiDev.gif">
                            <p> Sanji </p>
                        </div>
                        <div class="itemCardLoot homme">
                            <img src="../../../images/shop/jimbeDev.webp">
                            <p> Jimbe </p>
                        </div>
                        <div class="itemCardLoot femme">
                            <img src="../../../images/shop/namiDev.webp">
                            <p> Nami </p>
                        </div>
                        <div class="itemCardLoot femme">
                            <img src="../../../images/shop/robinDev.gif">
                            <p> Robin </p>
                        </div>
                        <div class="itemCardLoot homme">
                            <img src="../../../images/shop/usoppDev.gif">
                            <p> Usopp </p>
                        </div>
                        <div class="itemCardLoot homme">
                            <img src="../../../images/shop/frankyDev.gif">
                            <p> Franky </p>
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

                    var cards = document.querySelectorAll(".itemCardLoot");

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

                var filterCheckboxes = document.querySelectorAll(".filterCheckboxLoot");

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

                    var cards = document.querySelectorAll(".itemCardLoot");

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
        <?php
    }
}