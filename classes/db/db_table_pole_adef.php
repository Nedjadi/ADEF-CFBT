<?php

/**
 * Classe de gestion de la table pole_adef
 */
class db_table_pole_adef extends db_table {
	public static $Liste_tuples = array();
	public static $Liste_id_tuples = array();
	
	public static function Liste_id_poles() {
		$liste = array();
		$sql = "SELECT POLE_ID ";
		$sql .= "FROM ".table("pole_adef")." ";
		$sql .= "ORDER BY LIBELLE_POLE";
		$requete = db_connexion::Executer_requete($sql, array());
		while ($tuple = $requete->fetch()) {
			$liste[] = (int) $tuple["POLE_ID"];
		}
		return $liste;
	}
}