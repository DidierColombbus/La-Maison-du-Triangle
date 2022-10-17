<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("inc/init.inc.php");

// Concerts est la page où sont affichés tous les concerts et les informations correspondantes.
// Les concerts seront affichés avec des cards "horizontales" comme pour les produits plus tard.

$requete_spectacles = $pdo->query('SELECT * FROM spectacles');
while ($spectacle = $requete_spectacles->fetch(PDO::FETCH_ASSOC)) {

    $content .= '<div class="card border-dark w-50  text-start">';

    $content .= '<div class="row g-0">';

    $content .= '<div class="col-sm-5">';
    $content .= '<img class="card-img-top h-auto" src="./img/concertsimg/' . $spectacle['photo_spectacle'] . '" alt="' . $spectacle['titre_spectacle'] . '">';
    $content .= '</div>';

    $content .= '<div class="col-sm-7">';
    $content .= '<div class="card-body">';
    $content .= '<h4 class="card-title">' . $spectacle['titre_spectacle'] . '</h4>';
    $content .= '<p class="card-text">' . substr($spectacle['description_spectacle'], 0, 475) . '</p>';
    $content .= '<a href="' . $spectacle['site_spectacle'] . '" class="btn btn-outline-light btn-block text-dark text-decoration-underline" target="_blank">Voir le site du spectacle !</a>';
    $content .= '</div>';
    $content .= '</div>';

    $content .= '</div>';
    $content .= '</div>';
}

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Les concerts ";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "concerts, spectacles, liens";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, le cdn Bootstrap ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $content (qui est une fonction écrite dans le fichier init.inc.php) -->
<div class="row g-1">
    <?php
    echo $content;
    ?>
</div>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>