<?php

// Configuration du site
$titreSite = "Bienvenue sur notre Système de Gestion d'Articles";
$descriptionSite = "Apprenez PHP en créant et en gérant des articles en ligne.";
$uri = str_replace('/gestion-article-eni', '', $_SERVER['REQUEST_URI']);

// Connexion base de donnée
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "gestion_articles";
