<?php

require_once("../inc/init.inc.php");

// Sur cette page à lieu à la fois la connexion (et renvoie alors sur admin/index.php), et l'echec de celle-ci, avec une invitation à revenir à la page de formproduit.

// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitsupprimer" :

if(!empty($_POST['submitsupprimer'])) {
    extract($_POST);
    if(!empty($_POST)){
    $_POST['nom_produit'] = htmlspecialchars($_POST['nom_produit']);

    // On utilise DELETE pour effacer en BDD le produit dont le nom correspond au formulaire :

    $suppr = $pdo->prepare("DELETE FROM produits WHERE nom_produit=:nom_produit");
  
    $suppr->execute(array(
      ':nom_produit' => $_POST['nom_produit']
    ));

    return header('location:index.php');
    exit;
  }else{
      // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page formcomptes.php 
      $content.= '<div class="container">';
      $content.= '<p>Une erreur s\'est produite !</p>';
      $content.= '<p>Veuillez vous reconnecter ou vous inscrire</p>';
      $content.= '<button class="text-light"><a href="formcomptes.php">Suivre le lapin blanc</a></button>';
      $content.= '</div>';
      return header('location:../index.php');
      exit;
  }
}

// var_dump($suppr);
 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Erreur inscription ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "inscription, erreur, redirection";

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