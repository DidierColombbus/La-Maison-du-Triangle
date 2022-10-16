<?php

require_once("../inc/init.inc.php");

// Sur cette page à lieu à la fois la modification d'un produit (et renvoie alors sur admin/index.php), et l'echec de celle-ci, avec une invitation à revenir à la page de formproduit.

// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitmodif" :

if(!empty($_POST['submitmodif'])) {
    extract($_POST);
    if(!empty($_POST)){
    $_POST['id_produit'] = htmlspecialchars($_POST['id_produit']);
    $_POST['nom_produit'] = htmlspecialchars($_POST['nom_produit']);
    $_POST['reference_fournisseur'] = htmlspecialchars($_POST['reference_fournisseur']);
    $_POST['fournisseur'] = htmlspecialchars($_POST['fournisseur']);
    $_POST['description_produit'] = htmlspecialchars($_POST['description_produit']);
    $_POST['materiau'] = htmlspecialchars($_POST['materiau']);
    $_POST['prix_produit'] = htmlspecialchars($_POST['prix_produit']);
    $_POST['stock'] = htmlspecialchars($_POST['stock']);

    // On utilise UPDATE pour modifier en BDD les informations avec celles du formulaire :

    $modif = $pdo->prepare("UPDATE produits SET id_produit= :id_produit, nom_produit=:nom_produit,reference_fournisseur=:reference_fournisseur,fournisseur=fournisseur,description_produit=:description_produit,materiau=:materiau, prix_produit=:prix_produit,stock=:stock WHERE id_produit= :id_produit");
  
    $modif->execute(array(
      ':id_produit' => $_POST['id_produit'],
      ':nom_produit' => $_POST['nom_produit'],
      ':fournisseur' => $_POST['fournisseur'],
      ':reference_fournisseur' => $_POST['reference_fournisseur'],
      ':description_produit' => $_POST['description_produit'],
      ':materiau' => $_POST['materiau'],
      ':prix_produit' => $_POST['prix_produit'],
      ':stock' => $_POST['stock']
    ));
    // On est redirigé vers l'index.php si tout s'est bien passé :
    return header('location:index.php');
    exit;
  }else{
      // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page formproduit.php 
      $content.= '<div class="container">';
      $content.= '<p>Une erreur s\'est produite !</p>';
      $content.= '<p>Veuillez remplir à nouveau le formulaire en suivant les indications.</p>';
      $content.= '<button class="text-light"><a href="formproduit.php">Suivre le lapin blanc</a></button>';
      $content.= '</div>';

  }
}

// var_dump($modif);
var_dump($_POST);
 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Erreur modification ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "modification, erreur, redirection";

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