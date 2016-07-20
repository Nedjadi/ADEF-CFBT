
<?php

class composant_entete_3_niveaux extends composant {
	private $est_titre;
	private $liste_niveau_1 = array();

	public function __construct($est_titre = false) {
		$this->est_titre = $est_titre;
		$this->ecrire_css_additionnel("en-tete-cfbt.css");
	}
	
	public function afficher() {
		$this->afficher_entete_3_niveaux();
		$this->afficher_entete_nav();
	}

	public function ajouter_nav($nom_niveau_1, $nom_niveau_2, $nom_nav, $href_nav) {
		$this->liste_niveau_1[$nom_niveau_1][$nom_niveau_2][] = array("nom" => $nom_nav, "href" => $href_nav);
	}

	private function afficher_entete_3_niveaux(){
		
		printf("<div class=\"container composant_en_tete_3n_conteneur\">\n");
			printf("<div class=\"row\">\n");
				printf("<div class =\"col-md-4 col-sm-2 col-xs-12 composant_en_tete_3n_presentation1\">\n");
					printf("<img class=\"composant_en_tete_3n_imgpres img-responsive\" src=\"img/logogrand.jpg\">\n");
					printf("<p>15, rue des Convalescents
						13001 MARSEILLE<br>
						Téléphone : 04.91.90.78.53<br>
						Fax : 04.91.56.14.21</p>\n");
				printf("</div>\n");
				printf("<div class =\"col-md-8 col-sm-4 col-xs-12 composant_en_tete_3n_presentation2\">\n");
					$balise = ($this->est_titre)?"h1":"p";
					printf("<%s class=\"composant_en_tete_3n_top-pres\">Centre de Formation de la Bourse du Travail</%s>\n", $balise, $balise);					
						printf("<div class =\"col-md-8 col-sm-4 col-xs-12 composant_en_tete_3n_presentation2\">\n");
					printf("<p class=\"composant_en_tete_3n_top-qual\">Qualifier pour développer, innover pour réussir</p>\n");
					printf("</div>\n");
				printf("</div>\n");
		printf("</div>\n");

	}

	private function afficher_entete_nav(){
		printf("<nav class=\"navbar composant_en_tete_3n_navo\">\n");
			printf("<div class=\"container\">\n");	  
	    		printf("<div class=\"navbar-header\">\n");
	      			printf("<button type=\"button\" class=\"navbar-toggle composant_en_tete_3n_bord-button\" data-toggle=\"collapse\" data-target=\"#myNavbar2\">\n");
				        printf("<span class=\"icon-bar composant_en_tete_3n_trait-button\"></span>\n");
				        printf("<span class=\"icon-bar composant_en_tete_3n_trait-button\"></span>\n");
				        printf("<span class=\"icon-bar composant_en_tete_3n_trait-button\"></span>\n");                        
			      	printf("</button>\n");	    			
	    		printf("</div>\n");
 	    		printf("<div class=\"collapse navbar-collapse\" id=\"myNavbar2\">\n");
 	      			printf("<ul class=\"nav navbar-nav\">\n");
					foreach ($this->liste_niveau_1 as $nom_niveau_1 => $liste_niveau_2) {
 	        			printf("<li class=\"dropdown\">\n");
						printf("<a class=\"dropdown-toggle composant_en_tete_3n_navo\" data-toggle=\"dropdown\" href=\"#\">%s", $nom_niveau_1);
						printf("<span class=\"caret\"></span></a>\n");	        						        					
        				printf("<ul class=\"dropdown-menu\">\n");
						foreach ($liste_niveau_2 as $nom_niveau_2 => $liste_nav) {
							printf("<li class=\"dropdown-header\">%s</li>\n", $nom_niveau_2);
							foreach ($liste_nav as $nav) {
								printf("<li style=\"padding-left:10px;\"><a href=\"%s\">%s</a></li>\n", $nav["href"], $nav["nom"]);
							}
						}
		 	        	printf("</ul>\n");				
					}				
 	        		printf("</ul>\n");
 	      		printf("</div>\n");
 	      	printf("</div>\n");
 		printf("</nav>\n");
 		printf("</div>\n");
	}
}

