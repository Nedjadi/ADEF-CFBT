<?php

class composant_titre extends composant {
	private $niveau;
	private $texte;

	public function __construct($niveau, $texte) {
		$this->niveau = $niveau;
		$this->texte = $texte;
		$this->ecrire_css_additionnel("styles_titres.css");
	}

	public function afficher() {
		printf("<h%d>%s</h%d>\n", $this->niveau, $this->texte, $this->niveau);
	}
}