<?php

class composant_html5 extends composant {
	const HTML5_OUVERTURE = 0;
	const HTML5_FERMETURE = 1;

	private $balise;
	private $type;
	
	public function __construct($balise, $type) {
		$this->balise = $balise;
		$this->type = $type;
	}
	public function afficher() {
		if ($this->type == self::HTML5_OUVERTURE) {
			printf("<%s>\n", $this->balise);
		}
		else if ($this->type == self::HTML5_FERMETURE) {
			printf("</%s>\n", $this->balise);
		}
	}
}