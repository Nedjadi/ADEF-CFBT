<?php

/**
 * Classe de gestion de la table form_gen_adef
 */
class db_table_form_gen_adef extends db_table {
	public static $Liste_tuples = array();
	public static $Liste_id_tuples = array();
	
	public static function Liste_id_formations_par_filiere($id_filiere) {
		$liste = array();
		$sql = "SELECT NUM_F ";
		$sql .= "FROM ".table("form_gen_adef")." ";
		$sql .= "WHERE NUM_FILIERE_F = :id_filiere ";
		$sql .= "ORDER BY NIVEAU_F, TITRE_F";
		$requete = db_connexion::Executer_requete($sql, array("id_filiere" => $id_filiere));
		while ($tuple = $requete->fetch()) {
			$liste[] = (int) $tuple["NUM_F"];
		}
		return $liste;
	}
}