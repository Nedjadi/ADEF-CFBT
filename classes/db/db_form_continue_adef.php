<?php

/**
 * Classe de gestion des tuples de la table form_continue_adef
 */
class db_form_continue_adef extends db_tuple {
	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_formation_adef	Identifiant de la formation
	 * @retour	vide
	 */
    public function __construct($id_formation_adef) {
		$this->declarer("objectifs_fc", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("contenu_fc", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("prerequis_fc", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("cout_fc", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("dates_fc", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("formateur_1_fc", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("formateur_2_fc", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("formateur_3_fc", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("piece_1_fc", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("piece_2_fc", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		parent::__construct("NUM_FC", $id_formation_adef);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT OBJECTIFS_FC, CONTENU_FC, PREREQUIS_FC, COUT_FC, DATES_FC, FORMATEUR_1_FC, FORMATEUR_2_FC, FORMATEUR_3_FC, PIECE_1_FC, PIECE_2_FC ";
		$sql .= "FROM ".table("form_continue_adef")." ";
		$sql .= "WHERE NUM_FC = :id_formation_adef";
		$requete = db_connexion::Executer_requete($sql, array("id_formation_adef" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_objectifs_fc($tuple["OBJECTIFS_FC"]);
			$this->ecrire_contenu_fc($tuple["CONTENU_FC"]);
			$this->ecrire_prerequis_fc($tuple["PREREQUIS_FC"]);
			$this->ecrire_cout_fc($tuple["COUT_FC"]);
			$this->ecrire_dates_fc($tuple["DATES_FC"]);
			$this->ecrire_formateur_1_fc($tuple["FORMATEUR_1_FC"]);
			$this->ecrire_formateur_2_fc($tuple["FORMATEUR_2_FC"]);
			$this->ecrire_formateur_3_fc($tuple["FORMATEUR_3_FC"]);
			$this->ecrire_piece_1_fc($tuple["PIECE_1_FC"]);
			$this->ecrire_piece_2_fc($tuple["PIECE_2_FC"]);
		}
		parent::charger();
	}
}