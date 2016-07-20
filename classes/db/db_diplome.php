<?php

/**
 * Classe de gestion des tuples de la table diplome
 */
class db_diplome extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_diplome	Identifiant du diplome
	 * @retour	vide
	 */
    public function __construct($id_diplome) {
		$this->declarer("nom_d", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("niveau_d", db_tuple::DB_TUPLE_ENTIER);
		$this->declarer("classement_d", db_tuple::DB_TUPLE_ENTIER);
		parent::__construct("DIPLOME_ID", $id_diplome);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT NOM_D, NIVEAU_D, CLASSEMENT_D ";
		$sql .= "FROM ".table("diplome")." ";
		$sql .= "WHERE DIPLOME_ID = :id_diplome";
		$requete = db_connexion::Executer_requete($sql, array("id_diplome" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_nom_d($tuple["NOM_D"]);
			$this->ecrire_niveau_d($tuple["NIVEAU_D"]);
			$this->ecrire_classement_d($tuple["CLASSEMENT_D"]);
		}
		parent::charger();
	}
}