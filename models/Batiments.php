<?php

/**
 * Class Batiments - Représente une entité de bâtiment d'une ferme de volaille
 */
class Batiments
{
    public $id;
    public $libelle;
    public $capacite;
    public $type;
    public $stockActuel;

    /**
     * Batiments constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM batiments WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->libelle = $data['libelle'];
        $this->capacite = $data['capacite'];
        $this->type = $data['type'];
        $this->stockActuel = $data['stock_actuel'];
    }

    /**
     * Renvoi la liste des bâtiments.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM batiments ORDER BY libelle");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Renvoi la dernière ligne.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM batiments ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode pour récupérer un bâtiment en fonction de son ID.
     *
     * @param $id
     * @return mixed
     */
    static function getById($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM batiments WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer un bâtiment en fonction de son libellé.
     *
     * @param $libelle
     * @return mixed
     */
    static function getByLibelle($libelle)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM batiments WHERE libelle = ?");
        $req->execute([$libelle]);
        return $req->fetch();
    }

    /**
     * Renvois le nombre total de bâtiments.

     * @return int
    */
    static function getCount()
    {
        global $db;
        $req = $db->prepare('SELECT COUNT(*) FROM batiments');
        $req->execute([]);
        return $req->rowCount();
    }

    /**
     * Méthode pour insérer un bâtiment dans la base de données.
     *
     * @param $libelle
     * @param $capacite
     * @param $type
     * @param $stockActuel
     * @return bool
     */
    static function insert($libelle, $capacite, $type, $stockActuel)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO batiments(libelle, capacite, type, stock_actuel) 
            VALUES(?, ?, ?, ?)      
        ');
        return $req->execute([$libelle, $capacite, $type, $stockActuel]);
    }

    /**
     * Méthode pour insérer un bâtiment dans la base de données avec le stock par défaut.
     *
     * @param $libelle
     * @param $capacite
     * @param $type
     * @return bool
     */
    static function insertWithoutStock($libelle, $capacite, $type)
    {
        global $db;

        $req = $db->prepare('INSERT INTO batiments(libelle, capacite, type) VALUES(?, ?, ?)');
        return $req->execute([$libelle, $capacite, $type]);
    }

    /**
     * Méthode pour modifier les informations d'un bâtiment
     *
     * @param $libelle
     * @param $capacite
     * @param $type
     * @param $stockActuel
     * @param $id
     * @return bool
     */
    static function update($libelle, $capacite, $type, $stockActuel, $id)
    {
        global $db;

        $req = $db->prepare('
            UPDATE batiments SET libelle = ?, capacite = ?, type = ?, stock_actuel = ?  
            WHERE id = ?
        ');
        return $req->execute([$libelle, $capacite, $type, $stockActuel, $id]);
    }

    /**
     * Méthode pour modifier les informations d'un bâtiment avec le stock par défaut.
     *
     * @param $libelle
     * @param $capacite
     * @param $type
     * @param $id
     * @return bool
     */
    static function updateWithoutStock($libelle, $capacite, $type, $id)
    {
        global $db;

        $req = $db->prepare('
            UPDATE batiments SET libelle = ?, capacite = ?, type = ? 
            WHERE id = ?
        ');
        return $req->execute([$libelle, $capacite, $type, $id]);
    }

    /**
     * Méthode pour modifier le stock actuel d'un bâtiment.
     *
     * @param $stockActuel
     * @param $id
     * @return bool
     */
    static function updateStok($stockActuel, $id) {
        global $db;

        $req = $db->prepare('UPDATE batiments SET stock_actuel = ? WHERE id = ?');
        return $req->execute([$stockActuel, $id]);
    }

    /**
     * Méthode pour supprimer un bâtiment
     *
     * @param $id
     * @return bool
     */
    static function delete($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM batiments WHERE id = ?');
        return $req->execute([$id]);
    }
}