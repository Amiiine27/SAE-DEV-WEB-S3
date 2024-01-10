<?php


require_once 'vue_generique.php';

class VueConnexion extends VueGenerique{
    
        public function __construct(){
            parent::__construct();
        }

        
        public function connexion(){
            ?>
            <div class="connexion">
                <h1>Connexion</h1>
            <div>
                <form action='index.php?module=connexion&action=connexion' method='post'>
                    <div>
                    <input name='login' type='text' maxlength='20' placeholder='nom utilisateur' required/>
                    <input name='password' type='password' placeholder='mot de passe'/></p>
                    </div>
                    <a href='#'>Mot de passe oublié</a>
                    <button type='submit' name='submit'>Se connecter</button>
                    <a href='#'>S'inscrire</a>
                </form>
                </div> 
            </div>

            <?php
        }

        public function inscriptions(){
            ?>
            <div class="connexion">
                <h1>Inscription</h1>
                <div>
                    <form action='index.php?module=connexion&action=inscription' method='post'>
                        <input name='login' type='text' maxlength='20' placeholder='nom utilisateur' required/>
                        <input name='password' type='password' placeholder='mot de passe'/></p>
                        <button type='submit' name='submit'>S'inscrire</button>
                    </form>
                </div> 
            </div>

            <?php
        }

    }


?>
          