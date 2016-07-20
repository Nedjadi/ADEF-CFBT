<?php

/**
 * Classe de gestion de la table news_adef
 */
class db_table_news_adef extends db_table {
	public static $Liste_tuples = array();
	public static $Liste_id_tuples = array();
	
	public static function Liste_id_news_adef() {
		$liste = array();
		$sql = "SELECT NUM_ADEF_N ";
		$sql .= "FROM ".table("news_adef")." ";
		$sql .= "WHERE AFFICHAGE_N > 0 ";
		$sql .= "ORDER BY AFFICHAGE_N";
		$requete = db_connexion::Executer_requete($sql, array());
		while ($tuple = $requete->fetch()) {
			$liste[] = (int) $tuple["NUM_ADEF_N"];
		}
		return $liste;
	}
}