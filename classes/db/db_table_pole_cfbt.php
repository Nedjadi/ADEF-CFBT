<?php

/**
 * Classe de gestion de la table pole_cfbt
 */
class db_table_pole_cfbt extends db_table {
	public static $Liste_tuples = array();
	public static $Liste_id_tuples = array();
	
	public static function Liste_id_poles() {
		$liste = array();
		$sql = "SELECT POLE_CFBT_ID ";
		$sql .= "FROM ".table("pole_cfbt")." ";
		$sql .= "ORDER BY LIBELLE_POLE";
		$requete = db_connexion::Executer_requete($sql, array());
		while ($tuple = $requete->fetch()) {
			$liste[] = (int) $tuple["POLE_CFBT_ID"];
		}
		return $liste;
	}
}