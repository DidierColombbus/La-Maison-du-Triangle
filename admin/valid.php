<?php

require_once("../inc/init.inc.php");

// Sur cette page à lieu à la fois la connexion (et renvoie alors sur admin/index.php), et l'echec de celle-ci, avec une invitation à revenir à la page de formproduit.

// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitvalid" :

    if(!empty($_POST['submitvalid'])) {
        extract($_POST);
        if(!empty($_POST)){
        $_POST['titre'] = htmlspecialchars($_POST['titre']);
        $_POST['description'] = htmlspecialchars($_POST['description']);
        $_POST['photo'] = htmlspecialchars($_POST['photo']);
        $_POST['site'] = htmlspecialchars($_POST['site']);
        // On utilise INSERT INTO pour entrer en BDD les informations du formulaire :
        $insert = $pdo->prepare("INSERT INTO spectacles(titre_spectacle, description_spectacle, photo_spectacle, site_spectacle) VALUES (:titre, :description, :photo, :site)");
        $insert->execute(array(
          ':titre' => $_POST['titre'],
          ':description' => $_POST['description'],
          ':photo' => $_POST['photo'],
          ':site' => $_POST['site']
        ));
        // On va vider la table spectacles_validation
        $void = $pdo->prepare("DELETE FROM spectacles_validation WHERE titre_spectacle = :titre");
        $void->execute(array(
          'titre_spectacle' => $_POST['titre']
        ));
        return header('location:index.php');
        exit;
      }else{
          // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page formcomptes.php 
          $content.= '<div class="container">';
          $content.= '<p>Une erreur s\'est produite !</p>';
          $content.= '<p>Veuillez remplir le formulaire ou nous contacter</p>';
          $content.= '<button class="text-light"><a href="comptes.php">Suivre le lapin blanc</a></button>';
          $content.= '</div>';
    
      }
    }
 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Erreur validation ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "validation, erreur, redirection";

require_once('inc/header.inc.php');

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content (qui est une fonction écrite dans le fichier init.inc.php) -->
<?php 

// Avec l'echo, $content va afficher la présentation du triangle, le carroussel dynamique et la présentation du site.
echo $content; 

?>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
 <?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>