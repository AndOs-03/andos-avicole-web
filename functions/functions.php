<?php

/**
 * Échapper les caractères spéciaux et enlever les espaces pour sécuriser une chaine
 * @param $string
 * @return string
 */
function strSecur($string) {
    return trim(stripslashes(htmlspecialchars($string)));
}

/**
 * Pour vérifier les numéros de telephone
 * @param $var
 * @return int
 */
function verifiePhone($var){
    $pattern = '/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/';
    return preg_match($pattern, $var);
}

/** Vérifie si un mot de passe contient au moins 6 caractères
 * @param $var
 * @return boolean
 */
function verifiePass($var) {
    $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/';
    return preg_match($pattern, $var);
}

/**
 * Vérifier les si un email est bon
 * @param $var
 * @return mixed
 */
function verifieEmail($var){
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

/**
 * Fonction de récupération de l'adresse IP du visiteur
 * @param null
 * @return string
 */
function getIp(){
    if ( isset ( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif ( isset ( $_SERVER['HTTP_CLIENT_IP'] ) ){
        $ip  = $_SERVER['HTTP_CLIENT_IP'];
    }
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/** Debug plus lisible des différentes variables
 * @param $var
 */
function debug($var) {
    echo '<pre>';
    var_dump($var);
    exit();
    echo '</pre>';
}
