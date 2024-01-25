<?php

require_once 'vue_generique.php';
class VueAmis extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

/*
    public function afficheBio(array $array) {
        foreach  ($array as $row) {
            $logo = $row['logo'];
           // $encoded_logo = htmlentities($logo);
            $description = $row['description'];
          //  $encoded_description = htmlentities($description);
            print  $description;
            print "<br>";
            echo "<img src='$logo'  alt='image'/>";
            print "<br>";
        }
    }
    */

    public function detailsAmis($amisArray): void
    {
        ?>
        <div class="amis">
            <div class="container_titre">
                <p class="title_page">Amis</p>
            </div>
            <div class="demandes_amis">
                <button class="button_demandesAmis">MES DEMANDES D'AMIS</button>
            </div>
            <div class="container_subtitle_MesAmis">
                <h3 class="subtitle_mesAmis">Mes amis</h3>
            </div>
                <?php
                foreach ($amisArray as $ami) {
                    foreach ($ami as $id => $infosAmi) {
                        ?>
                        <div class="container_amis" id="ami_<?php echo $infosAmi['idJoueur'] ?? ''; ?>">
                            <div class="profil">
                                <img class="profil_amis" src="../assets/logo.png" alt="Logo du site web">
                            </div>
                        <div class="attribut">
                            <p class="attr_amis"><?php echo $infosAmi['username'] ?? '' ?></p>
                            <p class="attr_amis"><?php echo $infosAmi['money'] ?? '' ?></p>
                        </div>
                        <div class="container_buttonSupp">
                            <form action="index.php?module=amis&action=supprimer_amis" method="post">
                            <input type="hidden" name="ami_id" value="<?php echo $infosAmi['idJoueur'] ?? ''; ?>">
                                <button class="button_supprimerAmis" type="submit" name="submit">Supprimer</button>
                            </form>;
                        </div>
                    </div>
                    <hr class="separate_amis" id="<?php echo $infosAmi['idJoueur'] ?? ''; ?>">
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
    }
    
}
?>