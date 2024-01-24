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
                            <input class="buttonEquipage" type="button"  value="Créer Equipage" />
                        </a> 
                        <a href="index.php?module=equipage&action=liste">
                        <input class="buttonEquipage" type="button" value="Rejoindre Equipage" />
                        </a> 
                    </div>
                    <div class="img">
                        <img src="../images/equipage-removebg-preview" alt="Image Equipage">
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
            
            <form action="index.php?module=equipage&action=ajoutBD" method="post" class="form-equipage" enctype="multipart/form-data">

                <div class="champs">
                    <div>
                    <label for="name">Nom </label>
                    </div>

                    <div>
                    <input type="text" name="nom"  id="nom" size="60" style= 'height:45px' required />
                    </div>
                </div>

                <div class="champs">
                    <div>
                        <label for="name">Devise </label>
                    </div>
                    <div>
                        <input type="text" name="devise"  id="devise"  size="60" style= 'height:45px' required />
                    </div>
                </div>

                <div class="champs">
                    <div>
                        <label for="description">Description </label>
                    </div>
                    <div>
                        <input type="text" name="description" id="description" size="60" style= 'height:270px'required />
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
                    
                    padding: 10px;"/>
            
            </form>
        </div>
         


        <?php
    }


    public function creationOk()
    {
        ?>
        <div class="equipage">
            <h2>Création réalisée !</h2>
        </div>
        <?php
    }


    public function equipage_rejoindre($array){
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
                        <img src="./<?echo $valeur['embleme_clan'] ?>" alt="logo" />                   
                    </div>

        
                    <div class="rejoindre">
                            <button class="btn_rejoindre">REJOINDRE</button>
                    </div>
                </div>
                <?php
            }
            ?>
            
        </div>
        <?php
    }
}