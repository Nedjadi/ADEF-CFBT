<?php

/**
 * Classe de gestion des tuples de la table pole_cfbt
 */
class db_pole_cfbt extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_pole	Identifiant du pole adef
	 * @retour	vide
	 */
    public function __construct($id_pole) {
		$this->declarer("libelle_pole", db_tuple::DB_TUPLE_CHAINE);
		parent::__construct("POLE_CFBT_ID", $id_pole);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT LIBELLE_POLE ";
		$sql .= "FROM ".table("pole_cfbt")." ";
		$sql .= "WHERE POLE_CFBT_ID = :id_pole_cfbt";
		$requete = db_connexion::Executer_requete($sql, array("id_pole_cfbt" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_libelle_pole($tuple["LIBELLE_POLE"]);
		}
		parent::charger();
	}
}