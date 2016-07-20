<?php

abstract class composant {
	protected $css_additionnel = array();
	protected $js_additionnel = array();

	abstract public function afficher();
	
	public function lire_nom_composant() {
		return get_class($this);
	}
	
	public function ecrire_css_additionnel($fichier_css) {
		$nom_classe = $this->lire_nom_composant();
		$nom_composant = substr($nom_classe, strlen(PREFIXE_COMPOSANT));
		$this->css_additionnel[] = CHEMIN_COMPOSANTS."${nom_composant}/css/${fichier_css}";
	}
	public function lire_css_additionnel() {
		return $this->css_additionnel;
	}
	
	public function ecrire_js_additionnel($fichier_js) {
		$nom_classe = $this->lire_nom_composant();
		$nom_composant = substr($nom_classe, strlen(PREFIXE_COMPOSANT));
		$this->js_additionnel[] = CHEMIN_COMPOSANTS."${nom_composant}/js/${fichier_js}";
	}
	public function lire_js_additionnel() {
		return $this->js_additionnel;
	}
}