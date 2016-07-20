<?php

/**
 * Classe de gestion des tuples de la table form_diplo_adef
 */
class db_form_diplo_adef extends db_tuple {
	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_formation_adef	Identifiant de la formation
	 * @retour	vide
	 */
    public function __construct($id_formation_adef) {
		$this->declarer("equiv_cfbt_df", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("competences_df", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("suites_df", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("matieres_pro_df", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("matieres_gen_df", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("postes_vises_df", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("entreprises_visees_df", db_tuple::DB_TUPLE_CHAINE);
		parent::__construct("NUM_DF", $id_formation_adef);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT EQUIV_CFBT_DF, COMPETENCES_DF, SUITES_DF, MATIERES_PRO_DF, MATIERES_GEN_DF, POSTES_VISES_DF, ENTREPRISES_VISEES_DF ";
		$sql .= "FROM ".table("form_diplo_adef")." ";
		$sql .= "WHERE NUM_DF = :id_formation_adef";
		$requete = db_connexion::Executer_requete($sql, array("id_formation_adef" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_equiv_cfbt_df($tuple["EQUIV_CFBT_DF"]);
			$this->ecrire_competences_df($tuple["COMPETENCES_DF"]);
			$this->ecrire_suites_df($tuple["SUITES_DF"]);
			$this->ecrire_matieres_pro_df($tuple["MATIERES_PRO_DF"]);
			$this->ecrire_matieres_gen_df($tuple["MATIERES_GEN_DF"]);
			$this->ecrire_postes_vises_df($tuple["POSTES_VISES_DF"]);
			$this->ecrire_entreprises_visees_df($tuple["ENTREPRISES_VISEES_DF"]);
		}
		parent::charger();
	}
}