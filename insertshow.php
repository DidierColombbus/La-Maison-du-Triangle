<?php

require_once("inc/init.inc.php");

// Insertion de concert avec traitement du formulaire pour l'insertion en BDD.
// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitshow" :

    if(!empty($_POST['submitshow'])) {
        extract($_POST);
        if(!empty($_POST)){
        $_POST['titre'] = htmlspecialchars($_POST['titre']);
        $_POST['description'] = htmlspecialchars($_POST['description']);
        $_POST['photo'] = htmlspecialchars($_POST['photo']);
        $_POST['site'] = htmlspecialchars($_POST['site']);
        // On utilise INSERT INTO pour entrer en BDD les informations du formulaire :
        $insert = $pdo->prepare("INSERT INTO spectacles_validation(titre, membre_id, description, photo, site) VALUES (:titre, :membre_id, :description, :photo, :site)");
        $insert->execute(array(
          ':titre' => $_POST['titre'],
          ':membre_id' => $_SESSION['membres']['id_membre'],
          ':description' => $_POST['description'],
          ':photo' => $_POST['photo'],
          ':site' => $_POST['site']
        ));
        // return header('location:compte.php');
        // exit;
      }else{
          // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page formcomptes.php 
          $content.= '<div class="container">';
          $content.= '<p>Une erreur s\'est produite !</p>';
          $content.= '<p>Veuillez remplir le formulaire ou nous contacter</p>';
          $content.= '<button class="text-light"><a href="comptes.php">Suivre le lapin blanc</a></button>';
          $content.= '</div>';
    
      }
    }

    var_dump($insert);

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Mes concerts ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "compte, commande, concerts";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, Bootstrap inclus, ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>