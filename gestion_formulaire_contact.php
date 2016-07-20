<?php
require_once "classes/init.php";

// 2.Faire les tests de sécurité pour tous les champs :
function test_input($champ) {
	$champ = trim($champ); // Eviter les espaces inutiles
	$champ = stripslashes($champ); // Supprimer les backslashes
	$champ = htmlspecialchars($champ); // Désactiver les balises HTML
	return $champ;
}

$logo_filiere = "";
$nom_coordo = "";
$nom_responsable = "";
$telephone = "";

// 3.Assigner les tests de sécurité sur les données récupérées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['nom_filiere'])) {
		$id_filiere = (int) $_POST['nom_filiere'];

		if ($id_filiere > 0) {
			
			$filiere = db_table_filiere_adef::Construire($id_filiere);
			$logo_filiere = $filiere->lire_img_filiere_s();
			
			$id_coordo = $filiere->lire_coord_s();
			$coordo = db_table_personne::Construire($id_coordo);
			$nom_coordo = $coordo->lire_prenom_id()." ".$coordo->lire_nom_id();
			
			$id_responsable = $filiere->lire_resp_s();
			$responsable = db_table_personne::Construire($id_responsable);
			$nom_responsable = $responsable->lire_prenom_id()." ".$responsable->lire_nom_id();

			//$id_telephone = 
		}
	}
}

echo json_encode(array(
	"logo_filiere" => $logo_filiere,
	"nom_coordo" => $nom_coordo,
	"nom_responsable" => $nom_responsable,
	"telephone" => $telephone));

// modif du fichier pour faire un test