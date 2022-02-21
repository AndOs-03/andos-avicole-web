<?php

/**
 * Class Fournisseurs - Représente une entité de fournisseur d'une ferme de volaille
 */
class Fournisseurs
{
    public $id;
    public $nom;
    public $localite;
    public $contact;
    public $service;

    /**
     * Fournisseurs constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM fournisseurs WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->nom = $data['nom'];
        $this->localite = $data['localite'];
        $this->contact = $data['contact'];
        $this->service = $data['service'];
    }

    /**
     * Renvoi la liste des fournisseurs.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM fournisseurs ORDER BY nom");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un fournisseur en fonction de son ID.
     *
     * @param $id
     * @return mixed
     */
    static function getById($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM fournisseurs WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode pour insérer un fournisseur dans la base de données.
     *
     * @param $nom
     * @param $localite
     * @param $contact
     * @param $service
     * @return bool
     */
    static function insert($nom, $localite, $contact, $service)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO fournisseurs(nom, localite, contact, service) 
            VALUES(?, ?, ?, ?)      
        ');
        return $req->execute([$nom, $localite, $contact, $service]);
    }

    /**
     * Méthode pour modifier les informations d'un fournisseur
     *
     * @param $nom
     * @param $localite
     * @param $contact
     * @param $service
     * @param $id
     * @return bool
     */
    static function update($nom, $localite, $contact, $service, $id)
    {
        global $db;

        $req = $db->prepare('
            UPDATE fournisseurs SET nom = ?, localite = ?, contact = ?, service = ?  
            WHERE id = ?
        ');
        return $req->execute([$nom, $localite, $contact, $service, $id]);
    }

    /**
     * Méthode pour supprimer un fournisseur
     *
     * @param $id
     * @return bool
     */
    static function delete($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM fournisseurs WHERE id = ?');
        return $req->execute([$id]);
    }
}