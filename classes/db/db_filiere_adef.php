<?php

/**
 * Classe de gestion des tuples de la table filiere_adef
 */
class db_filiere_adef extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_filiere	Identifiant de l'filiere
	 * @retour	vide
	 */
    public function __construct($id_filiere) {
		$this->declarer("pole_s", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("nom_s", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("url_s", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("resp_s", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("coord_s", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("img_filiere_s", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("left_sprite_s", db_tuple::DB_TUPLE_ENTIER);
		$this->declarer("video_embed_1", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("auteur_video_1", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("titre_video_1", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("video_embed_2", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("auteur_video_2", db_tuple::DB_TUPLE_CLE_ETRANGERE);
		$this->declarer("titre_video_2", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("src_page_descr_s", db_tuple::DB_TUPLE_CHAINE);
		parent::__construct("SECTION_ID", $id_filiere);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT POLE_S, NOM_S, URL_S, RESP_S, COORD_S, IMG_FILIERE_S, LEFT_SPRITE_S, VIDEO_EMBED_1, AUTEUR_VIDEO_1, TITRE_VIDEO_1, VIDEO_EMBED_2, AUTEUR_VIDEO_2, TITRE_VIDEO_2, SRC_PAGE_DESCR_S ";
		$sql .= "FROM ".table("filiere_adef")." ";
		$sql .= "WHERE SECTION_ID = :id_filiere";
		$requete = db_connexion::Executer_requete($sql, array("id_filiere" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_pole_s($tuple["POLE_S"]);
			$this->ecrire_nom_s($tuple["NOM_S"]);
			$this->ecrire_url_s($tuple["URL_S"]);
			$this->ecrire_resp_s($tuple["RESP_S"]);
			$this->ecrire_coord_s($tuple["COORD_S"]);
			$this->ecrire_img_filiere_s($tuple["IMG_FILIERE_S"]);
			$this->ecrire_left_sprite_s($tuple["LEFT_SPRITE_S"]);
			$this->ecrire_video_embed_1($tuple["VIDEO_EMBED_1"]);
			$this->ecrire_auteur_video_1($tuple["AUTEUR_VIDEO_1"]);
			$this->ecrire_titre_video_1($tuple["TITRE_VIDEO_1"]);
			$this->ecrire_video_embed_2($tuple["VIDEO_EMBED_2"]);
			$this->ecrire_auteur_video_2($tuple["AUTEUR_VIDEO_2"]);
			$this->ecrire_titre_video_2($tuple["TITRE_VIDEO_2"]);
			$this->ecrire_src_page_descr_s($tuple["SRC_PAGE_DESCR_S"]);
		}
		parent::charger();
	}
}