
<?php

class composant_pied_de_page_cfbt extends composant {

	public function __construct() {
		$this->ecrire_css_additionnel("pied_de_page_cfbt.css");
	}
	
	public function afficher() {
		$this->afficher_pied_de_page_cfbt();
	}

	private function afficher_pied_de_page_cfbt(){
	printf("<footer>\n");	
	printf("<div class=\"container cont\">\n");
			printf("<div class=\"row cfbt\">\n");
			printf("<div class=\"col-md-12 col-sm-12 col-xs-12\">\n");
				printf("<hr style=\"margin-top:-2px;\">\n");
				printf("<p style=\"vertical-align:middle;\">\n");
				printf("<img src=\"img/logo-reseau.jpg\" alt=\"Logo qualité RESEAU\" height=\"111\">\n");
				printf("<img class=\"img-responsive pied_de_page_gauche\" src=\"img/cfaregionagenda21.jpg\" alt=\"Agenda 21 CFA Région PACA\" width=\"670\" height=\"121\">\n");
				printf("</p>\n");
				printf("<p>\n");
				printf("<a href=\"nous-contacter.php\">Contacts</a>\n");
				printf("&nbsp; | &nbsp;\n");
				printf("<a href=\"liste-centres-formation.php\">Plan et accès</a>\n");
				printf("&nbsp; | &nbsp;\n");
				printf("<a href=\"mentions-legales.php\">Mentions légales</a>\n");
				printf("&nbsp; | &nbsp;\n");
				printf("<a href=\"contact.php?subj=webmaster&amp;id1=34xox\">Webmaster</a>\n");
				printf("&nbsp; | &nbsp;\n");
				printf("<span style=\"color:#0000aa;\">ADEF/CFBT ©</span>\n");
				printf("</p>\n");			
				printf("</div>\n");
				printf("</div>\n");
			printf("</div>\n");				
			printf("</footer>\n");
	}
}
















