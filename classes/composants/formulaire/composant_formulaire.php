<?php

class composant_formulaire extends composant {
	private $titre;
	private $liste_poles = array();
	private $logo_filiere;

	public function __construct($titre) {
		$this->titre = $titre;
		$this->ecrire_js_additionnel("contact.js");
		$this->ecrire_css_additionnel("style_formulaire.css");
	}
	
	public function afficher() {
		$this->afficher_infos_filiere();
		$this->afficher_formulaire();
	}
	
	public function ajouter_filiere($nom_pole, $id_filiere, $nom_filiere) {
		$this->liste_poles[$nom_pole][] = array("id" => $id_filiere, "nom" => $nom_filiere);
		$this->logo_filiere;
	}
	
	private function afficher_infos_filiere() {
		printf("<main class=\"row\">\n");
		printf("<div class=\"col-md-12\">\n");
		printf("<h1 class=\"titre-rubrique\"><i class=\"fa fa-envelope-o\"></i> %s&nbsp;:</h1>\n", $this->titre);
		printf("</div>");
		printf("<div class=\"col-md-3\">");
		printf("<img src=\"img/%s\" alt=\"logo filière\" class=\"img-responsive thumbnail\" id=\"logo_filiere\">", $this->logo_filiere);
		printf("</div>");
		printf("<div class=\"col-md-8 col-md-offset-1\">\n");
		printf("<dl class=\"dl-horizontal\">\n");
		printf("<dt>Relation entreprises :</dt>\n<dd id=\"nom_coordo\"></dd>\n");
		printf("<dt>Responsable de formation :</dt>\n<dd id=\"nom_responsable\"></dd>\n");
		printf("<dt>Téléphone :</dt>\n<dd id=\"telephone\"></dd>\n");
		printf("</dl>\n");
		printf("</div>\n");
		printf("</main>\n");
	}
	
	private function afficher_formulaire() {
		printf("<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"\">\n");
		printf("<legend>Formulaire de contact :</legend>\n");
		printf("<div class=\"form-group\">\n");
		printf("<label class=\"control-label col-sm-2\" for=\"domain\">Choisissez la filière à contacter:</label>\n");
		printf("<div class=\"col-sm-10\">\n");
		$this->afficher_liste_poles();
		printf("</div>\n");
		printf("</div>\n");
		$this->afficher_champ_formulaire("firstname", "Prénom", "text", "Votre prénom", true);
		$this->afficher_champ_formulaire("lastname", "Nom", "text", "Votre nom", true);
		$this->afficher_champ_formulaire("phone", "Numéro de téléphone", "tel", "Votre numéro de téléphone", false);
		$this->afficher_champ_formulaire("email", "Email", "email", "Votre email", true);
		$this->afficher_champ_formulaire("message", "Message", "textarea", "Votre message", true);
		printf("<div class=\"form-group\">\n");
		printf("<div class=\"col-sm-offset-2 col-sm-10\">\n");
		printf("<button type=\"submit\" class=\"btn btn-success\">Envoyer</button>\n");
		printf("</div>\n");
		printf("</div>\n");
		printf("</form>\n");
	}
	
	private function afficher_liste_poles() {
		printf("<select class=\"form-control\" id=\"domain\">\n");
		printf("<option value=\"rien\">...</option>");
		ksort($this->liste_poles);
		foreach($this->liste_poles as $nom_pole => $liste_filieres) {
			printf("<optgroup label=\"%s\">\n", $nom_pole);
			sort($liste_filieres);
			foreach($liste_filieres as $filiere) {
				printf("<option value='%d'>%s</option>\n", $filiere["id"], $filiere["nom"]);
			}
			printf("</optgroup>\n");
		}
		printf("</select>\n");
	}
	
	private function afficher_champ_formulaire($id, $label, $type, $placeholder, $required) {
		printf("<div id=\"error_filiere\"></div>");
		printf("<div class=\"form-group\">\n");
		printf("<label class=\"control-label col-sm-2\" for=\"%s\">%s&nbsp;:</label>\n", $id, $label);
		printf("<div class=\"col-sm-10\">\n");
		if (strcmp($type, "textarea")) {
			printf("<input type=\"%s\" class=\"form-control\" id=\"%s\" placeholder=\"%s\" %s>\n", $type, $id, $placeholder, $required?"required":"");
		}
		else {
			printf("<textarea class=\"form-control\" id=\"%s\" placeholder=\"%s\" %s></textarea>\n", $id, $placeholder, $required?"required":"");			
		}
		printf("</div>\n");
		printf("</div>\n");
	}
}