<?php

if (!defined('MY_APP')) {
    die("Accès interdit");
}

require_once 'vue_generique.php';
class VueConnexion extends VueGenerique{
    
        public function __construct(){
            parent::__construct();
        }

    public function formConnexion(){
?>
        <h1>Connexion</h1>
            <form action="index.php?module=mod_connexion&action=inscription" method="post">
            <label>Nom d'utilisateur</label>
            <input name="login" type="text" maxlength="20" required/>

            <div>
                <label> Mot de passe</label>
                <input name="password" type="password"/></p>
            </div>
    
            <button type="submit" name="submit">S inscrire</button>
         </form>
<?php
        }

        public function formInscription(){
            ?>
                    <h1>S'inscrire</h1>
                        <form action="index.php?module=mod_connexion&action=inscription" method="post">
                        <label>Nom d'utilisateur</label>
                        <input name="login" type="text" maxlength="20" required/>
            
                        <div>
                            <label> Mot de passe</label>
                            <input name="password" type="password"/></p>
                        </div>
                
                        <button type="submit" name="submit">S inscrire</button>
                     </form>
            <?php
                    }
}

          