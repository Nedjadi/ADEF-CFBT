<?php

class composant_navbar extends composant {

	// Attributs
	private $_menu ;

	public function __construct($menu) {
		$this->_menu = $menu;
		$this->ecrire_css_additionnel("style_navbar.css");	
	} // Fin constructeur

	public function afficher() {
		$this->afficher_cadreHaut();
		$this->afficher_bouton();
		$this->afficher_elements();
		$this->afficher_fermetureCadre();
	}

	// Autres Méthodes, caractéristiques de la classe
	private function afficher_cadreHaut() {
		$classe = (is_adef())?"website-menu-adef":"website-menu-cfbt";
		echo(
			'<nav class="navbar navbar-fixed-top website-menu '.$classe.'">
				<div class="container-fluid">'
			);
	}
 	private function afficher_bouton() {
 		echo (
			'<div class="navbar-header">
			    <button type="button" class="navbar-toggle button" data-toggle="collapse" data-target="#myNavbar1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                     
				</button>
				<span class="navbar-brand"><a href="index.php"><i class="fa fa-home"></i> Accueil</a></span>
			</div>'
			);
	}
 	private function afficher_elements() {
 		echo (
			'<div class="collapse navbar-collapse" id="myNavbar1">
				<ul class="nav navbar-nav">'
			);
 		foreach($this->_menu as $label => $sous_menu) {
 			echo ('<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$label.' <span class="caret"></span></a>');
 			echo ('<ul class="dropdown-menu">');
 			foreach($sous_menu as $sous_label => $href) {
 				echo ('<li><a href="'.$href.'">'.$sous_label.'</a></li>');
 			}
  			echo ('</ul>');
 			echo ('</li>');

 		}
 		echo (
 			'	<ul>
 			</div>');
	} 

	private function afficher_fermetureCadre() {
		echo(
			'		</div>
				</div>
			</nav>'
			);
	}

} // Fin class composant_navbar