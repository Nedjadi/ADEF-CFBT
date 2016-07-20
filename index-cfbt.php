<?php
require_once "classes/init.php";

$page = new page("cfbt", "Site officielle du cfbt");


$navbar = new composant_navbar($NAV_PRINCIPALE);

// Création du composant en_tête
$en_tete = new composant_entete_3_niveaux(true);
$liste_poles = db_table_pole_cfbt::Liste_id_poles();

foreach ($liste_poles as $id_pole) {
	$pole = db_table_pole_cfbt::Construire($id_pole);
	$nom_pole = $pole->lire_libelle_pole();
	$liste_filieres = db_table_filiere::Liste_id_filieres_par_pole($id_pole);

	foreach ($liste_filieres as $id_filiere) {
		$filiere = db_table_filiere::Construire($id_filiere);
		$nom_filiere = $filiere->lire_nom_s();
		$liste_formations = db_table_formation_cfbt::Liste_id_formations_par_filiere($id_filiere);

		foreach ($liste_formations as $id_formation) {

			$formation = db_table_formation_cfbt::Construire($id_formation);
			$id_diplome = $formation->lire_num_diplome_f();
			$diplome = db_table_diplome::Construire($id_diplome);
			$nom_formation = $diplome->lire_nom_d()." ".$formation->lire_titre_f();
			$url_formation = "fiche_".$formation->lire_url_f().".php";
			$en_tete->ajouter_nav($nom_pole, $nom_filiere, $nom_formation, $url_formation);
		}
	}
}





//composant panel accordeon

$panel_formation = new composant_panneau("Liens");
$panel_formation->ajouter_item("cfbt", "http://www.cfbt-asso.com", "Site du CFBT");
$panel_formation->ajouter_item("adef", "http://www.adef-asso.com", "Site de l'ADEF");

//composant conteneur
$introduction = new composant_conteneur();


$introduction->charger_html("introduction.html");


//composant offre_emploi

$liste_offres_emploi = new composant_conteneur();
$liste_offres_emploi->charger_html("liste_offres_emploi.html");



//composant separation

$separation = new composant_separation();

// composant footer

$pied_de_page = new composant_pied_de_page_cfbt();


$page->ajouter_composant($navbar);
$page->ajouter_composant($en_tete);

$page->ajouter_composant($introduction);
$page->ajouter_composant($separation);
$page->ajouter_composant($panel_formation);
$page->ajouter_composant($separation);
$page->ajouter_composant($pied_de_page);
$page->ajouter_composant($liste_offres_emploi);

$page->afficher();

echo "<br><br><br>\n";
