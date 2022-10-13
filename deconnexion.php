<?php
require_once("inc/init.inc.php");

// Sur cette page à lieu à la fois la déconnexion (et renvoie alors sur index.php), et l'echec de celle-ci, avec une invitation à revenir à la page de formcomptes.

// On commence par rappeler les variables $pseudo et $mot_de_passe

$pseudo = htmlspecialchars($_POST['pseudo']);
$mot_de_passe = htmlspecialchars($_POST['mot_de_passe']); 

session_destroy();
return header('location:index.php');
exit;

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Erreur déconnexion ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "déconnexion, erreur, redirection";

require_once('inc/header.inc.php');
?>