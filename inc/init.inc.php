<?php

// Connexion à la BDD lamaisondutriangle
$pdo = new PDO('mysql:host=localhost;dbname=lamaisondutriangle','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// var_dump($pdo);

// Variable pour rendre le html dynamique, marchera avec tous les echo nécessaires à l'affichage
$contenu = "";

// Ouverture d'une session
session_start();

// Définition de constantes
define("RACINE_SITE", $_SERVER["DOCUMENT_ROOT"] . "/lamaisondutriangle/");
define("URL", "http://" .$_SERVER["HTTP_HOST"] . "/lamaisondutriangle/");

// Ici avec les echos on peut montrer le dossier d'origine ainsi que l'url
// echo 'Le dossier vers notre site est : ' . RACINE_SITE . '<br>';
// echo 'L\' URL vers notre site est : ' . URL;

// Avec le require suivant on peut utiliser les fonctions dans toutes les pages où init est appelé
require_once("fonctions.inc.php");

?>
