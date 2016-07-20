<?php

/**
 * Classe de gestion des tuples de la table auteur_video
 */
class db_auteur_video extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_auteur	Identifiant de l'auteur
	 * @retour	vide
	 */
    public function __construct($id_auteur) {
		$this->declarer("nom_av", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("href_av", db_tuple::DB_TUPLE_CHAINE);
		parent::__construct("AUTEUR_VIDEO_ID", $id_auteur);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT NOM_AV, HREF_AV ";
		$sql .= "FROM ".table("auteur_video")." ";
		$sql .= "WHERE AUTEUR_VIDEO_ID = :id_auteur";
		$requete = db_connexion::Executer_requete($sql, array("id_auteur" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_nom_av($tuple["NOM_AV"]);
			$this->ecrire_href_av($tuple["HREF_AV"]);
		}
		parent::charger();
	}
}