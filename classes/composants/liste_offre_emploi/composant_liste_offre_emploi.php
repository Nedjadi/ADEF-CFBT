<?php

class composant_panneau extends composant {
	private $titre;
	private $liste_items = array();

	public function __construct($titre) {
		$this->titre = $titre;
		$this->ecrire_css_additionnel("panneau.css");
	}










printf("<div class=\"row\">\n");
	printf("<div class=\"container\">\n");
		printf("<div class=\"col-md-12\">\n");
			printf("<div class=\"contour\">\n");
				printf("<form name=\"choixsection\" method="post">\n");
					printf("<p class=\"noir3 alignc\">\n");
						printf("<span class=\"titreinfo\">\n");
							printf("<label for=\"listefil\">Filière professionnelle :&nbsp;
							</label>\n");
						printf("</span>\n");
						printf("<select name=\"listefil\" class=\"font14\">\n");
							printf("<option value=\"0\" selected=\"selected\">Toutes</option>\n");
							printf("<option value=\"1\">Céramique</option>\n");
							printf("<option value=\"2\">Coiffure</option>\n");
							printf("<option value=\"3\">Electronique</option>\n");
							printf("<option value=\"4\">Electrotechnique</option>\n");
							printf("<option value=\"5\">Froid et climatisation</option>\n");
							printf("<option value=\"6\">Graphisme</option>\n");
							printf("<option value=\"7\">Métiers divers</option>\n");
							printf("<option value=\"8\">Optique-lunetterie</option>\n");
							printf("<option value=\"9\">Prothèse dentaire</option>\n");
							printf("<option value=\"10\">Services administratifs</option>\n");
							printf("<option value=\"11\">Toilettage canin</option>\n");
							printf("<option value=\"12\">Vente-commerce</option>\n");
						printf("</select>\n");
						printf("<span class=\"titreinfo\">\n");
							printf("<label for=\"listedip\" class=\"lab\">Niveau de diplôme :&nbsp;\n");
							printf("</label>\n");
						printf("</span>\n");
						printf("<select name=\"listedip\" class=\"selec\">\n");
						printf("<option value=\"0\" selected="selected">Tous</option>\n");
						printf("<option value=\"1\">CAP ou Certificat</option>\n");
						printf("<option value=\"2\">Bac Pro ou BP</option>\n");
						printf("<option value=\"3\">BTS</option>\n");
						printf("</select>\n");
					printf("</p>\n");
					printf("<p class=\"filtrer alignc\">\n");
						printf("<a class=\"filtrer-liste\" title=\"Appliquer ces filtres à la liste des offres\">Filtrer
						</a>\n");
					printf("</p>\n");
				printf("</form>\n");
			printf("</div>\n");
		printf("</div>\n");
	printf("</div>\n");


	<div class="row">
	<div class="container">
		<div class="col-md-12">
			
  				<ul class="nav nav-pills">
    				<li class="active"><a data-toggle="pill" href="#home">Offre classé par date</a></li>
    				<li><a data-toggle="pill" href="#menu1">Mode d'emploi</a></li>
  				</ul> 
  				<div class="tab-content">
    				<div id="home" class="tab-pane fade in active">   
      					<div id="tab1" class="tab_content">
							<table class="tableau-gen" cellpadding="0" cellspacing="0">
								<tbody>
									<tr>
										<td class="tableau-image" rowspan="2" style="">
											<a href="offre-bts-emploi-marseille-1.php" title="Consulter cette offre BTS Comptabilité et Gestion des Organisations">
												<img class="img-responsive width " src="images/filieres/comptabilite.png">
											</a>
										</td>
										<td class="tableau-offre" colspan="3">BTS Comptabilité et Gestion des Organisations
										</td>
									</tr>
									<tr>
										<td class="tableau-poste">
											<a href="offre-bts-emploi-marseille-1.php" title="Consulter cette offre BTS Comptabilité et Gestion des Organisations">EMPLOI
											</a>
										</td>
										<td class="tableau-lieu">13001 Marseille
										</td>
										<td class="tableau-date">24/03/2016
										</td>
									</tr>

								</tbody>

							</table>

							<p class="aste">
								(*) Les offres récemment pourvues apparaissent en gris clair
							</p>
							<div class="alignc">
  								<ul class="pagination">
    								<li><a href="#">1</a></li>
    								<li><a href="#">2</a></li>
    								<li><a href="#">3</a></li>
    								<li><a href="#">4</a></li>
    								<li><a href="#">5</a></li>
  								</ul>
							</div>
							<br><br><br><br><br><br><br><br><br><br><br><br>
						</div>
    				</div>
    				<div id="menu1" class="tab-pane fade bordure">				
						<p class="soustitrecfbt">
							<span class="chevbar1" style="background:url('./img/chevbar.png') no-repeat;">&nbsp;</span>
							<span style="float:left;">&nbsp;D'où viennent ces offres d'emploi ?&nbsp;&nbsp;</span>
							<span class="chevbar2" style="background:url('./img/chevbar.png') no-repeat;">&nbsp;</span>
							<span style="float:none;">&nbsp;</span>
						</p>
							Solidement implanté dans la région, le CFBT travaille avec un important réseau d'employeurs. Lorsque l'un de ces employeurs souhaite recruter un nouvel apprenti, nous pouvons l'accompagner de plusieurs façons&nbsp;:
						<ul class="bleu-liste">
							<li><span class="liste-normal">Apport de toute information utile;</span></li>
							<li><span class="liste-normal">Choix du diplôme adapté au poste recherché;</span></li>
							<li><span class="liste-normal">Aide administrative dans le processus de signature de contrat;</span></li>
							<li><span class="liste-normal">Proposition de CV de jeunes postulant pour l'apprentissage.</span></li>
						</ul>
							C'est dans le cadre de ce dernier point que nous publions des offres d'emploi : elles émanent des entreprises qui nous ont contacté pour une aide au recrutement.
						<p class="soustitrecfbt">
							<span class="chevbar1" style="background:url('./img/chevbar.png') no-repeat;">&nbsp;</span>
							<span style="float:left;">&nbsp;Comment sont traitées les candidatures ?&nbsp;&nbsp;</span>
							<span class="chevbar2" style="background:url('./img/chevbar.png') no-repeat;"></span>
							<span style="float:none;">&nbsp;</span>
						</p>
							Il est important de noter les règles que nous appliquons strictement pour cette publication :
						<ul class="bleu-liste">
							<li><span class="liste-normal">Chaque offre d'emploi correspond réellement à un poste à pourvoir en contrat d'apprentissage, selon les modalités décrites dans l'offre.</span></li>
							<li><span class="liste-normal">Les candidatures se font auprès de nos équipes pédagogiques, qui prennent alors rendez-vous avec le postulant pour valider avec lui son projet professionnel.</span></li>
							<li><span class="liste-normal">Tout candidat qui satisfait aux conditions pédagogiques et administratives du contrat d'apprentissage sera retenu et son CV transmis à l'employeur. Aucun filtrage de CV n'est opéré par les équipes pédagogiques. En effet, le recrutement en lui-même reste de l'entière responsabilité de l'employeur.</span></li>
							<li><span class="liste-normal">Afin de garantir cette procédure, le nom de l'entreprise qui recrute ne sera pas divulgué au candidat. Ce nom ne sera connu du candidat qu'au moment où l'entreprise prendra contact avec lui pour un entretien d'embauche.</span></li>
						</ul>
						<p class="soustitrecfbt" style="margin-left:0;">
							<span class="chevbar1" style="background:url('./img/chevbar.png') no-repeat;">&nbsp;</span>
							<span style="float:left;">&nbsp;D'autres questions ?&nbsp;&nbsp;</span>
							<span style="float:left;background:url('./img/chevbar.png') no-repeat;width:98px;height:18px;background-position: right top;">&nbsp;</span>
							<span style="float:none;">&nbsp;</span>
						</p>
							Si ce mode d'emploi n'a pas répondu à toutes vos questions, n'hésitez pas à prendre <a href="contact.php?subj=contact&amp;id1=2btu" title="Contacter l'accueil du CFBT">contact</a> avec nous.
						<br><br>
						<p class="noir3" style="text-align:center;color:#00a4e8;font-weight:bold;">Nous conseillons aux candidats de vérifier régulièrement les offres d'emploi que nous publions :<br>un nombre significatif de nos apprentis a été embauché de cette façon !</p>
    				</div>
					
    				<br><br><br><br><br><br><br><br><br><br><br><br>
  				</div>
			</div>
		</div>
	</div>
</div>



