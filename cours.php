<?php

////////Attention attention ! Cette page est en travaux, elle n'existe que dans l'optique de l'intégration des cours à l'avenir, avec l'exploitation d'une table "cours" en BDD !

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Cours affichera les cours que nous proposerons à nos clients.
// Il y aura une description complète des cours, avec les âges proposés, un bouton de réservation, le nombre maximal de participants. 
$content .= '<div  class="bg-light container py-1">';
$content .= '<h1 class="bg-light"> ¯\_(ツ)_/¯ Pas encore disponible malheureusement !</h1><br>';
$content .= '<p class="bg-light">Nous sommes désolé, mais aucun cours n\'est encore ouvert actuellement. Vous pouvez nous contacter ici : <a href="contact.php">page contact</a> pour de plus amples informations à ce sujet.</p>';
$content .= '<p class="bg-light">Ces cours vous seront proposés dés que possible, et ils permettront à tout un chacun, débutant comme confirmé, de pratiquer le triangle en toute sérénité et bienveillance.</p>';
$content .= '</div>';

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Cours ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "cours, description, réservation";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, le cdn Bootstrap ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content si nécessaire (qui est une fonction écrite dans le fichier init.inc.php) -->
 <?php

echo $content; 

?> 

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>