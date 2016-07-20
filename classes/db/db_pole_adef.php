<?php

/**
 * Classe de gestion des tuples de la table pole_adef
 */
class db_pole_adef extends db_tuple {

	/**
	 * Constructeur
	 *
	 * @portée	public
	 * @param	id_pole	Identifiant du pole adef
	 * @retour	vide
	 */
    public function __construct($id_pole) {
		$this->declarer("libelle_pole", db_tuple::DB_TUPLE_CHAINE);
		$this->declarer("groupe_pole", db_tuple::DB_TUPLE_ENTIER);
		$this->declarer("hauteur_fixe", db_tuple::DB_TUPLE_BOOLEEN);
		parent::__construct("POLE_ID", $id_pole);
	}

	/**
	 * Chargeur
	 *
	 * @portée	public
	 * @retour	vide
	 */
	public function charger() {
		$sql = "SELECT LIBELLE_POLE, GROUPE_POLE, HAUTEUR_FIXE ";
		$sql .= "FROM ".table("pole_adef")." ";
		$sql .= "WHERE POLE_ID = :id_pole_adef";
		$requete = db_connexion::Executer_requete($sql, array("id_pole_adef" => $this->id));
		if ($tuple = $requete->fetch()) {
			$this->ecrire_libelle_pole($tuple["LIBELLE_POLE"]);
			$this->ecrire_groupe_pole($tuple["GROUPE_POLE"]);
			$this->ecrire_hauteur_fixe($tuple["HAUTEUR_FIXE"]);
		}
		parent::charger();
	}
}