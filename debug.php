<?php
require_once "classes/init.php";
$NAV_PRINCIPALE = array("toto" => array("titi" => "debug.php"));

$page = new page("ADEF", "Exemple d'utilisation d'une librairie de composants");

$navbar = new composant_navbar($NAV_PRINCIPALE);
$page->ajouter_nav($navbar);

/* Création entête */
$entete = new composant_entete_2_niveaux(array());
$liste_poles = db_table_pole_adef::Liste_id_poles();
foreach ($liste_poles as $id_pole) {
	$pole = db_table_pole_adef::Construire($id_pole);
	$liste_filieres = db_table_filiere_adef::Liste_id_filieres_par_pole($id_pole);
	foreach ($liste_filieres as $id_filiere) {
		$filiere = db_table_filiere_adef::Construire($id_filiere);
		$url = $filiere->lire_url_s();
		$entete->ajouter_filiere($pole->lire_libelle_pole(), $id_filiere, $filiere->lire_nom_s(), $url);
	}
}

/* Création bandeau */

$page->ajouter_composant($entete);

/* Création d'un formulaire */
$formulaire = new composant_formulaire("Contacts filière");
$liste_poles = db_table_pole_adef::Liste_id_poles();
foreach ($liste_poles as $id_pole) {
	$pole = db_table_pole_adef::Construire($id_pole);
	$liste_filieres = db_table_filiere_adef::Liste_id_filieres_par_pole($id_pole);
	foreach ($liste_filieres as $id_filiere) {
		$filiere = db_table_filiere_adef::Construire($id_filiere);
		$formulaire->ajouter_filiere($pole->lire_libelle_pole(), $id_filiere, $filiere->lire_nom_s());
	}
}
$page->ajouter_composant($formulaire);

/* Création pied-de-page */
$pied_de_page = new composant_pied_de_page_adef();
$page->ajouter_composant($pied_de_page);


$page->afficher();