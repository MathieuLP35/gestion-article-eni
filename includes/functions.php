<?php

require_once "includes/config.php";

function isActive($uri, $page){
    return in_array($uri, ['/', '/'.$page.'.php']);
}

function uri($uri){
    return str_replace('/'.$uri, '', $_SERVER['REQUEST_URI']);
}

function checkPassword($chaine) {
    // Vérifier la présence d'au moins un chiffre
    $chiffre_present = preg_match('/\d/', $chaine);

    // Vérifier la présence d'au moins une majuscule
    $majuscule_present = preg_match('/[A-Z]/', $chaine);

    // Vérifier la présence d'au moins une minuscule
    $minuscule_present = preg_match('/[a-z]/', $chaine);

    // Vérifier si tous les critères sont satisfaits
    if ($chiffre_present && $majuscule_present && $minuscule_present) {
        return true;
    } else {
        return false;
    }
}

function utf8($chaine){
    return mb_convert_encoding($chaine, 'UTF-8', 'ISO-8859-1');
}


function connectBDD()
{
    global $serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees;

    try {
        // Connexion à la base de données avec PDO en UTF-8
        $connexion = new PDO("mysql:host=$serveur;dbname=$nom_base_de_donnees;charset=utf8", $utilisateur, $mot_de_passe);

        $connexion->exec("SET CHARACTER SET utf8");

        // Configuration pour afficher les erreurs SQL
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connexion;
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, afficher l'erreur
        die("La connexion a échoué : " . $e->getMessage());
    }
}



