<?php

require_once("../inc/init.inc.php");

// Sur cette page à lieu à la fois la validation du concert proposé (et renvoie alors sur admin/index.php), et l'echec de celle-ci, avec une invitation à revenir à la page de validconcert.

// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitvalid" :

if (!empty($_POST['submitvalid'])) {
  extract($_POST);
  if (!empty($_POST)) {
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
    // On va alors vider la table spectacles_validation avec DELETE FROM. On pourrait aussi garder ces informations pour entretenir un compte des concerts proposés par un membre.
    $void = $pdo->prepare("DELETE FROM spectacles_validation");
    $void->execute();
    return header('location:index.php');
    exit;
  } else {
    // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page validconcert.php 
    $contenu .= '<div class="container">';
    $contenu .= '<p>Une erreur s\'est produite !</p>';
    $contenu .= '<p>Veuillez remplir le formulaire ou nous contacter</p>';
    $contenu .= '<button class="text-light"><a href="validconcert.php">Suivre le lapin blanc</a></button>';
    $contenu .= '</div>';
  }
}


// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Erreur validation ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "validation, erreur, redirection";

require_once('inc/header.inc.php');

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $contenu si nécessaire(qui est une fonction écrite dans le fichier init.inc.php) -->
<?php

echo $contenu;

?>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>