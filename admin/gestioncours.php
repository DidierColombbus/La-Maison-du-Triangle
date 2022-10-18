<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("../inc/init.inc.php");

////// Attention, attention ! Cette page est en cours de travaux, car en attente de l'intégration des cours tant dans la BDD que sur le site proprement dit. Merci donc de ne pas en tenir compte pour le moment. 

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Gestion cours";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "gestion, cours, admin";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, le cdn Bootstrap ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $contenu (qui est une fonction écrite dans le fichier init.inc.php) -->

<div class="row container-fluid g-1">
    <?php
    echo $contenu;
    ?>
</div>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>