<?php

/**
 * Classe de gestion des tuples de la table news_adef
 */
class db_news_adef extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_news_adef	Identifiant de la news
	 * @retour	vide
	 */
    public function __construct($id_news_adef) {
		$this->declarer("titre_adef_n", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("text_adef_n", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("maj_adef_n", db_tuple::DB_TUPLE_HORODATAGE);
		$this->declarer("foto_adef_n", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("alt_foto_n", db_tuple::DB_TUPLE_BOOLEEN);
		$this->declarer("affichage_n", db_tuple::DB_TUPLE_ENTIER);
		parent::__construct("NUM_ADEF_N", $id_news_adef);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT TITRE_ADEF_N, TEXT_ADEF_N, MAJ_ADEF_N, FOTO_ADEF_N, ALT_FOTO_N, AFFICHAGE_N ";
		$sql .= "FROM ".table("news_adef")." ";
		$sql .= "WHERE NUM_ADEF_N = :id_news_adef";
		$requete = db_connexion::Executer_requete($sql, array("id_news_adef" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_titre_adef_n($tuple["TITRE_ADEF_N"]);
			$this->ecrire_text_adef_n($tuple["TEXT_ADEF_N"]);
			$this->ecrire_maj_adef_n($tuple["MAJ_ADEF_N"]);
			$this->ecrire_foto_adef_n($tuple["FOTO_ADEF_N"]);
			$this->ecrire_alt_foto_n($tuple["ALT_FOTO_N"]);
			$this->ecrire_affichage_n($tuple["AFFICHAGE_N"]);
		}
		parent::charger();
	}
}