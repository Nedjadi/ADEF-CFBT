<?php

/**
 * Classe de gestion des tuples de la table filiere
 */
class db_filiere extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_filiere	Identifiant de l'filiere
	 * @retour	vide
	 */
    public function __construct($id_filiere) {
		$this->declarer("nom_s", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("pole_cfbt_s", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("nom_metiers_s", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("resp_s", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("coord_s", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("prefixe_img_s", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("vignette_s", db_tuple::DB_TUPLE_CHAINE);
		parent::__construct("SECTION_ID", $id_filiere);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT NOM_S, POLE_CFBT_S, NOM_METIERS_S, RESP_S, COORD_S, PREFIXE_IMG_S, VIGNETTE_S ";
		$sql .= "FROM ".table("filiere")." ";
		$sql .= "WHERE SECTION_ID = :id_filiere";
		$requete = db_connexion::Executer_requete($sql, array("id_filiere" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_nom_s($tuple["NOM_S"]);
			$this->ecrire_pole_cfbt_s($tuple["POLE_CFBT_S"]);
			$this->ecrire_nom_metiers_s($tuple["NOM_METIERS_S"]);
			$this->ecrire_resp_s($tuple["RESP_S"]);
			$this->ecrire_coord_s($tuple["COORD_S"]);
			$this->ecrire_prefixe_img_s($tuple["PREFIXE_IMG_S"]);
			$this->ecrire_vignette_s($tuple["VIGNETTE_S"]);
		}
		parent::charger();
	}
}