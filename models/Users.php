<?php

/**
 * Class Users - Représente un compte utilisateur
 */
class Users
{
    public $id;
    public $nom;
    public $userName;
    public $pwd;
    public $email;
    public $tel;
    public $typeCompte;
    public $dateCnx;
    public $connected;
    public $bloqued;

    /**
     * Users constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->nom = $data['nom'];
        $this->userName = $data['username'];
        $this->pwd = $data['pwd'];
        $this->email = $data['email'];
        $this->tel = $data['tel'];
        $this->typeCompte = $data['type_compte'];
        $this->dateCnx = $data['date_cnx'];
        $this->connected = $data['connected'];
        $this->bloqued = $data['bloqued'];
    }

    /**
     * Renvoi la liste des utilisateurs.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM users ORDER BY nom");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Renvoi la liste des utilisateurs non bloqués.
     *
     * @return array
     */
    static function getAllBloquedFalse()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM users WHERE bloqued = ? ORDER BY nom");
        $req->execute([0]);
        return $req->fetchAll();
    }

    /**
     * Renvoi la liste des utilisateurs bloqués.
     *
     * @return array
     */
    static function getAllBloquedTrue()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM users WHERE bloqued = ? ORDER BY nom");
        $req->execute([1]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un utilisateur en fonction de son email.
     *
     * @param $email
     * @return mixed
     */
    static function getByEmail($email)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM users WHERE email = ?");
        $req->execute([$email]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer un utilisateur en fonction de son ID.
     *
     * @param $id
     * @return mixed
     */
    static function getById($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM users WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer un utilisateur en fonction de son nom d'utilisateur.
     *
     * @param $userName
     * @return mixed
     */
    static function getByUserName($userName)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM users WHERE username = ?");
        $req->execute([$userName]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer les utilisateurs connectés.
     *
     * @return array
     */
    static function getUserConnectedTrue()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM users WHERE connected = ?");
        $req->execute([1]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer les utilisateurs non connectés.
     *
     * @return array
     */
    static function getUserConnectedFalse()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM users WHERE connected = ?");
        $req->execute([0]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour insérer un utilisateur en base de données.
     *
     * @param $nom
     * @param $userName
     * @param $pwd
     * @param $email
     * @param $tel
     * @param $typeCompte
     * @return bool
     */
    static function insert($nom, $userName, $pwd, $email, $tel, $typeCompte)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO users(nom, username, pwd, email, tel, type_compte, connected, date_cnx) 
            VALUES(?, ?, ?, ?, ?, ?, ?, NOW())      
        ');
        return $req->execute([$nom, $userName, $pwd, $email, $tel, $typeCompte, 0]);
    }

    /**
     * Méthode pour modifier les informations d'un utilisateur
     * @param $nom
     * @param $userName
     * @param $pwd
     * @param $email
     * @param $tel
     * @param $typeCompte
     * @param $id
     * @return bool
     */
    static function update($nom, $userName, $pwd, $email, $tel, $typeCompte, $id)
    {
        global $db;

        $req = $db->prepare('
            UPDATE users SET nom = ?, username = ?, pwd = ?, email = ?, tel, type_compte = ?
            WHERE id = ?
        ');
        return $req->execute([$nom, $userName, $pwd, $email, $tel, $typeCompte, $id]);
    }

    /**
     * Méthode pour modifier le statut de connexion à vrai.
     *
     * @param $id
     * @return bool
     */
    static function updateStatusTrue($id) {
        global $db;

        $req = $db->prepare('UPDATE users SET connected = ?, date_cnx = ? WHERE id = ?');
        return $req->execute([1, date("Y-m-d H:i:s"), $id]);
    }

    /**
     * Méthode pour modifier le statut de connexion à faux.
     *
     * @param $id
     * @return bool
     */
    static function updateStatusFalse($id) {
        global $db;

        $req = $db->prepare('UPDATE users SET connected = ?, date_cnx = ? WHERE id = ?');
        return $req->execute([1, date("Y-m-d H:i:s"), $id]);
    }

    /**
     * Méthode pour désactiver le compte d'un utilisateur.
     *
     * @param $id
     * @return bool
     */
    static function desableUser($id) {
        global $db;

        $req = $db->prepare('UPDATE users SET bloqued = ? WHERE id = ?');
        return $req->execute([1, $id]);
    }

    /**
     * Méthode pour activer le compte d'un utilisateur.
     *
     * @param $id
     * @return bool
     */
    static function activeUser($id) {
        global $db;

        $req = $db->prepare('UPDATE users SET bloqued = ? WHERE id = ?');
        return $req->execute([0, $id]);
    }

    /**
     * Méthode pour supprimer un utilisateur.
     *
     * @param $id
     * @return bool
     */
    static function delete($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM users WHERE id = ?');
        return $req->execute([$id]);
    }
}