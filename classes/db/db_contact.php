<?php

/**
 * Classe de gestion des tuples de la table contact
 */
class db_contact extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_contact	Identifiant du contact
	 * @retour	vide
	 */
    public function __construct($id_contact) {
		$this->declarer("num_id", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("text_c", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("telefon_c", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("adef_c", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("cfbt_c", db_tuple::DB_TUPLE_BOOLEEN);
		parent::__construct("NUM_C", $id_contact);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT NUM_ID, TEXT_C, TELEFON_C, ADEF_C, CFBT_C ";
		$sql .= "FROM ".table("contact")." ";
		$sql .= "WHERE NUM_C = :id_contact";
		$requete = db_connexion::Executer_requete($sql, array("id_contact" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_num_id($tuple["NUM_ID"]);
			$this->ecrire_text_c($tuple["TEXT_C"]);
			$this->ecrire_telefon_c($tuple["TELEFON_C"]);
			$this->ecrire_adef_c($tuple["ADEF_C"]);
			$this->ecrire_cfbt_c($tuple["CFBT_C"]);
		}
		parent::charger();
	}
}