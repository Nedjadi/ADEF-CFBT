<?php

class page {
	private $nav = null;
	private $liste_composants = array();
	private $titre = null;
	private $description = null;
	
	public function __construct($titre, $description) {
		$this->titre = $titre;
		$this->description = $description;
	}
	
	public function ajouter_nav($composant) {
		$this->nav = $composant;
	}
	
	public function ajouter_composant($composant) {
		$this->liste_composants[] = $composant;
	}

	public function afficher() {
		printf("<html>\n");
		$this->afficher_head();
		$this->afficher_body();
		printf("</html>\n");
	}
	
	private function afficher_head() {
		printf("<head>\n");
		printf("<meta charset=\"utf-8\">\n");
		printf("<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n");
		printf("<link rel=\"stylesheet\" href=\"tiers/bootstrap/css/bootstrap.min.css\">\n");
		printf("<link rel=\"stylesheet\" href=\"tiers/fontawesome/css/font-awesome.min.css\">\n");

		printf("<title>%s</title>\n", $this->titre);
		printf("<meta name=\"description\" content=\"%s\">\n", $this->description);
		
		// ADEF ou CFBT ???
		$style = "style-".(is_adef()?"adef":"cfbt").".css";
		printf("<link rel=\"stylesheet\" href=\"css/%s\">\n", $style);
		$this->ajouter_css();
		printf("<script src=\"tiers/jquery/jquery-1.12.2.min.js\"></script>\n");
		printf("<script src=\"tiers/bootstrap/js/bootstrap.min.js\"></script>\n");
		$this->ajouter_js();
		printf("</head>\n");
	}

	private function afficher_body() {
		printf("<body>\n");
		if (!(is_null($this->nav))) {
			$this->nav->afficher();
		}
		printf("<div class=\"container-fluid page\">\n");
		foreach ($this->liste_composants as $composant) {
			$composant->afficher();
		}
		printf("</div>\n");
		printf("</body>\n");
	}
	
	private function ajouter_css() {
		$liste_css = array();
		foreach ($this->liste_composants as $composant) {
			$css = $composant->lire_css_additionnel();
			foreach ($css as $elem) {
				if (!(in_array($elem, $liste_css))) {$liste_css[] = $elem;}
			}
		}
		foreach ($liste_css as $elem) {
			printf("<link rel=\"stylesheet\" type=\"text/css\" href=\"%s\" />\n", $elem);
		}
	}
	
	private function ajouter_js() {
		$liste_js = array();
		foreach ($this->liste_composants as $composant) {
			$js = $composant->lire_js_additionnel();
			foreach ($js as $elem) {
				if (!(in_array($elem, $liste_js))) {$liste_js[] = $elem;}
			}
		}
		foreach ($liste_js as $elem) {
			printf("<script type=\"text/javascript\" src=\"%s\"></script>\n", $elem);
		}
	}
	
	public function __call($methode, $arguments) {
		$prefixe = substr($methode, 0, 7);
		$suffixe = substr($methode, 7);
		if (!(strcmp($prefixe, "ouvrir_"))) {
			$composant = new composant_html5($suffixe, composant_html5::HTML5_OUVERTURE);
		}
		else if (!(strcmp($prefixe, "fermer_"))) {
			$composant = new composant_html5($suffixe, composant_html5::HTML5_FERMETURE);
		}
		else {
			die("Méthode ${methode} inexistante");
		}
		$this->ajouter_composant($composant);
	}
}