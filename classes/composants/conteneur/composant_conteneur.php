<?php

class composant_conteneur extends composant {
	private $page;
	private $html;

	public function __construct($html = "") {
		$this->page = basename($_SERVER["PHP_SELF"], ".php")."/";
		$this->html = $html;
		$this->ecrire_css_additionnel("conteneur.css");
	}

	public function ajouter_html($html) {
		$this->html .= $html;
	}
	
	public function charger_html($fichier_source) {
		$chemin_source = CHEMIN_SRC.$this->page.$fichier_source;
		$this->html .= file_get_contents($chemin_source);
	}

	public function afficher(){
		printf("<div class=\"container cont\">\n");
		printf("<div class=\"row\">\n");
			printf("<div class=\"col-xs-12\">%s</div>\n", $this->html);
		printf("</div>\n");
		printf("</div>\n");

	}
}