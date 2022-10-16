<?php

require_once("inc/init.inc.php");

// Sur cette page à lieu à la fois l'ajout d'un avatar (et renvoie alors sur index.php), et l'echec de celui-ci, avec une invitation à revenir à la page de compte.php.

// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitavatar" :

if(!empty($_POST['submitavatar'])) {
    extract($_POST);
    if(!empty($_POST)){
    $_POST['avatar'] = htmlspecialchars($_POST['avatar']);

    // On utilise INSERT INTO pour entrer en BDD les informations du formulaire :
  
    $insert = $pdo->prepare("INSERT INTO membres(avatar) VALUES (:avatar) WHERE id_membre=:id_membre"); 
  
    $insert->execute(array(
      ':avatar' => $_POST['avatar'],
      ':id_membre' => $_SESSION['membres']['id_membre']
    ));
// On est redirigé vers index.php si tout s'est bien passé :
    return header('location:index.php');
    exit;
  }
}elseif (!empty($_POST['submitmodifavatar'])) {
    extract($_POST);
    if(!empty($_POST)){
    $_POST['avatar'] = htmlspecialchars($_POST['avatar']);

    // On utilise UPDATE pour modifier en BDD les informations avec celles du formulaire :

    $modif = $pdo->prepare("UPDATE membres SET avatar= :avatar where id_membre=:id_membre");

      // Je récupère l'id_membre via $_SESSION, merci à L.C qui se reconnaîtra :) pour cette astuce "toute simple".

    $modif->execute(array(
      ':avatar' => $_POST['avatar'],
      ':id_membre' => $_SESSION['membres']['id_membre']
    ));
    // On est redirigé vers index.php si tout s'est bien passé :
    return header('location:index.php');
    exit;
}

  }
  
  else{
      // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page compte.php 
      $content.= '<div class="container">';
      $content.= '<p>Une erreur s\'est produite !</p>';
      $content.= '<p>Veuillez remplir le formulaire selon les indications proposées.</p>';
      $content.= '<button class="text-light"><a href="compte.php">Suivre le lapin blanc</a></button>';
      $content.= '</div>';

  }

// var_dump($modif);
 

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