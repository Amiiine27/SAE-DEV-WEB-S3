<?php

class VueScores extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mainScores($arrayScores, $arrayMaps)
    {
        ?>
        <div class="scores">
            <h1>Vos scores</h1>
            <?php if (empty($arrayScores)) { ?>
                <p class="score_none_games">Vous n'avez pas encore joué à une partie</p>
                <?php
            } else {
                foreach ($arrayScores as $score) {
                    $mapName = "";
                    foreach ($arrayMaps as $map) {
                        if ($score['idMap'] == $map['id']) {
                            $mapName = $map['name'];
                        }
                    }
                    echo $arrayMaps[0]['id'];
                    ?>
                    <div class="score_item">
                        <img src="../assets/anchor_left.png" alt="Anchor">
                        <p class="score_id"><?= $score['idPartie'] ?></p>
                        <div>
                            <p><strong><?php
                                    if ($score['victoire'] == 1) {
                                        echo "Victoire";
                                    } else {
                                        echo "Défaite";
                                    }
                                    ?></strong></p>
                            <p>Nombre de vagues : <strong><?= $score['vagues'] ?></strong></p>
                            <p>Score : <strong><?= $score['score'] ?></strong></p>
                        </div>
                        <div>
                            <p>Argent gagné : <strong><?= $score['moneyWon'] ?></strong></p>
                            <p>Map : <strong><?= $mapName ?></strong></p>
                            <p>Ennemis tué : <strong><?= $score['ennemis_tue'] ?></strong></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <?php
    }
}