<?php
require_once "classes/init.php";

$page = new page("SIMPLON", "Exemple d'utilisation d'une librairie de composants");

$titre = new composant_titre(1, "Coucou !");
$sous_titre = new composant_titre(2, "Comment ça va ?");

$page->ouvrir_section();
$page->ajouter_composant($titre);
$page->ajouter_composant($sous_titre);
$page->fermer_section();

$page->ajouter_composant(new composant_separation(50));

$page->afficher();

/* ADEF */
echo "<h3>ADEF</h3>\n";
$liste_poles = db_table_pole_adef::Liste_id_poles();
foreach ($liste_poles as $id_pole) {
	$pole = db_table_pole_adef::Construire($id_pole);
	echo "Pôle ".$pole->lire_libelle_pole()."<br>\n";
	$liste_filieres = db_table_filiere_adef::Liste_id_filieres_par_pole($id_pole);
	foreach ($liste_filieres as $id_filiere) {
		$filiere = db_table_filiere_adef::Construire($id_filiere);
		echo " --> Filière ".$filiere->lire_nom_s();
		$id_responsable = $filiere->lire_resp_s();
		$responsable = db_table_personne::Construire($id_responsable);
		echo " : ".$responsable->lire_prenom_id()." ".$responsable->lire_nom_id()."<br>\n";
	}
}

/* CFBT */
echo "<h3>CFBT</h3>\n";
$liste_filieres = db_table_filiere::Liste_id_filieres();
foreach ($liste_filieres as $id_filiere) {
	$filiere = db_table_filiere::Construire($id_filiere);
	echo "Filière ".$filiere->lire_nom_s()."<br>\n";
	$liste_formations = db_table_formation_cfbt::Liste_id_formations_par_filiere($id_filiere);
	foreach ($liste_formations as $id_formation) {
		$formation = db_table_formation_cfbt::Construire($id_formation);
		$id_diplome = $formation->lire_num_diplome_f();
		$diplome = db_table_diplome::Construire($id_diplome);
		echo " --> ".$diplome->lire_nom_d()." ".$formation->lire_titre_f();
		$id_responsable = $formation->lire_num_id();
		$responsable = db_table_personne::Construire($id_responsable);
		echo " : ".$responsable->lire_prenom_id()." ".$responsable->lire_nom_id()."<br>\n";
	}
}
echo "<br><br><br>\n";

