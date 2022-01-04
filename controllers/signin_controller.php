<?php

if (isset($_POST['btn_signin'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');

    $nomPrenom = strSecur($_POST['nomPrenom']);
    $email = strSecur($_POST['email']);
    $tel = strSecur($_POST['tel']);
    $userName = strSecur($_POST['userName']);
    $password = strSecur($_POST['password']);
    $confPassword = strSecur($_POST['confPassword']);
    $typeCompte = strSecur($_POST['typeCompte']);

    $e_email = $e_tel = $e_pass = $e_passConf = $e_nom = $e_userName = "";

    $succes = true;

    if (!verifieEmail($email)) {
        $e_email = "E-mail invalide.";
        $succes = false;
    }

    if (!verifiePhone($tel)) {
        $e_tel = "Numéro de téléphone invalide.";
        $succes = false;
    }

    if (!verifiePass($password)) {
        $e_pass = "Mot de passe invalide (min 6 caractères, une majuscule et une minuscule).";
        $succes = false;
    }

    if ($password != $confPassword) {
        $e_passConf = "Les deux mots de passe ne correspondent pas.";
        $succes = false;
    }

    if (empty($nomPrenom)) {
        $e_nom = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($userName)) {
        $e_userName = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($succes) {
        $userBdd = Users::getByEmail($email);
        if ($userBdd['email'] == $email) {
            $erreur = "Cet adresse email est déjà utilisée";
            echo json_encode([
                'erreur' => $erreur,
                'success' => "existe"
            ]);
        }
        else {
            $options = [
                'cost' => 12,
            ];
            $hash_mot_pass = password_hash($password, PASSWORD_BCRYPT, $options);

            if (Users::insert($nomPrenom, $userName, $hash_mot_pass, $email, $tel, $typeCompte)) {
                $erreur = "Compte crée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'erreur' => $erreur
                ]);
            }
            else {
                $erreur = "Erreur lors de la création du compte.";
                echo json_encode([
                    'success' => 'non',
                    'erreur' => $erreur
                ]);
            }
        }
    }
    else {
        echo json_encode([
            'success' => 'false',
            'email' => $e_email,
            'tel' => $e_tel,
            'pass' => $e_pass,
            'passConf' =>$e_passConf,
            'nom' =>$e_nom,
            'userName' =>$e_userName
        ]);
    }
}