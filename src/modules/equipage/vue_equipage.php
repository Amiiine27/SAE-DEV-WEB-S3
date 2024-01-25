<?php

class VueEquipage extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function equipage_base()
    {
        ?>
        <div class="equipage">
            <h1>CREEZ VOTRE EQUIPAGE DE REVE AVEC VOS AMIS !</h1>
            <div class="equipage_item">
                <h2> ROI DES PIRATES</h2>
                <img src="../images/drapeauOp-removebg-preview-1.png" alt="Image Drapeau Equipage">

            </div>

            <div class="equipage_item">
                <div class="itemRight">
                    <div class="button">
                        <a href="index.php?module=equipage&action=creer">
                            <input class="buttonEquipage" type="button" value="Créer Equipage" />
                        </a>
                        <a href="index.php?module=equipage&action=liste">
                            <input class="buttonEquipage" type="button" value="Rejoindre Equipage" />
                        </a>
                    </div>
                    <div class="img">
                        <img src="../images/equipage-removebg-preview.png" alt="Image Equipage">
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function equipage_creer()
    {
        ?>

        <div class="equipageCreation">
            <div>
                <h1> CRÉEZ VOTRE ÉQUIPAGE !</h1>
            </div>

            <form action="index.php?module=equipage&action=ajoutBD" method="post" class="form-equipage"
                  enctype="multipart/form-data">

                <div class="champs">
                    <div>
                        <label for="name">Nom </label>
                    </div>

                    <div>
                        <input type="text" name="nom" id="nom" size="60" style='height:45px' required />
                    </div>
                </div>

                <div class="champs">
                    <div>
                        <label for="name">Devise </label>
                    </div>
                    <div>
                        <input type="text" name="devise" id="devise" size="60" style='height:45px' required />
                    </div>
                </div>

                <div class="champs">
                    <div>
                        <label for="description">Description </label>
                    </div>
                    <div>
                        <input type="text" name="description" id="description" size="60" style='height:270px'
                               required />
                    </div>
                </div>

                <div class="champs">
                    <label>logo </label>
                    <input name="embleme_clan" type="file" />
                </div>


                <div>
                    <input type="submit" name="submit" value="Création" style="font-size: 20px;
                    background-color: var(--yellow);
                    text-align: center;
                    font-family: 'Krona One', sans-serif;
                    color: var(--primary-color);
                    
                    padding: 10px;" />

            </form>
        </div>


        <?php
    }

    public function quitOk()
    {
        ?>
        <div class="equipage">
            <h2>Vous n'avez maintenant plus d'équipage...</h2>
            <div class="button">
                        <a href="index.php?module=equipage&action=creer">
                            <input class="buttonEquipage" type="button"  value="Créer Equipage" />
                        </a> 
                        <a href="index.php?module=equipage&action=liste">
                        <input class="buttonEquipage" type="button" value="Rejoindre Equipage" />
                        </a> 
                    </div>
        </div>
        <?php
        
    }


    public function creationOk()
    {
        ?>
        <div class="equipage">
            <h2>Création réalisée !</h2>
            <a href="index.php?module=equipage&action=equipage">
                <input class="buttonEquipage" type="button"  value="Voir la page del' Equipage" />
            </a> 
        </div>
        <?php
        
    }
    public function joinOk()
    {
        ?>
        <div class="equipage">
            <h2>Vous faites maintenant parti de cet Equipage !</h2>
            <a href="index.php?module=equipage&action=equipage">
                <input class="buttonEquipage" type="button"  value="Voir la page del' Equipage" />
            </a> 
        </div>
        <?php
        
                
    }


    public function equipage_rejoindre($array)
    {
        ?>
        <div class="equipage">
            <h1> REJOINGEZ UN ÉQUIPAGE !</h1>

            <?php
            
            foreach($array as $cle => $valeur) {
                
                ?>
                <div class="affiche_clan">

                    <h2><?php echo $valeur['nom'] ?? '' ?></h2>
                    <p><?php echo $valeur['devise'] ?? '' ?><p>

                    <div>
                        <img src="../images/clan/<?php echo $valeur['embleme_clan'] ?>" alt="logo" />
                    </div>

        
                    
                    <div class="Quitter">
                        
                        <a href="index.php?module=equipage&action=joinclan&id=<?= $valeur['idClan'] ?>">
                            <input class="btn_rejoindre" type="button" name="id"  value="REJOINDRE" />
                        </a> 
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
        <?php
    }

    

    public function myClan($joueur){

        foreach($joueur['clanInfo'] as $cle => $valeur){
            
        ?>
        <div class="equipage">
        <h1><?php echo $valeur['nom'] ?? '' ?></h1>
        <h2 class="deviseClan"><?php echo $valeur['devise'] ?? '' ?><h2>
            <div class="clan_infos">
                    <div class="equipage_item">
                        <h3>Membres</h3>
                        <?php
                        foreach($joueur['membresClan'] as $cle => $membre){
                            ?> 
                            <div class="membre_name">
                                <p><?php echo $membre['username'] ?? '' ?><p>
                                
                            </div>
                                <p><?php echo $membre['money'] ?? '' ?> $<p>
                                <hr />
                            
 
                            <?php
                        }
                        ?>
                    </div>


                    <div class="equipage_item">
                    <?php
                        foreach($joueur['chef'] as $cle => $chef){
                            //var_dump($joueur['chef']);
                            ?> 
                        <img src="./<?echo $valeur['embleme_clan'] ?>" alt="logo" />
                        <hr/>
                        <h4>Chef de Clan :<?php echo $chef['username'] ?? '' ?> </h4>   
                        <?php
                        }
                        ?>                
                    </div>

                    
                    
            </div>
            <a href="index.php?module=equipage&action=quit">
                            <input class="buttonEquipage" type="button"  value="QUITTER ÉQUIPAGE" />
            </a>
            <?php
                    
            ?>
           
        </div>
        
        
        <?php
        }
    }

    


    
}