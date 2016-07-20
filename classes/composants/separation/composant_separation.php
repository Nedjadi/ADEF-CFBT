<?php

class composant_separation extends composant {
	
	public function __construct() {
		$this->ecrire_css_additionnel("separation.css");
	}
	
	public function afficher() {
		$this->afficher_separation();
	}

	private function afficher_separation(){

		printf("<div class=\"container cont\">\n");
		printf("<div class=\"row cfbt\">\n");
				printf("<div class=\"col-md-12 col-sm-8 col-xs-12 separation_inter\">\n");
				printf("</div>\n");
			printf("</div>\n");
			printf("</div>\n");
	}
}
