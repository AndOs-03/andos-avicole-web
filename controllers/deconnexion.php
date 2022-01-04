<?php
session_start();

if (isset($_GET['logout'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');

    $user = $_SESSION['user'];
    $id = $user['id'];
    Users::updateStatusFalse($id);

    //Fermer la session de l'utilisateur connecté sur l'ordinateur
    setcookie('resterConnecter', '', time() - 3600, '/');
    session_destroy();
    header('Location: ../index.php');
}
