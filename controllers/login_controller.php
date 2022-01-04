<?php

// Vérification des cookies
if (isset($_COOKIE['resterConnecter'])) {
    $email = $_COOKIE['resterConnecter'];
    $userBdd = Users::getByEmail($email);

    $userBdd['pwd'] = null;
    $_SESSION['user'] = $userBdd;

    header("Location: index.php?page=home");
}
if (isset($_SESSION['user'])) {
    header("Location: index.php?page=home");
}

if (isset($_POST['btn_login'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');

    $loginId = strSecur($_POST['loginId']);
    $password = strSecur($_POST['password']);
    $resterConnecter = $_POST['resterConnecter'];

    $userBdd = Users::getByEmail($loginId);
    if ($userBdd['email'] == $loginId && password_verify($password, $userBdd['pwd'])) {
        if ($userBdd['bloqued'] == 1) {
            $erreur = "Votre compte est verrouillé.";
            echo json_encode([
                'erreur' => $erreur
            ]);
        }
        else {
            echo json_encode(['result' => 'ok']);
            Users::updateStatusTrue($userBdd['id']);
            $userBdd['pwd'] = null;
            $userBdd[3] = null;
            $_SESSION['user'] = $userBdd;

            // Définition des cookies
            if (isset($resterConnecter)) {
                setcookie('resterConnecter', $userBdd['email'], time() + 60 * 60 * 24 * 30, "/", null, false, true);
            }
        }
    }
    else {
        $erreur = "E-mail ou mot de passe incorrect.";
        echo json_encode([
            'erreur' => $erreur
        ]);
    }
}