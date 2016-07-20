<?php

class composant_panneau extends composant {
	private $titre;
	private $liste_items = array();

	public function __construct($titre) {
		$this->titre = $titre;
		$this->ecrire_css_additionnel("panneau.css");
	}

	public function afficher() {
printf("<div class=\"container cont\">\n");
	printf("<div class=\"row panneau_cfbt\">\n");
		printf("<div class=\"col-md-6 col-sm-6 col-xs-12\">\n");
			printf("<div class=\"panel-group\">\n");
				printf("<div class=\"panel panel titre-panneau\">\n");	
      				printf("<div class=\"panel-heading titre-panneau\">\n");
						printf("<h2 class=\"panneau_titre panel-title\">\n");
							printf("<a data-toggle=\"collapse\" href=\"#collapse1\">%s", $this->titre);
							printf("<span class=\"caret\"></span>\n");	
							printf("</a>\n");
						printf("</h2>\n");
					printf("</div>\n");

						
					printf("<div id=\"collapse1\" class=\"panel-collapse collapse\">\n");
						printf("<ul class=\"list-group\">\n");

							foreach ($this->liste_items as $item) {
							printf("<li class=\"list-group-item\">\n");
								printf("<p class=\"sous_panneau\">\n");
									printf("<a class=\"bla\" href=\"%s\">%s", $item["href"], $item["ancre"]);
									printf("</a>\n");
									printf("<p>%s</p>", $item["texte"]);
								printf("</p>\n");
							printf("</li>\n");
						printf("</ul>\n");	
							}
											
					printf("</div>\n");		
				printf("</div>\n");
			printf("</div>\n");
		printf("</div>\n");

	
	}

	public function ajouter_item($ancre, $href, $texte) {
		$this->liste_items[] = array("ancre" => $ancre, "href" => $href, "texte" => $texte);
	}

}

