<?php

/**
 * Class ProduitsEntretien - Représente une entité de produit d'entretien de bâtiment d'une ferme de volaille
 */
class ProduitsEntretien
{
    public $id;
    public $libelle;

    /**
     * ProduitsEntretien constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM produit_entretient WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->libelle = $data['libelle'];
    }

    /**
     * Renvoi la liste des produits d'entretien.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM produit_entretient ORDER BY libelle");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un produit d'entretien en fonction de son ID.
     *
     * @param $id
     * @return mixed
     */
    static function getById($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM produit_entretient WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer un produit d'entretien en fonction de son libellé
     *
     * @param $libelle
     * @return mixed
     */
    static function getByLibelle($libelle)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM produit_entretient WHERE libelle = ?");
        $req->execute([$libelle]);
        return $req->fetch();
    }

    /**
     * Méthode pour insérer un produit d'entretien dans la base de données.
     *
     * @param $libelle
     * @return bool
     */
    static function insert($libelle)
    {
        global $db;
        $req = $db->prepare('INSERT INTO produit_entretient(libelle) VALUES(?)');
        return $req->execute([$libelle]);
    }

    /**
     * Méthode pour modifier les informations d'un produit d'entretien
     *
     * @param $libelle
     * @param $id
     * @return bool
     */
    static function update($libelle, $id)
    {
        global $db;
        $req = $db->prepare('UPDATE produit_entretient SET libelle = ? WHERE id = ?');
        return $req->execute([$libelle, $id]);
    }

    /**
     * Méthode pour supprimer un produit d'entretien
     *
     * @param $id
     * @return bool
     */
    static function delete($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM produit_entretient WHERE id = ?');
        return $req->execute([$id]);
    }
}