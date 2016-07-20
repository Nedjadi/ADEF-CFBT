<?php

/**
 * Classe de gestion des tuples de la table formation_cfbt
 */
class db_formation_cfbt extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_formation_cfbt	Identifiant de la formation
	 * @retour	vide
	 */
    public function __construct($id_formation_cfbt) {
		$this->declarer("num_diplome_f", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("num_filiere_f", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("url_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("titre_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("num_id", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("entete_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("debouche_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("objectif_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("suites_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("deroul_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("dom_pro_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("dom_gen_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("admis_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("lieu_f", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("accueil_f", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("pdf_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("prefixe_img_f", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("der_session_f", db_tuple::DB_TUPLE_ENTIER);
		$this->declarer("dip_remplacement_f", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("est_ferme_f", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("maj_f", db_tuple::DB_TUPLE_HORODATAGE);
		$this->declarer("vignette_f", db_tuple::DB_TUPLE_CHAINE);	
		$this->declarer("alternance_f", db_tuple::DB_TUPLE_CHAINE);
		parent::__construct("NUM_F", $id_formation_cfbt);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT NUM_DIPLOME_F, NUM_FILIERE_F, URL_F, TITRE_F, NUM_ID, ENTETE_F, DEBOUCHE_F, OBJECTIF_F, SUITES_F, DEROUL_F, DOM_PRO_F, DOM_GEN_F, ADMIS_F, LIEU_F, ACCUEIL_F, PDF_F, PREFIXE_IMG_F, DER_SESSION_F, DIP_REMPLACEMENT_F, EST_FERME_F, MAJ_F, VIGNETTE_F, ALTERNANCE_F ";
		$sql .= "FROM ".table("formation_cfbt")." ";
		$sql .= "WHERE NUM_F = :id_formation_cfbt";
		$requete = db_connexion::Executer_requete($sql, array("id_formation_cfbt" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_num_diplome_f($tuple["NUM_DIPLOME_F"]);
			$this->ecrire_num_filiere_f($tuple["NUM_FILIERE_F"]);
			$this->ecrire_url_f($tuple["URL_F"]);
			$this->ecrire_titre_f($tuple["TITRE_F"]);
			$this->ecrire_num_id($tuple["NUM_ID"]);
			$this->ecrire_entete_f($tuple["ENTETE_F"]);
			$this->ecrire_debouche_f($tuple["DEBOUCHE_F"]);
			$this->ecrire_objectif_f($tuple["OBJECTIF_F"]);
			$this->ecrire_suites_f($tuple["SUITES_F"]);
			$this->ecrire_deroul_f($tuple["DEROUL_F"]);
			$this->ecrire_dom_pro_f($tuple["DOM_PRO_F"]);
			$this->ecrire_dom_gen_f($tuple["DOM_GEN_F"]);
			$this->ecrire_admis_f($tuple["ADMIS_F"]);
			$this->ecrire_lieu_f($tuple["LIEU_F"]);
			$this->ecrire_accueil_f($tuple["ACCUEIL_F"]);
			$this->ecrire_pdf_f($tuple["PDF_F"]);
			$this->ecrire_prefixe_img_f($tuple["PREFIXE_IMG_F"]);
			$this->ecrire_der_session_f($tuple["DER_SESSION_F"]);
			$this->ecrire_dip_remplacement_f($tuple["DIP_REMPLACEMENT_F"]);
			$this->ecrire_est_ferme_f($tuple["EST_FERME_F"]);
			$this->ecrire_maj_f($tuple["MAJ_F"]);
			$this->ecrire_vignette_f($tuple["VIGNETTE_F"]);
			$this->ecrire_alternance_f($tuple["ALTERNANCE_F"]);
		}
		parent::charger();
	}
}