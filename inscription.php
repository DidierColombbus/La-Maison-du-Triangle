<?php

require_once("inc/init.inc.php");

// Sur cette page à lieu à la fois la connexion (et renvoie alors sur index.php), et l'echec de celle-ci, avec une invitation à revenir à la page de formcomptes.

// Ici commence la fonction if, dont les valeurs nous viennent de l'input "submitinscript" :

if (!empty($_POST['submitinscript'])) {
  extract($_POST);
  if (!empty($_POST)) {
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
    $_POST['mot_de_passe'] = htmlspecialchars($_POST['mot_de_passe']);
    $_POST['nom_membre'] = htmlspecialchars($_POST['nom_membre']);
    $_POST['prenom_membre'] = htmlspecialchars($_POST['prenom_membre']);
    $_POST['mail_membre'] = htmlspecialchars($_POST['mail_membre']);
    $_POST['telephone_membre'] = htmlspecialchars($_POST['telephone_membre']);
    $_POST['adresse_membre'] = htmlspecialchars($_POST['adresse_membre']);
    $avatarinsert = 'https://thiscatdoesnotexist.com/';

    // On utilise INSERT INTO pour entrer en BDD les informations du formulaire :

    $insert = $pdo->prepare("INSERT INTO membres(pseudo, mot_de_passe, nom_membre, prenom_membre, mail_membre, telephone_membre, adresse_membre, avatar) VALUES (:pseudo, :mot_de_passe, :nom_membre, :prenom_membre, :mail_membre, :telephone_membre, :adresse_membre, :avatar)");

    $insert->execute(array(
      ':pseudo' => $_POST['pseudo'],
      ':mot_de_passe' => $mot_de_passe,
      ':nom_membre' => $_POST['nom_membre'],
      ':prenom_membre' => $_POST['prenom_membre'],
      ':mail_membre' => $_POST['mail_membre'],
      ':telephone_membre' => $_POST['telephone_membre'],
      ':adresse_membre' => $_POST['adresse_membre'],
      ':avatar' => $avatarinsert
    ));
    // Utilisation du return header si tout se déroule bien :
    return header('location:index.php');
    exit;
  } else {
    // En cas d'erreur ou si le formulaire est incomplet on est invité à se connecter de nouveau sur la page formcomptes.php 
    $content .= '<div class="container">';
    $content .= '<p>Une erreur s\'est produite !</p>';
    $content .= '<p>Veuillez vous reconnecter ou vous inscrire</p>';
    $content .= '<button class="text-light"><a href="formcomptes.php">Suivre le lapin blanc</a></button>';
    $content .= '</div>';
  }
}


// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Erreur inscription ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "inscription, erreur, redirection";

require_once('inc/header.inc.php');

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content si nécessaire (qui est une fonction écrite dans le fichier init.inc.php) -->
<?php

echo $content;

?>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le footer.
require_once("inc/footer.inc.php");

?>