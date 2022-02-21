<?php

/**
 * Class AchatProduitsEntretien - Représente un achat de produit d'entretien de bâtiment
 */
class AchatProduitsEntretien
{
    public $id;
    public $dates;
    public $montant;
    public $validiteJrs;
    public $produit;
    public $fournisseur;
    public $batiment;
    public $codeAchat;
    public $code;

    /**
     * AchatProduitsEntretien constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM acheter_produit_entretient WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->dates = $data['dates'];
        $this->montant = $data['montant'];
        $this->validiteJrs = $data['validite_jrs'];
        $this->produit = $data['produit'];
        $this->fournisseur = $data['fournisseur'];
        $this->batiment = $data['batiment'];
        $this->codeAchat = $data['code_achat'];
        $this->code = $data['code'];
    }

    /**
     * Renvoi la liste des achats de produits d'entretien.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM acheter_produit_entretient ORDER BY dates DESC");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un achat de produit d'entretien en fonction de son ID.
     *
     * @param $id
     * @return mixed
     */
    static function getById($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM acheter_produit_entretient WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode pour insérer un achat de produit d'entretien dans la base de données.
     *
     * @param $dates
     * @param $montant
     * @param $validiteJrs
     * @param $produit
     * @param $fournisseur
     * @param $batiment
     * @param $codeAchat
     * @param $code
     * @return bool
     */
    static function insert($dates, $montant, $validiteJrs, $produit, $fournisseur, $batiment, $codeAchat, $code)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO acheter_produit_entretient(dates, montant, validite_jrs, produit, fournisseur, batiment, code_achat, code) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$dates, $montant, $validiteJrs, $produit, $fournisseur, $batiment, $codeAchat, $code]);
    }

    /**
     * Méthode pour modifier les informations d'un achat de produit d'entretien
     *
     * @param $dates
     * @param $montant
     * @param $validiteJrs
     * @param $produit
     * @param $fournisseur
     * @param $batiment
     * @param $codeAchat
     * @param $code
     * @param $id
     * @return bool
     */
    static function update($dates, $montant, $validiteJrs, $produit, $fournisseur, $batiment, $codeAchat, $code, $id)
    {
        global $db;

        $req = $db->prepare('
            UPDATE acheter_produit_entretient SET dates = ?, montant = ?, validite_jrs = ?, fournisseur = ?,  
            produit = ?, batiment = ?, code_achat = ?, code = ? WHERE id = ?
        ');
        return $req->execute([$dates, $montant, $validiteJrs, $produit, $fournisseur, $batiment, $codeAchat, $code, $id]);
    }

    /**
     * Méthode pour supprimer un achat de produit d'entretien
     *
     * @param $id
     * @return bool
     */
    static function delete($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM acheter_produit_entretient WHERE id = ?');
        return $req->execute([$id]);
    }
}