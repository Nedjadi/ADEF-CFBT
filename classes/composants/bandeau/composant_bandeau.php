<?php

class composant_bandeau extends composant {
	
	// Attributs
	private $titre_actu;
	private $image_actu;
	private $texte_actu;

	/*function __construct(argument) {
		$this->ecrire_css_additionnel("style_bandeau.css");
	}*/

	public function afficher() {
		$this->afficher_titre_section();
		$this->afficher_contenu_section();
		$this->afficher_fin_section();
	}

	private function afficher_titre_section() {
		echo '<main class="row actu">
			  	<h2 class="titre-rubrique"><i class="fa fa-newspaper-o"></i> Actualités</h2>';
	}

	private function afficher_contenu_section() {
		$liste_news = db_table_news_adef::Liste_id_news_adef();
		$nb_actu = count($liste_news);
		switch ($nb_actu) {
			case 1:
				$classe = "col-lg-8 col-md-12 col-sm-12";
				break;
			case 2:
				$classe = "col-lg-6 col-md-12 col-sm-12";
				break;
			case 3:
				$classe = "col-lg-4 col-md-4 col-sm-12";
				break;
			case 4:
				$classe = "col-lg-3 col-md-6 col-sm-6";
				break;
		}
		foreach ($liste_news as $id_news) {
			$actu = db_table_news_adef::Construire($id_news);
			$titre_actu = $actu->lire_titre_adef_n();
			$image_actu = $actu->lire_foto_adef_n();
			$alt_image = $actu->lire_alt_foto_n();
			$texte_actu = $actu->lire_text_adef_n();
		echo '<article class="'. $classe .'">
			  		<h3><i class="fa fa-comments"></i> '. $titre_actu .'</h3>
			  		<img class="img-responsive" src="img/'. $image_actu .'" alt="'. $alt_image .'">
			  		<p>'. $texte_actu .'</p>
			  	</article>';
		}
		
	}

	private function afficher_fin_section() {
		echo '</main>';
	}
} // Fin class composant_bandeau

/*<main class="row actu">
			  	<h2 class="titre-rubrique"><i class="fa fa-newspaper-o"></i> Actualités</h2>
			  	<article class="col-lg-3 col-md-6 col-sm-6">
			  		<h3><i class="fa fa-comments"></i> Salon de l'apprentissage et de l'alternance</h3>
			  		<img class="img-responsive" src="../img/salon-apprentissage-4-et-5-mars.jpg" alt="salon de l'apprentissage">
			  		<p>Nous y serons... et nous vous y attendons !</p>
			  	</article>
			  	<article class="col-lg-3 col-md-6 col-sm-6">
			  		<h3><i class="fa fa-comments"></i> Journées portes ouvertes à l'ADEF-CFBT</h3>
			  		<img class="img-responsive" src="../img/jpo-tag-cloud-2015.png" alt="journées portes ouvertes">
			  		<p>Les 16 et 23 mars 2016</p>
			  		<p><a href="#">Plus d'informations sur le site du CFBT</a></p>
			  	</article>
			  	<div class="clearfix visible-md visible-sm"></div>
			  	<article class="col-lg-3 col-md-6 col-sm-6">
			  		<h3><i class="fa fa-comments"></i> Interview d'une formatrice</h3>
			  		<img class="img-responsive" src="../img/interview-marie-ange-del-bano.jpg" alt="photo d'une formatrice">
			  		<p>Marie-Ange Del Bano, formatrice responsable du dispositif BTS Prothésiste dentaire, interviewée dans la revue Inffo formation</p>
			  		<p><a href="#">Découvrez l'article complet</a></p>
			  	</article>
			  	<article class="col-lg-3 col-md-6 col-sm-6">
			  		<h3><i class="fa fa-comments"></i> Association des apprenants</h3>
			  		<img class="img-responsive" src="../img/affiche-association-apprenants.jpg" alt="association des apprenants">
			  		<p>L'association des apprenants de l'ADEF-CFBT a démarré officiellement le 11 septembre 2015.</p>
			  		<p>Rejoignez-nous !</p>
			  		<p>Contact : contact5ac@yahoo.fr</p>
			  	</article>
		  	</main>*/
