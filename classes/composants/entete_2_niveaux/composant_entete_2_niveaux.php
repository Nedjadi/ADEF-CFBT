<?php

class composant_entete_2_niveaux extends composant {
	
	// Attributs
	private $_menuFormation;
	/*private $_nomPole;
	private $_nomFiliere;
	private $_url;*/

	function __construct($menuFormation) {
		$this->_menuFormation = $menuFormation;
		/*$this->_nomPole = $nomPole;
		$this->_nomFiliere = $nomFiliere;
		$this->_url = $url;*/
	}

	public function afficher() {
		$this->afficher_haut();
		$this->afficher_logo();
		$this->afficher_titre();
		$this->afficher_menu_formation();
		$this->afficher_bas();		
	}

	// Autres méthodes caractéristiques de la classe
	private function afficher_haut() {
			echo ('<header class="page-header row">');
	}

	private function afficher_logo() {
		$alt = (is_adef())?"ADEF":"CFBT";
		echo ('<div class="col-md-2 col-xs-4">
			  		<a href="index.php"><img class="img-responsive" src="img/logo.jpg" alt="logo '.$alt.'"></a>
			  	</div>');
	}

	private function afficher_titre() {
		$titre = (is_adef())?"Association Départementale d'&Eacute;tudes et de Formation":"Centre de Formation de la Bourse du Travail";
		echo '<div class="col-md-10 col-xs-12">
			  		<h1 class="titre-rubrique">'. $titre .'</h1>
			  		<address>
			  			<p><i class="fa fa-map-marker"></i> 15 rue des convalescents 13001 Marseille<br>
			  			Tél. : 04.91.90.78.53 - Fax : 04.91.56.14.21</p>
			  		</address>
			  	</div>';
	}

	public function ajouter_filiere($nom_pole, $id_filiere, $nom_filiere, $url) {
		$this->liste_poles[$nom_pole][] = array("id" => $id_filiere, "nom" => $nom_filiere, "url" => $url);
	}

	private function afficher_menu_formation() {
		echo '<nav class="navbar navbar-default col-md-12 col-xs-12 menu-formation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#studies">
	        					<span class="icon-bar"></span>
	        					<span class="icon-bar"></span>
	        					<span class="icon-bar"></span> 
	      					</button>
	      					<span class="navbar-brand"><i class="fa fa-graduation-cap"></i> Nos Formations</span>
	    				</div>
	    			</div>
	    			<div class="collapse navbar-collapse" id="studies">
					    <ul class="nav navbar-nav">';
		
		foreach($this->liste_poles as $nom_pole => $liste_filieres) {
		echo '<li class="dropdown"><a class="dropdown-toggle specialite" data-toggle="dropdown" href="#">'. $nom_pole .'<span class="caret"></span></a>
		      	<ul class="dropdown-menu">';
		    foreach($liste_filieres as $filiere) {
		    	echo
		      		'<li><a href="'. $filiere["url"] .'.php">'. $filiere["nom"] .'</a></li>';
		      	}
		      	echo 
		      	'</ul>	
	        </li>';
	    	
	    }
	}

	private function afficher_bas() {
			echo '    	</ul>
					</div>
				</nav>
			</header>';
	}
} // Fin classe composant_entete