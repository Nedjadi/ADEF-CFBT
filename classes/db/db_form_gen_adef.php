<?php

/**
 * Classe de gestion des tuples de la table form_gen_adef
 */
class db_form_gen_adef extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_formation_adef	Identifiant de la formation
	 * @retour	vide
	 */
    public function __construct($id_formation_adef) {
		$this->declarer("num_filiere_f", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("titre_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("url_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("diplomant_f", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("insertion_f", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("niveau_f", db_tuple::DB_TUPLE_ENTIER);
		$this->declarer("entete_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("urlfoto_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("f_indiv_f", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("difpdf_f", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("cp_pro_f", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("cif_f", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("prf_f", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("apprenti_f", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		parent::__construct("NUM_F", $id_formation_adef);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT NUM_FILIERE_F, TITRE_F, URL_F, DIPLOMANT_F, INSERTION_F, NIVEAU_F, ENTETE_F, URLFOTO_F, F_INDIV_F, DIFPDF_F, CP_PRO_F, CIF_F, PRF_F, APPRENTI_F ";
		$sql .= "FROM ".table("form_gen_adef")." ";
		$sql .= "WHERE NUM_F = :id_formation_adef";
		$requete = db_connexion::Executer_requete($sql, array("id_formation_adef" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_num_filiere_f($tuple["NUM_FILIERE_F"]);
			$this->ecrire_titre_f($tuple["TITRE_F"]);
			$this->ecrire_url_f($tuple["URL_F"]);
			$this->ecrire_diplomant_f($tuple["DIPLOMANT_F"]);
			$this->ecrire_insertion_f($tuple["INSERTION_F"]);
			$this->ecrire_niveau_f($tuple["NIVEAU_F"]);
			$this->ecrire_entete_f($tuple["ENTETE_F"]);
			$this->ecrire_urlfoto_f($tuple["URLFOTO_F"]);
			$this->ecrire_f_indiv_f($tuple["F_INDIV_F"]);
			$this->ecrire_difpdf_f($tuple["DIFPDF_F"]);
			$this->ecrire_cp_pro_f($tuple["CP_PRO_F"]);
			$this->ecrire_cif_f($tuple["CIF_F"]);
			$this->ecrire_prf_f($tuple["PRF_F"]);
			$this->ecrire_apprenti_f($tuple["APPRENTI_F"]);
		}
		parent::charger();
	}
}