<?php

/**
 * Classe de gestion des tuples de la table personne
 */
class db_personne extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_personne	Identifiant de la personne
	 * @retour	vide
	 */
    public function __construct($id_personne) {
		$this->declarer("nom_id", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("prenom_id", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("mail_id", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("mail_cfbt", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("resp_form", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("descr_id", db_tuple::DB_TUPLE_CHAINE);
		parent::__construct("NUM_ID", $id_personne);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT NOM_ID, PRENOM_ID, MAIL_ID, MAIL_CFBT, RESP_FORM, DESCR_ID ";
		$sql .= "FROM ".table("personne")." ";
		$sql .= "WHERE NUM_ID = :id_personne";
		$requete = db_connexion::Executer_requete($sql, array("id_personne" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_nom_id($tuple["NOM_ID"]);
			$this->ecrire_prenom_id($tuple["PRENOM_ID"]);
			$this->ecrire_mail_id($tuple["MAIL_ID"]);
			$this->ecrire_mail_cfbt($tuple["MAIL_CFBT"]);
			$this->ecrire_resp_form($tuple["RESP_FORM"]);
			$this->ecrire_descr_id($tuple["DESCR_ID"]);
		}
		parent::charger();
	}
}