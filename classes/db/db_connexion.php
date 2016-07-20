<?php

/**
 * Classe d'utilitaires PDO
 */
class db_connexion {
	public static $Connexion = null;

	/**
	 * RAZ constructeur pour classe statique
	 *
	 * @portée	privée
	 * @retour	vide
	 */
    private function __construct() {}

	// --------------------------------------------------------------------

	/**
	 * Connexion à la base de données
	 *
	 * @portée	publique
	 * @retour	vide
	 */
	public static function Init() {
		if (self::$Connexion == null) {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			try {
				$db = new PDO("mysql:host=".DB_SERVEUR.";dbname=".DB_NOM_BASE.";charset=utf8", DB_UTILISATEUR, DB_MOT_DE_PASSE, $pdo_options);
				self::$Connexion = $db;
			} catch (Exception $e) {
				die("ERREUR : Connexion à la BDD en échec");
			}
		}
	}
	
	/**
	 * Exécution d'une requête
	 *
	 * @portée	publique
	 * @param	requête SQL dans la syntaxe PDO
	 * @param	tableau des paramètres
	 * @retour	vide
	 */
	public static function Executer_requete($sql, $parametres) {
		$requete = null;
		if (self::$Connexion == null) {
			die("ERREUR : Exécution d'une requête sans connexion à la BDD");
		}
		try {
			$requete = self::$Connexion->prepare($sql);
			$requete->execute($parametres);
		}
		catch (Exception $e) {
			die("ERREUR : Exécution d'une requête en échec");
		}
		return $requete;
	}
	
	/**
	 * Exécution d'une requête d'insertion
	 *
	 * @portée	publique
	 * @param	requête SQL dans la syntaxe PDO
	 * @param	tableau des paramètres
	 * @retour	valeur de la clé primaire du nouvel enregistrement
	 */
	public static function Inserer_requete($sql, $parametres) {
		$id = null;
		if (self::$Connexion == null) {
			die("ERREUR : Exécution d'une requête sans connexion à la BDD");
		}
		try {
			$requete = self::$Connexion->prepare($sql);
			$requete->execute($parametres);
			$id = self::$Connexion->lastInsertId();
		}
		catch (Exception $e) {
			die("ERREUR : Exécution d'une requête en échec");
		}
		return $id;
	}
	
	/**
	 * Test de la présence d'un tuple dans une table en base de données
	 *
	 * @portée	publique
	 * @param	valeur de l'identifiant recherché
	 * @param	nom de la table
	 * @retour	vide
	 */
	public static function Chercher_tuple($label, $valeur, $table) {
		$trouve = false;
		if (self::$Connexion == null) {
			die("ERREUR : Exécution d'une requête sans connexion à la BDD");
		}
		try {
			$sql = "SELECT {$label} FROM {$table} WHERE {$label} = :valeur";
			$requete = self::$Connexion->prepare($sql);
			$requete->execute(array("valeur" => $valeur));
		}
		catch (Exception $e) {
			die("ERREUR : Exécution d'une requête en échec");
		}
		$trouve = ($requete->fetch())?true:false;
		return $trouve;
	}
	
	/**
	 * Supprime un tuple dans une table en base de données
	 *
	 * @portée	publique
	 * @param	valeur de l'identifiant recherché
	 * @param	nom de la table
	 * @retour	vide
	 */
	public static function Supprimer_tuple($label, $valeur, $table) {
		if (self::$Connexion == null) {
			die("ERREUR : Exécution d'une requête sans connexion à la BDD");
		}
		try {
			$sql = "DELETE FROM {$table} WHERE {$label} = :valeur";
			$requete = self::$Connexion->prepare($sql);
			$requete->execute(array("valeur" => $valeur));
		}
		catch (Exception $e) {
			die("ERREUR : Exécution d'une requête en échec");
		}
	}
}