<?php

require_once("../inc/init.inc.php");

// Sur cette page à lieu à la fois l'ajout d'un produit (et renvoie alors sur admin/index.php), et l'echec de celui-ci, avec une invitation à revenir à la page de formproduit.

// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitajout" :

if(!empty($_POST['submitajout'])) {
    extract($_POST);
    if(!empty($_POST)){
    $_POST['nom_produit'] = htmlspecialchars($_POST['nom_produit']);
    $_POST['reference_fournisseur'] = htmlspecialchars($_POST['reference_fournisseur']);
    $_POST['fournisseur'] = htmlspecialchars($_POST['fournisseur']);
    $_POST['description_produit'] = htmlspecialchars($_POST['description_produit']);
    $_POST['materiau'] = htmlspecialchars($_POST['materiau']);
    $_POST['prix_produit'] = htmlspecialchars($_POST['prix_produit']);
    $_POST['type_produit'] = htmlspecialchars($_POST['type_produit']);
    $_POST['stock'] = htmlspecialchars($_POST['stock']);

    // On utilise INSERT INTO pour entrer en BDD les informations du formulaire :
  
    $insert = $pdo->prepare("INSERT INTO produits(nom_produit, reference_fournisseur, fournisseur, description_produit, materiau, prix_produit, type_produit, stock) VALUES (:nom_produit, :reference_fournisseur, :fournisseur, :description_produit, :materiau, :prix_produit, :type_produit, :stock)"); 
  
    $insert->execute(array(
      ':nom_produit' => $_POST['nom_produit'],
      ':fournisseur' => $_POST['fournisseur'],
      ':reference_fournisseur' => $_POST['reference_fournisseur'],
      ':description_produit' => $_POST['description_produit'],
      ':materiau' => $_POST['materiau'],
      ':prix_produit' => $_POST['prix_produit'],
      ':type_produit' => $_POST['type_produit'],
      ':stock' => $_POST['stock']
    ));
    // On retourne sur l'index si tout s'est bien passé :
    return header('location:index.php');
    exit;
  }else{
      // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page formproduit.php 
      $content.= '<div class="container">';
      $content.= '<p>Une erreur s\'est produite !</p>';
      $content.= '<p>Veuillez remplir les champs du formulaire selon les indications.</p>';
      $content.= '<button class="text-light"><a href="formproduit.php">Suivre le lapin blanc</a></button>';
      $content.= '</div>';

  }
}
 

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