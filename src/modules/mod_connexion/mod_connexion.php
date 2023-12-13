<?php

if (!defined('MY_APP')) {
    die("Accès interdit");
}

require_once 'module/mod_connexion/cont_connexion.php';

class ModConnexion extends ModuleGenerique{


	
	public function __construct () {
		parent::__construct();
		$this->controleur = new ContConnexion();
	}

}
?>