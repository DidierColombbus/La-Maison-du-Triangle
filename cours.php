<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Cours affiche les cours que nous proposons à nos clients.
// Il y a une description complète des cours, avec les âges proposés, un bouton de réservation, le nombre maximal de participants. 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Cours ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "cours, description, réservation";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, le cdn Bootstrap ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content (qui est une fonction écrite dans le fichier init.inc.php) -->
<!-- <?php 

// Avec l'echo, $content va afficher la présentation du triangle, le carroussel dynamique et la présentation du site.
echo $content; 

?> -->

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>