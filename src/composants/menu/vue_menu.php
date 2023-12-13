<?php
class VueCompMenu extends VueCompGenerique {

	public function __construct(){
		$this->affichage .= '<ul><li><a href="index.php?module=joueurs">Liste des joueurs</a></li>';
		$this->affichage .= '<li><a href="index.php?module=equipes">Liste des équipes</a></li>';
		if (isset($_SESSION['login'])) {
			$this->affichage .= '<li><a href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>';
		}
		else {
			$this->affichage .= '<li><a href="index.php?module=connexion&action=form_connexion">Connexion</a></li>';
		}
		$this->affichage .= "</ul>";

	}	


}
