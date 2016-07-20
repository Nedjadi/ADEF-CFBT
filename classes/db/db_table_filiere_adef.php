<?php

/**
 * Classe de gestion de la table filiere_adef
 */
class db_table_filiere_adef extends db_table {
	public static $Liste_tuples = array();
	public static $Liste_id_tuples = array();
	
	public static function Liste_id_filieres() {
		$liste = array();
		$sql = "SELECT SECTION_ID ";
		$sql .= "FROM ".table("filiere_adef")." ";
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
		$sql .= "FROM ".table("filiere_adef")." ";
		$sql .= "WHERE POLE_S = :id_pole ";
		$sql .= "ORDER BY NOM_S";
		$requete = db_connexion::Executer_requete($sql, array("id_pole" => $id_pole));
		while ($tuple = $requete->fetch()) {
			$liste[] = (int) $tuple["SECTION_ID"];
		}
		return $liste;
	}
	
	public static function Id_filiere_par_url($url) {
		$ret = false;
		$sql = "SELECT SECTION_ID ";
		$sql .= "FROM ".table("filiere_adef")." ";
		$sql .= "WHERE URL_S = :url";
		$requete = db_connexion::Executer_requete($sql, array("url" => $url));
		while ($tuple = $requete->fetch()) {
			$ret = (int)  $tuple["SECTION_ID"];
		}
		return $ret;
	}
}