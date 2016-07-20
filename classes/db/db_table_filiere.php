<?php

/**
 * Classe de gestion de la table filiere
 */
class db_table_filiere extends db_table {
	public static $Liste_tuples = array();
	public static $Liste_id_tuples = array();
	
	public static function Liste_id_filieres() {
		$liste = array();
		$sql = "SELECT SECTION_ID ";
		$sql .= "FROM ".table("filiere")." ";
		$sql .= "ORDER BY NOM_S";
		$requete = db_connexion::Executer_requete($sql, array());
		while ($tuple = $requete->fetch()) {
			$liste[] = (int) $tuple["SECTION_ID"];
		}
		return $liste;
	}
	
	public static function Liste_id_filieres_par_pole($id_pole) {
		$liste = array();
		$sql = "SELECT SECTION_ID ";
		$sql .= "FROM ".table("filiere")." ";
		$sql .= "WHERE POLE_CFBT_S = :id_pole ";
		$sql .= "ORDER BY NOM_S";
		$requete = db_connexion::Executer_requete($sql, array("id_pole" => $id_pole));
		while ($tuple = $requete->fetch()) {
			$liste[] = (int) $tuple["SECTION_ID"];
		}
		return $liste;
	}
}