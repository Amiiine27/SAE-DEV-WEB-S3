<?php

class VueApropos extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function affiche()
    {
        ?>
        <div class="propos">
        <h1>A PROPOS</h1>
            <div class="propos_para">
                
                <div >
                    <h2 >// L'Histoire de RED LINE DEFENSE</h2>
                    <p>Bienvenue à bord de RED LINE DEFENSE - La bataille ultime pour la Grand Line !

                        Plongez au cœur de l'univers épique de One Piece avec RED LINE DEFENSE, 
                        le tout nouveau jeu de tower defense qui vous transporte dans un monde de pirates, 
                        de mystères et d'aventures sans fin.
                    </p>
                </div>
                <p>Explorez des îles emblématiques de l'univers One Piece tout en planifiant votre stratégie de défense. 
                    Chaque île présente des défis uniques, des environnements dynamiques et des secrets à découvrir.
                Affrontez une variété d'ennemis, des simples Marines aux redoutables Capitaines corsaires. 
                    Chaque vague d'attaquants représente un défi unique, testant votre stratégie et votre maîtrise tactique.
                </p>

                <p>
                Préparez-vous à hisser les voiles, à combattre pour la liberté et à défendre la Grand Line comme jamais 
                auparavant dans RED LINE DEFENSE ! 
                La bataille pour le trésor ultime commence maintenant. Êtes-vous prêt à prendre le gouvernail de votre destinée pirate ?
                </p>

                <h2>// L'Equipe</h2>

                <p>
                    Ce jeux vous est presenté par des étudiants en deuxième année de BUT Informatique à l'Iut de Montreuil.
                    Ces jeunes développeurs sont en apprentissage et ont réalisé ce projet à l'issue d'une Sae.

                </p>
            </div>
        </div>
        <?php
    }
}