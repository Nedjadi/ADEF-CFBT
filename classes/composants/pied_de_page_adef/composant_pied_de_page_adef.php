<?php

class composant_pied_de_page_adef extends composant {
	
	/*function __construct(argument) {
		# code...
	} // Fin constructeur*/

	public function afficher() {
		$this->afficher_debut_footer();
		$this->afficher_logos();
		$this->afficher_fin_footer();
	}

	// Autres Méthodes, caractéristiques de la classe
	private function afficher_debut_footer() {
		echo <<<CODEHTML
		<hr>
		<footer class="row">
		  	<div class="col-md-12">
		  		<div class="row">
			  		<div class="col-lg-2 col-xs-6">
			  			<p>&copy; 2015-2016 ADEF</p>
			  			<p><a href="http://www.adef-asso.com/adef/mentions.php">Mentions légales</a></p>
			  		</div>
CODEHTML;
	}

	private function afficher_logos() {
		echo <<<CODEHTML
					<div class="col-lg-2 col-xs-6">
		  				<a href="http://www.cfbt-asso.com" class="thumbnail" target="_blank">
		  				<img class="img-responsive" src="img/logocfbt.png" alt="logo cfbt"></a>
		  			</div>
					<div class="col-lg-2 col-xs-6 thumbnail">
		  				<img class="img-responsive" src="img/logoceram4.png" alt="école céramique de provence">
		  			</div>
		  			<div class="clearfix visible-md"></div>
		  			<div class="col-lg-2 col-xs-6">
		  				<a href="http://www.esea-avignon.com/" class="thumbnail" target="_blank"><img class="img-responsive" src="img/logoesea.jpg" alt="école supérieure d'ébénisterie d'Avignon"></a>
		  			</div>
					<div class="clearfix visible-sm"></div>
		  			<div class="col-lg-2 col-xs-6 thumbnail">
		  				<img class="img-responsive" src="img/logo-reseau.jpg" alt="logo réseau">
		  			</div>
  					<div class="col-lg-2 col-xs-6">
		  				<p>Partenaires</p>
		  				<p><img class="img-responsive" src="img/logopacafsev.png" alt="logo paca fsev"></p>
		  			</div>
CODEHTML;
	}

	private function afficher_fin_footer() {
		echo <<<CODEHTML
					</div>		  			
		  		</div>
		  	</footer>
		</div>
CODEHTML;
	}
} // Fin classe composant pied_de_page