<?php

// if (!(is_adef()) && (!(is_cfbt()))) {
// 	die("Ni ADEF, ni CFBT :-(");
// }
/* Chemins */
define("CHEMIN_CLASSES", "classes/");
define("CHEMIN_COMPOSANTS", CHEMIN_CLASSES."composants/");
define("CHEMIN_DB", CHEMIN_CLASSES."db/");
define("PREFIXE_COMPOSANT", "composant_");
define("PREFIXE_DB", "db_");
define("CHEMIN_SRC", "src/");

/* BDD */
define("DB_SERVEUR", "localhost");
define("DB_NOM_BASE", "centrefo");
define("DB_UTILISATEUR", "root");
define("DB_MOT_DE_PASSE", "");
define("DB_PREFIXE_TABLE", "");

function is_adef() {
	$req = $_SERVER["REQUEST_URI"];
	return (strpos($req, "/adef/") !== false);
}

function is_cfbt() {
	$req = $_SERVER["REQUEST_URI"];
	return (strpos($req, "/cfbt/") !== false);
}

function table($nom) {
	$table = DB_PREFIXE_TABLE.$nom;
	return $table;
}

function autochargement($nom_classe) {
	if (!(strncmp($nom_classe, PREFIXE_COMPOSANT, strlen(PREFIXE_COMPOSANT)))) {
		$nom_sans_prefixe = substr($nom_classe, strlen(PREFIXE_COMPOSANT));
		$chemin = CHEMIN_COMPOSANTS.$nom_sans_prefixe."/";
	}
	else if (!(strncmp($nom_classe, PREFIXE_DB, strlen(PREFIXE_DB)))) {
		$chemin = CHEMIN_DB;
	}
	else {
		$chemin = CHEMIN_CLASSES;
	}
	require_once($chemin.$nom_classe.".php");
}

/* Activation de l'autoload */
spl_autoload_register("autochargement");

/* Ouverture de la BDD */
db_connexion::Init();

if (is_adef()) {@include "init_adef.php";}
if (is_cfbt()) {@include "init_cfbt.php";}
