<?php

// Avec le require_once suivant nous allons lier la page index avec la BDD.
require_once("../inc/init.inc.php");

// gestionconcerts.php va permettre à l'admin de valider manuellement le concert proposé par un membre. Je pense qu'à terme il pourra aussi le supprimer, voir le modifier comme un produit normal.

// Tout d'abord l'affichage des spectacles déjà autorisés :

$requete_spectacles = $pdo->query('SELECT * FROM spectacles');
while ($spectacle = $requete_spectacles->fetch(PDO::FETCH_ASSOC)) {

    $contenu .= '<div class="card border-dark col-lg-6 col-md-6 col-sm-10 container-fluid">';

    $contenu .= '<div class="row g-0">';

    $contenu .= '<div class="col-sm-4">';
    $contenu .= '<img class="card-img-top h-auto" src="../img/concertsimg/' . $spectacle['photo_spectacle'] . '" alt="' . $spectacle['titre_spectacle'] . '">';
    $contenu .= '</div>';

    $contenu .= '<div class="col-sm-8">';
    $contenu .= '<div class="card-body">';
    $contenu .= '<h4 class="card-title">' . $spectacle['titre_spectacle'] . '</h4>';
    $contenu .= '<p class="card-text">' . $spectacle['description_spectacle'] . '</p>';
    $contenu .= '<a href=' . $spectacle['site_spectacle'] . ' class="justify-contenu-center btn btn-danger" target="_blank">Voir le site</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';

    $contenu .= '</div>';
    $contenu .= '</div>';
}

// Ensuite l'affichage des spectacles proposés, avec la possibilité d'aller les valider via la page validconcertphp puis valid.php :

$requete_validspectacles = $pdo->query('SELECT * FROM spectacles_validation');
while ($validspectacle = $requete_validspectacles->fetch(PDO::FETCH_ASSOC)) {

    $contenu .= '<div class="card border-dark col-lg-6 col-md-6 col-sm-10 container-fluid">';

    $contenu .= '<div class="row g-0">';

    $contenu .= '<div class="col-sm-4">';
    $contenu .= '<img class="card-img-top h-auto" src="' . $validspectacle['photo'] . '" alt="' . $validspectacle['titre'] . '">';
    $contenu .= '</div>';

    $contenu .= '<div class="col-sm-8">';
    $contenu .= '<div class="card-body">';
    $contenu .= '<h4 class="card-title">' . $validspectacle['titre'] . '</h4>';
    $contenu .= '<p class="card-text">' . $validspectacle['description'] . '</p>';
    $contenu .= '<a href=' . $validspectacle['site'] . ' class="justify-contenu-center btn btn-danger" target="_blank">Voir le site</a>';
    $contenu .= '<a href="validconcert.php?id=' . $validspectacle['id_validation'] . ' " class="justify-contenu-center btn btn-danger" target="_blank">Valider ce concert</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';

    $contenu .= '</div>';
    $contenu .= '</div>';
}

// Affichage title différent page par page avec $title, appelé avant le require du header pour fonctionner.
$title = "Les spectacles";

// Comme pour le title, voici un moyen de rendre les mots-clefs propres à chaque page.
$keywords = "gestion, spectacles, admin";

// Avec le require_once suivant nous allons pouvoir afficher le header commun à toutes les pages : les balises méta, les liens CSS et JS, le cdn Bootstrap ainsi que l'ouverture du Body.
require_once("inc/header.inc.php");

?>

<!-- Ici nous allons afficher le body et tout ce qui est permis par $contenu (qui est une fonction écrite dans le fichier init.inc.php) -->

<div class="row container-fluid g-1 px-5">
    <?php
    echo $contenu;
    ?>
</div>

<!-- Enfin nous allons afficher dans ce passage PHP ce qui clot la page -->
<?php

// Ce require_once va permettre de clore la page avec le cdn de Bootstrap et le footer.
require_once("inc/footer.inc.php");

?>